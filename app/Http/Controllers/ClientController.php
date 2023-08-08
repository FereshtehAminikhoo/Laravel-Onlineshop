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
        //$products=Product::where('category_id',20)->get();
        //[20,30,29,25]
        //$products = Product::whereIn('category_id', [20,30,29,25])->get();
        $laptops = Product::where('category_id', 6)->get();
        $kids_mode = Product::where('category_id', 12)->get();
        return view('index', compact('categories', 'mobiles', 'laptops', 'kids_mode'));
    }

    public function showCategory($id,Request $request)
    {
        //dd($request);
        $categories = Category::whereNull('parent_id')->get();
        $category = Category::where('id',$id)->first();
        //dd($request);
        $childCategory=Category::where('parent_id',$id)->get();
        if (count($childCategory)==0){
            $viewProducts=Product::where('category_id',$id)->newest($request->time_sort)->price($request->price_sort)->get();
        }else{
            $productCategories = Category::where('parent_id',$id)->pluck('id')->toArray();
            $viewProducts = Product::whereIn('category_id',$productCategories)->newest($request->time_sort)->price($request->price_sort)->get();
        }
        return view('category',compact('category','categories', 'viewProducts'));
    }

    public function showProduct($id)
    {
        $product=Product::where('id',$id)->first();
        $categories=Category::whereNull('parent_id')->get();
        return view('product',compact('product','categories'));
    }
}
