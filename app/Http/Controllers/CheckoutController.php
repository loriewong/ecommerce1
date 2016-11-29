<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use Mail;
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
          'lastname.max' => ' The last name may not be greater than 35 characters.',
        ]);

      $order = new Order;
      $order->firstname = $request->firstname;
      $order->lastname = $request->lastname;
      $order->email = $request->email;
      $order->totalcost = '123';
      $order->save();

      $items = json_decode($request->cartdata)->items;

      foreach($items as $item)
      {
        $orderdetails = new OrderDetails;
        $orderdetails->orderId = $order->id;
        $orderdetails->productId = $item->productId;
        $orderdetails->attributeId = $item->attributeId;
        $orderdetails->quantity = $item->quantity;
        $orderdetails->save();
      }

      $user = $request->email;


      Mail::send('pages.email',
        ['title' => 'Order Confirmation Email',
        'items' => $items,
        'order' => $order], function ($m) {
            $m->from('hello@app.com', 'Ecommerce Order Confirmation');

            $m->to('loriewong@globalive.com', 'Lorie')->subject('Ecommerce Order Confirmation');
        });

      return response()->json(['message' => 'Request completed']);
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
