<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                "name" => "required | unique:categories,name"
            ],
            [
                "name.required" => "Nama kategori harus diisi",
                "name.unique" => "Nama kategori sudah ada",
            ]
        );

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate(
            [
                "name" => "required | unique:categories,name"
            ],
            [
                "name.required" => "Nama kategori harus diisi",
                "name.unique" => "Nama kategori sudah ada",
            ]
        );

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));

        $category->save();

        return redirect('/categories');
    }
}
