<?php

namespace App\Http\Controllers;

use App\Models\Payment_order;
use App\Models\Shopping_cart;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentOrderController extends Controller
{
    public function list()
    {
        $cartItems = Payment_order::all();
        return view('admin.payment_order.list', compact('cartItems'));
    }
    public function invalidate($id)
    {
        $cartItem = Payment_order::where('id',$id)->first();
        $update=$cartItem->update([
            'status'=>'canceled'
        ]);
        if ($update){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }
        return back();
    }

}
