<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;
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
          'firstname' => 'required|min:5|max:35',
          'lastname' => 'required|min:5|max:35',
          'email' => 'required|email'

        ],[
          'firstname.required' => ' The first name field is required.',
          'firstname.min' => ' The first name must be at least 5 characters.',
          'firstname.max' => ' The first name may not be greater than 35 characters.',
          'lastname.required' => ' The last name field is required.',
          'lastname.min' => ' The last name must be at least 5 characters.',
          'lastname.max' => ' The last name may not be greater than 35 characters.',
        ]);


      $order = new Checkout;
      $order->firstname = $request->firstname;
      $order->lastname = $request->lastname;
      $order->email = $request->email;
      $order->totalcost = '123';
      $order->save();

      $user = $request->email;


      Mail::send('pages.email', ['title' => 'hi', 'content' => 'you need to ship'], function ($m) {
            $m->from('hello@app.com', 'Your Application');

            $m->to('loriewong@outlook.com', 'lorie')->subject('Your Reminder!');
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
