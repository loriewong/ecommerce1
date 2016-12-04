<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
      foreach($items as $item)
      {
        $dbprice = DB::table('product_attributes')
          ->select('price')
          ->where([
            ['productId', '=', $item->productId],
            ['attributeId', '=', $item->attributeId]
          ])
          ->get();
        $ordertotal += floatval($dbprice[0]->price) * $item->quantity;
        $orderquantitytotal += $item->quantity;
        $shippingquantitytotal += $item->quantity;
      }

      foreach($bundles as $bundle)
      {
        $dbprice = DB::table('bundles')
          ->select('price')
          ->where('bundleId', $bundle->bundleId)
          ->get();
        $ordertotal += floatval($dbprice[0]->price);
        $orderquantitytotal += $bundle->quantity;
        
      }

      $order = new Order;
      $order->firstname = $request->firstname;
      $order->lastname = $request->lastname;
      $order->email = $request->email;
      $order->totalcost = $ordertotal;
      $order->save();

      foreach($items as $item)
      {
        $dbprice = DB::table('product_attributes')
          ->select('price')
          ->where([
            ['productId', '=', $item->productId],
            ['attributeId', '=', $item->attributeId]
          ])
          ->get();
        $orderdetails = new OrderDetails;
        $orderdetails->orderId = $order->id;
        $orderdetails->productId = $item->productId;
        $orderdetails->bundleId = -1;
        $orderdetails->attributeId = $item->attributeId;
        $orderdetails->quantity = $item->quantity;
        $orderdetails->price = floatval($dbprice[0]->price);
        $orderdetails->save();
      }
      
      foreach($bundles as $bundle)
      {
        $dbprice = DB::table('bundles')
          ->select('price')
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

      $shippinglist = OrderDetails::selectRaw('name, size, orderdetails.orderId, orderdetails.quantity, orderdetails.productId, orderdetails.attributeId, sum(orderdetails.quantity) as quantity')
          ->where('orderId', $order->id)
          ->join('attributes', 'attributes.attributeId', '=', 'orderdetails.attributeId')
          ->join('products', 'products.productId', '=', 'orderdetails.productId')
          ->groupBy('orderdetails.orderId', 'orderdetails.productId', 'orderdetails.attributeId', 'orderdetails.quantity')
          ->get();

      Mail::send('pages.email',
        ['title' => 'Order Confirmation Email',
        'items' => $items,
        'order' => $request,
        'subtotal' => $ordertotal,
        'orderquantity' => $orderquantitytotal,
        'shipquantity' => $shippingquantitytotal,
        'shippinglist' => $shippinglist], function ($m) {
            $m->from('hello@app.com', 'Ecommerce Order Confirmation');

            $m->to('loriewong@outlook.com', 'Lorie')->subject('Ecommerce Order Confirmation');
        });

      return view('pages.checkoutComplete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
