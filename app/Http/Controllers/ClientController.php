<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $categories=Category::whereNull('parent_id')->get();
        $mobiles = Product::where('');
        return view('index',compact('categories','mobiles'));
    }
}
