<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        $mobileCategories = Category::where('parent_id', 5)->pluck('id')->toArray();//[17,18,19]
        //dd($mobileCategories);
        $mobiles = Product::whereIn('category_id', $mobileCategories)->get();
        //$mobiles = Product::whereIn('category_id',[17,18,19])->get();
        return view('index', compact('categories', 'mobiles'));
    }

    public function showCategory($id)
    {
        $categories = Category::whereNull('parent_id')->get();
        $category=Category::where('id',$id)->first();
        return view('category',compact('category','categories'));
    }
}
