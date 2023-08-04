<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function save(Request $request)
    {
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('category_list');
    }

    public function list()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::where('id', $id)->first();
        $category->update([
            'name' => $request->name
        ]);
        return redirect()->route('category_list');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('category_list');
    }
}
