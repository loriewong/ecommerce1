<?php

namespace App\Http\Controllers;
use \stdClass;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use App\ProductAttributes;
use App\Bundle;
use App\BundleItems;
use App\Events\OrderProcessed;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.checkout');
  }

  public function formSubmit(Request $request)
  {
    $this->validate($request,[
        'firstname' => 'required|max:35',
        'lastname' => 'required|max:35',
        'email' => 'required|email'
      ],[
        'firstname.required' => ' The first name field is required.',
        'firstname.max' => ' The first name may not be greater than 35 characters.',
        'lastname.required' => ' The last name field is required.',
        'lastname.max' => ' The last name may not be greater than 35 characters.'

      ]);

    $items = json_decode($request->cartdata)->items;
    $bundles = json_decode($request->cartdata)->bundles;

    $ordertotal = 0;
    $orderquantitytotal = 0;
    $shippingquantitytotal = 0;

    //Loop through product to get price of each item so that 
    //it can be used as latest price to charge customer.
    foreach($items as $item)
    {
      $dbprice = ProductAttributes::select('price')
        ->where([
          ['productId', '=', $item->productId],
          ['attributeId', '=', $item->attributeId]
        ])
        ->get();
      $ordertotal += floatval($dbprice[0]->price) * $item->quantity;
      $orderquantitytotal += $item->quantity;
      $shippingquantitytotal += $item->quantity;
    }

    //Loop through bundle to get price of each item so that 
    //it can be used as latest price to charge customer.
    foreach($bundles as $bundle)
    {
      $dbprice = Bundle::select('price')
        ->where('bundleId', $bundle->bundleId)
        ->get();
      $ordertotal += floatval($dbprice[0]->price);
      $orderquantitytotal += $bundle->quantity;
    }

    //Create the order entry in DB
    $order = new Order;
    $order->firstname = $request->firstname;
    $order->lastname = $request->lastname;
    $order->email = $request->email;
    $order->totalcost = $ordertotal;
    $order->save();

    //Insert each product of the order to OrderDetails DB table
    foreach($items as $item)
    {
      $dbprice = ProductAttributes::select('price')
        ->where([
          ['productId', '=', $item->productId],
          ['attributeId', '=', $item->attributeId]
        ])
        ->get();
      $orderdetails = new OrderDetails;
      $orderdetails->orderId = $order->id;
      $orderdetails->productId = $item->productId;
      $orderdetails->bundleId = 0;
      $orderdetails->attributeId = $item->attributeId;
      $orderdetails->quantity = $item->quantity;
      $orderdetails->price = floatval($dbprice[0]->price);
      $orderdetails->save();
    }
    
    //Insert each bundle's product of the order to OrderDetails DB table
    foreach($bundles as $bundle)
    {
      $dbprice = Bundle::select('price')
        ->where('bundleId', $bundle->bundleId)
        ->get();

      foreach($bundle->products as $item)
      {
        $orderdetails = new OrderDetails;
        $orderdetails->orderId = $order->id;
        $orderdetails->productId = $item->productId;
        $orderdetails->bundleId = $bundle->bundleId;
        $orderdetails->attributeId = $item->attributeId;
        $orderdetails->quantity = 1;
        $orderdetails->price = floatval($dbprice[0]->price);
        $orderdetails->save();
        $shippingquantitytotal += 1;
      }
    }

    //Get all products in the order and create a dataset to be used for email
    $shippinglist = OrderDetails::selectRaw('name, size, orderdetails.orderId, orderdetails.quantity, 
      orderdetails.productId, orderdetails.attributeId, sum(orderdetails.quantity) as quantity')
      ->where('orderId', $order->id)
      ->join('attributes', 'attributes.attributeId', '=', 'orderdetails.attributeId')
      ->join('products', 'products.productId', '=', 'orderdetails.productId')
      ->groupBy('orderdetails.orderId', 'products.name', 'attributes.size', 'orderdetails.productId', 'orderdetails.attributeId', 'orderdetails.quantity')
      ->get();

    $emailEventData = new stdClass();
    $emailEventData->request = $request;
    $emailEventData->orderId = $order->id;
    $emailEventData->shippinglist = $shippinglist;
    $emailEventData->ordertotal = $ordertotal;
    $emailEventData->orderquantitytotal = $orderquantitytotal;
    $emailEventData->shippingquantitytotal = $shippingquantitytotal;

    event(new OrderProcessed($emailEventData));

    return view('pages.checkoutComplete');
  }
}