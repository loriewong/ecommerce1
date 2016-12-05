<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProductAttributes;
use App\Product;

class ProductsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $products = Product::join('product_attributes', 'products.productId', '=', 'product_attributes.productId')
      ->join('attributes', 'attributes.attributeId', '=', 'product_attributes.attributeId')
      ->where('product_attributes.attributeid', '1')
      ->get();

    $product_attributes = ProductAttributes::join('attributes', 'attributes.attributeId', '=', 'product_attributes.attributeId')
      ->get();

    return view('pages.products')
      ->with('products', $products)
      ->with('product_attributes', $product_attributes);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($productId)
  {
    $product = Product::find($productId);

    $product_attributes = ProductAttributes::join('attributes', 'attributes.attributeId', '=', 'product_attributes.attributeId')
      ->where('productId', $productId)
      ->get();

    return view('pages.product')
      ->with('product', $product)
      ->with('product_attributes', $product_attributes);
  }
}
