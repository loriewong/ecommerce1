<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop;
use App\ProductAttributes;
use App\Bundle;
use App\BundleItems;

class BundlesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Bundle::get();

    return view('pages.bundles')
      ->with('products', $products);
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

    $bundleitems = BundleItems::where('bundleId', $bundleId)
      ->join('attributes', 'attributes.attributeId', '=', 'bundle_items.attributeId')
      ->join('products', 'products.productId', '=', 'bundle_items.productId')
      ->get();

    return view('pages.bundle')
      ->with('bundle', $bundle)
      ->with('bundleitems', $bundleitems);
  }
}
