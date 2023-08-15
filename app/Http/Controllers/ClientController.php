<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Payment_order;
use App\Models\Payment_order_item;
use App\Models\Product;
use App\Models\Shopping_cart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $user = auth()->user()->name;
        } else {
            $userId = null;
            $user = '';
        }
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();
        $categories = Category::whereNull('parent_id')->get();
        $mobileCategories = Category::where('parent_id', 5)->pluck('id')->toArray();//[17,18,19]
        $mobiles = Product::whereIn('category_id', $mobileCategories)->get();
        $laptops = Product::where('category_id', 6)->get();
        $kids_mode = Product::where('category_id', 12)->get();
        $men_cloths = Product::where('category_id', 22)->get();
        $brands = Brand::all();
        return view('index', compact('categories', 'mobiles', 'laptops', 'kids_mode', 'shoppingCartItems', 'men_cloths', 'brands', 'user'));
    }

    public function showCategory($id, Request $request)
    {
        //dd($request);
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $user = auth()->user()->name;
        } else {
            $userId = null;
            $user = '';
        }
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();

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
        return view('category', compact('category', 'categories', 'viewProducts', 'shoppingCartItems', 'user'));
    }

    public function showProduct($id)
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $user= auth()->user()->name;
        } else {
            $userId = null;
            $user = '';
        }
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();

        $product = Product::where('id', $id)->first();
        $categories = Category::whereNull('parent_id')->get();
        return view('product', compact('product', 'categories', 'shoppingCartItems', 'user'));
    }

    public function addToCart($id)
    {
        Shopping_cart::create([
            'product_id' => $id,
            'user_id' => auth()->user()->id,
            'count' => 1
        ]);
        return back();
    }

    public function showShoppingCart()
    {
        if (auth()->check()) {
            $user= auth()->user()->name;
        } else {
            $user = '';
        }
        $userId = auth()->user()->id;
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();

        $categories = Category::whereNull('parent_id')->get();
        $items = Shopping_cart::where('user_id', auth()->user()->id)->get();
        return view('shopping_cart', compact('categories', 'items', 'shoppingCartItems', 'user'));
    }

    public function deleteItem($id)
    {
        $delete_item = Shopping_cart::where('id', $id)->first();
        $delete_item->delete();
        return back();
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function createAccount(Request $request)
    {
        $user=User::create([
            'name' => $request->name,
            'family_name' => $request->family_name,
            'national_code' => $request->national,
            'mobile' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'repeat_password' => Hash::make($request->repeat_password)
        ]);
        if ($user){
            auth()->loginUsingId($user->id);
        }
        return redirect()->route('client_home');
    }

    public function finalizePayment()
    {
        $userId = auth()->user()->id;
        $totalPrice = 0;
        $cartItems = Shopping_cart::where('user_id', $userId)->get();
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->count * $cartItem->product->price;
        }
        $order = Payment_order::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'status' => 'paid',
            'payment_date' => Carbon::now()->toDateString()
        ]);
        if ($order){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }

        foreach ($cartItems as $cartItem) {
            Payment_order_item::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'count' => $cartItem->count,
                'price' => $cartItem->product->price
            ]);
            $cartItem->delete();
        }
        return back();
    }

    public function paymentOrder()
    {
        if (auth()->check()) {
            $user= auth()->user()->name;
        } else {
            $user = '';
        }
        $userId = auth()->user()->id;
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();
        $categories = Category::whereNull('parent_id')->get();

        $cartOrderItems = Payment_order::where('user_id',$userId)->get();
        return view('payment_order', compact('cartOrderItems', 'categories', 'shoppingCartItems', 'user'));
    }

    public function paymentOrderItem($id)
    {
        if (auth()->check()) {
            $user= auth()->user()->name;
        } else {
            $user = '';
        }
        $userId = auth()->user()->id;
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();
        $categories = Category::whereNull('parent_id')->get();

        $orderItems = Payment_order_item::where('order_id', $id)->get();
        return view('payment_order_item', compact('orderItems', 'categories', 'shoppingCartItems', 'user'));
    }

    public function contactUs(){
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $user = auth()->user()->name;
        } else {
            $userId = null;
            $user = '';
        }
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();
        $categories = Category::whereNull('parent_id')->get();
        return view('contact_us', compact('user', 'shoppingCartItems', 'categories'));
    }

    public function forgetPassword(){
        return view('forget_password');
    }

    public function resetPassword(){
        return view('reset_password');
    }

}
