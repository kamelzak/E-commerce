<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/products/{slug}', 'App\Http\Controllers\ProductController@show')->name('products.show');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/cart/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

Route::get('/cart/destroy', function () {
    Cart::destroy();
});