<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response($categories, 200);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $category = Category::create($data);
        return response($category, 200);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response($category, 200);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $category = Category::where('id', $id)->update($data, $id);
        return response($category, 200);
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return response('category deleted', 200);
    }

}
