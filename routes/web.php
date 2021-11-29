<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); })->name('home');

Auth::routes();

Route::group(['prefix' => 'admin'], function () { Voyager::routes(); });

/*------------------------------------ Products routes ------------------------------------*/

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/products/{slug}', 'App\Http\Controllers\ProductController@show')->name('products.show');
Route::get('/search', 'App\Http\Controllers\ProductController@search')->name('products.search');

Route::group(['middleware' => 'auth'], function () {

    /*------------------------------------ Cart routes ------------------------------------*/

    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
    Route::post('/cart/add', 'App\Http\Controllers\CartController@store')->name('cart.store');
    Route::patch('/cart/{rowId}', 'App\Http\Controllers\CartController@update')->name('cart.update');
    Route::delete('/cart/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

    /*------------------------------------ Checkout routes ------------------------------------*/

    Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->name('checkout.index');
});




