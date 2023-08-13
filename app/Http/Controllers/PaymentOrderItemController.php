<?php

namespace App\Http\Controllers;

use App\Models\Payment_order;
use App\Models\Payment_order_item;
use Illuminate\Http\Request;

class PaymentOrderItemController extends Controller
{
    public function list($id){
        $orderItems = Payment_order_item::where('order_id',$id)->get();
        return view('admin.payment_order_item.list', compact('orderItems'));
    }
}
