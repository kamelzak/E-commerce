<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index() 
    {
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->latest()->paginate(6);
        } else  {
            $products = Product::with('categories')->latest()->paginate(6);
        }
        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function search()
    {
        request()->validate([
            'search' => 'required|min:3'
        ]);
        $search = request()->input('search');
        
        $products = Product::where('title', 'like', "%$search%")->paginate(6);
        return view('products.search', compact('products'));
    }
}
