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

/*
Route::get('shop', [
  'as' => 'shop',
  'uses' => 'PagesController@getShop'
]);*/

Route::resource('shop', 'ShopController');

Route::resource('bundles', 'BundlesController');

//Route::get('product/{id}', 'ProductController@show')->name('id');
Route::resource('product', 'ProductController');

Route::resource('checkout', 'CheckoutController');


Route::post('checkout', 'CheckoutController@formSubmit');