<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {
        $categories=Category::all();
        return view('admin.category.create',compact('categories'));
    }
    public function save(Request $request)
    {
        $file=$request->file('file');;
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        Category::create([
            'name' => $request->name,
            'parent_id'=>$request->parent_id,
            'file'=>'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension()
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
