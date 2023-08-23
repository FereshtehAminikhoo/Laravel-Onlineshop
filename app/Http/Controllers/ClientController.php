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

        $childCategory = Category::where('parent_id', $id)->get();
        if (count($childCategory) == 0) {
            $viewProducts = Product::where('category_id', $id)->newest($request->time_sort)->price($request->price_sort)->get();
            $pro_brands = Product::where('category_id', $id)->distinct('brand_id')->pluck('brand_id')->toArray();
            $brands = Brand::whereIn('id', $pro_brands)->get();
        } else {
            $productCategories = Category::where('parent_id', $id)->pluck('id')->toArray();
            $pro_brands = Product::whereIn('category_id', $productCategories)->distinct('brand_id')->pluck('brand_id')->toArray();
            $viewProducts = Product::whereIn('category_id', $productCategories)->newest($request->time_sort)->price($request->price_sort)->get();
            $brands = Brand::whereIn('id', $pro_brands)->get();
        }
        $other = Product::orderBy('id', 'desc')->take(20)->get()->random(8);
        return view('category', compact('category', 'categories', 'viewProducts', 'shoppingCartItems', 'user', 'other', 'brands'));
    }

    public function showProduct($id)
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $user = auth()->user()->name;
        } else {
            $userId = null;
            $user = '';
        }
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();
        $bought = Product::where('id', '<', 10)->get();
        $product = Product::where('id', $id)->first();
        $similar = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        $categories = Category::whereNull('parent_id')->get();
        return view('product', compact('product', 'categories', 'shoppingCartItems', 'user', 'bought', 'similar'));
    }

    public function addToCart($id)
    {
        $exist = Shopping_cart::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($exist) {
            $exist->update([
                'count' => $exist->count + 1
            ]);
        } else {
            Shopping_cart::create([
                'product_id' => $id,
                'user_id' => auth()->user()->id,
                'count' => 1
            ]);
        }

        session()->flash('notification', ['heading' => 'موفقیت آمیز', 'text' => 'محصول موردنظر با موفقیت به سبد خرید اضافه شد.', 'icon' => 'success']);
        return back();
    }

    public function showShoppingCart()
    {
        if (auth()->check()) {
            $user = auth()->user()->name;
            $userId = auth()->user()->id;
        } else {
            $user = '';
            $userId = null;
        }
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();

        $categories = Category::whereNull('parent_id')->get();
        $items = Shopping_cart::where('user_id', $userId)->get();
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
        $user = User::create([
            'name' => $request->name,
            'family_name' => $request->family_name,
            'national_code' => $request->national,
            'mobile' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'repeat_password' => Hash::make($request->repeat_password)
        ]);
        if ($user) {
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
        if ($order) {
            session()->flash('notification', ['heading' => 'موفقیت آمیز', 'text' => 'عملیات پرداخت با موفقیت انجام شد.', 'icon' => 'success']);
        }

        foreach ($cartItems as $cartItem) {
            Payment_order_item::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'count' => $cartItem->count,
                'price' => $cartItem->product->price
            ]);
            $product = Product::where('id', $cartItem->product->id)->first();
            $product->update([
                'stock_product' => $product->stock_product - $cartItem->count
            ]);
            $cartItem->delete();
        }
        return back();
    }

    public function changeCartCount(Request $request)
    {
        $cart = Shopping_cart::where('id', $request->cart_id)->first();
        $cart->update([
            'count' => $request->count
        ]);
        $sum = 0;
        $rows = Shopping_cart::where('user_id', auth()->user()->id)->get();
        foreach ($rows as $row) {
            $sum+=$row->count*$row->product->price;
        }
        return response()->json(['status' => 'success','sum' => $sum]);
    }

    public function paymentOrder()
    {
        if (auth()->check()) {
            $user = auth()->user()->name;
        } else {
            $user = '';
        }
        $userId = auth()->user()->id;
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();
        $categories = Category::whereNull('parent_id')->get();

        $cartOrderItems = Payment_order::where('user_id', $userId)->get();
        return view('payment_order', compact('cartOrderItems', 'categories', 'shoppingCartItems', 'user'));
    }

    public function paymentOrderItem($id)
    {
        if (auth()->check()) {
            $user = auth()->user()->name;
        } else {
            $user = '';
        }
        $userId = auth()->user()->id;
        $shoppingCartItems = Shopping_cart::where('user_id', $userId)->get();
        $categories = Category::whereNull('parent_id')->get();

        $orderItems = Payment_order_item::where('order_id', $id)->get();
        return view('payment_order_item', compact('orderItems', 'categories', 'shoppingCartItems', 'user'));
    }

    public function contactUs()
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
        return view('contact_us', compact('user', 'shoppingCartItems', 'categories'));
    }

    public function forgetPassword()
    {
        return view('forget_password');
    }

    public function resetPassword()
    {
        return view('reset_password');
    }

    public function searchInProducts(Request $request)
    {
        $products=Product::where('title','LIKE','%'.$request->value.'%')->get();
        return response()->json(['products' => $products]);

    }

}
