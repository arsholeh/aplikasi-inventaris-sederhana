<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('pages.products.index', [
            'products' => $products
        ]);
    }


    public function create()
    {
        $categories = Category::all();
        return view('pages.products.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
        ]);

        Product::create($validated);

        return redirect('/products');
    }


    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrfail($id);
        return view('pages.products.edit', [
            'categories' => $categories,
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
        ]);

        Product::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
        ]);

        return redirect('/products');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('products');
    }
}
