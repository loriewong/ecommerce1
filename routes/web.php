<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('products', 'ProductsController');
Route::resource('product', 'ProductsController');

Route::resource('bundles', 'BundlesController');
Route::resource('bundle', 'BundlesController');

Route::resource('checkout', 'CheckoutController');
Route::post('checkout', 'CheckoutController@formSubmit');