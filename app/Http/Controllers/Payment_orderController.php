<?php

namespace App\Http\Controllers;

use App\Models\Payment_order;
use App\Models\Shopping_cart;
use App\Models\User;
use Illuminate\Http\Request;

class Payment_orderController extends Controller
{
    public function list(){
        $cartItems = Payment_order::all();
       return view('admin.payment_order.list', compact('cartItems'));
    }
}
