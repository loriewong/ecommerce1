<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bundle;
use App\BundleItems;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bundleId)
    {
        $bundle = Bundle::find($bundleId);


        //$product_attributes = ProductAttributes::all();

        $bundleitems = BundleItems::where('bundleId', $bundleId)
          ->join('attributes', 'attributes.attributeId', '=', 'bundle_items.attributeId')
          ->join('products', 'products.productId', '=', 'bundle_items.productId')
          ->get();
//dd($bundle);
        return view('pages.bundle')
          ->with('bundle', $bundle)
          ->with('bundleitems', $bundleitems);
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
