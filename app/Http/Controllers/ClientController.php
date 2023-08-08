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
        $laptops = Product::where('category_id', 6)->get();
        $kids_mode = Product::where('category_id', 12)->get();
        return view('index', compact('categories', 'mobiles', 'laptops', 'kids_mode'));
    }

    public function showCategory($id)
    {
        $categories = Category::whereNull('parent_id')->get();
        $category = Category::where('id',$id)->first();
        $productCategories = Category::where('parent_id',$id)->pluck('id')->toArray();
        $view_products = Product::whereIn('id',$productCategories)->get();
        return view('category',compact('category','categories', 'view_products'));
    }
}
