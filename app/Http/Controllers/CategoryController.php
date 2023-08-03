<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function save(Request $request){
        Category::create([
           'name'=>$request->title
        ]);
       return back();
    }

    public function list()
    {
        $categories=Category::all();
        return view('admin.category.list',compact('categories'));
    }
}
