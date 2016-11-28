<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
/*      $this->validate($request,[
          'firstname' => 'required|min:5|max:35',
          'lastname' => 'required|min:5|max:35',
          'email' => 'required|email|unique:users'

        ],[
          'firstname.required' => ' The first name field is required.',
          'firstname.min' => ' The first name must be at least 5 characters.',
          'firstname.max' => ' The first name may not be greater than 35 characters.',
          'lastname.required' => ' The last name field is required.',
          'lastname.min' => ' The last name must be at least 5 characters.',
          'lastname.max' => ' The last name may not be greater than 35 characters.',
        ]);*/

      dd('You are successfully added all fields.');
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
