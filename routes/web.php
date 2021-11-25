<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/products/{slug}', 'App\Http\Controllers\ProductController@show')->name('products.show');

Route::post('/cart/add', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::get('/cart/destroy', function () {
    Cart::destroy();
});