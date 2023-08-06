<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $categories=Category::whereNull('parent_id')->get();
        return view('index',compact('categories'));
    }
}
