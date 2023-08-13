<?php

namespace App\Http\Controllers;

use App\Models\Payment_order;
use App\Models\Payment_order_item;
use Illuminate\Http\Request;

class Payment_order_itemController extends Controller
{
    public function list($id){
        $orderSelect = Payment_order_item::where('order_id',$id)->first();
        $orderItems = Payment_order_item::whereIn('id',$orderSelect);
        return view('admin.payment_order_item.list', compact('orderItems'));
    }
}
