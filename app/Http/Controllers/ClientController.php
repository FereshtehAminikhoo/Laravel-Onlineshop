<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shopping_cart;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        if (auth()->check()){
            $userId=auth()->user()->id;
        }else{
            $userId=null;
        }
        $shoppingCartItems=Shopping_cart::where('user_id',$userId)->get();

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
        return view('index', compact('categories', 'mobiles', 'laptops', 'kids_mode','shoppingCartItems'));
    }

    public function showCategory($id, Request $request)
    {
        //dd($request);
        if (auth()->check()){
            $userId=auth()->user()->id;
        }else{
            $userId=null;
        }
        $shoppingCartItems=Shopping_cart::where('user_id',$userId)->get();

        $categories = Category::whereNull('parent_id')->get();
        $category = Category::where('id', $id)->first();
        //dd($request);
        $childCategory = Category::where('parent_id', $id)->get();
        if (count($childCategory) == 0) {
            $viewProducts = Product::where('category_id', $id)->newest($request->time_sort)->price($request->price_sort)->get();
        } else {
            $productCategories = Category::where('parent_id', $id)->pluck('id')->toArray();
            $viewProducts = Product::whereIn('category_id', $productCategories)->newest($request->time_sort)->price($request->price_sort)->get();
        }
        return view('category', compact('category', 'categories', 'viewProducts', 'shoppingCartItems'));
    }

    public function showProduct($id)
    {
        if (auth()->check()){
            $userId=auth()->user()->id;
        }else{
            $userId=null;
        }
        $shoppingCartItems=Shopping_cart::where('user_id',$userId)->get();

        $product = Product::where('id', $id)->first();
        $categories = Category::whereNull('parent_id')->get();
        return view('product', compact('product', 'categories', 'shoppingCartItems'));
    }

    public function addToCart($id)
    {
        Shopping_cart::create([
            'product_id'=>$id,
            'user_id'=>auth()->user()->id,
            'count'=>1
        ]);
        return back();
    }

    public function showShoppingCart()
    {
        $categories=Category::whereNull('parent_id')->get();
        $items=Shopping_cart::where('user_id',auth()->user()->id)->get();
        return view('shopping_cart',compact('categories','items'));
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
