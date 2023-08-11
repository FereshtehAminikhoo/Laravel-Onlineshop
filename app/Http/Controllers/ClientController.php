<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shopping_cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $men_cloths = Product::where('category_id', 22)->get();
        $brands = Brand::all();
        return view('index', compact('categories', 'mobiles', 'laptops', 'kids_mode','shoppingCartItems', 'men_cloths', 'brands'));
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
        $userId=auth()->user()->id;
        $shoppingCartItems=Shopping_cart::where('user_id',$userId)->get();

        $categories=Category::whereNull('parent_id')->get();
        $items=Shopping_cart::where('user_id',auth()->user()->id)->get();
        return view('shopping_cart',compact('categories','items', 'shoppingCartItems'));
    }

//    public function deleteItem($id)
//    {
//        $delete_item = Shopping_cart::where('id',$id)->first();
//        $delete_item->delete();
//        return back();
//    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function createAccount(Request $request){
        User::create([
           'name' => $request->name,
           'family_name' => $request->family_name,
           'national'=> $request->national,
           'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password'=>Hash::make($request->password),
            'repeat_password'=>Hash::make($request->repeat_password)
        ]);
        return redirect()->route('client_home');
    }

}
