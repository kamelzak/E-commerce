<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index() 
    {
        return view('cart.index'); 
    }

    public function store(Request $request)
    {
        $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->product_id;
        });

        if($duplicate->isNotEmpty()) {
            return redirect()->route('products.index')->with('success', 'Product already added !');
        }

        $product = Product::findOrFail($request->product_id);

        Cart::add($product->id, $product->title, 1, $product->price)->associate('App\Models\Product');

        return redirect()->route('products.index')->with('success', 'Product added !');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Product removed !');
    }

}
