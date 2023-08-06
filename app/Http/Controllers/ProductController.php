<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $products = Product::all();
        return view('admin.product.create', compact('products'));
    }

    public function save(Request $request){
        $file=$request->file('file');;
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'file'=>'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension(),
            'price' => $request->price,
            'color' => $request->color,
            'description' => $request->description
        ]);
        return redirect()->route('product_list');
    }

    public function list()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    public function update($id, Request $request)
    {
        $product = Product::where('id',$id)->first();
        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'file' => $request->file,
            'price' => $request->price,
            'color' => $request->color,
            'description' => $request->description
        ]);
        return redirect()->route('product_list');
    }

    public function delete($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return redirect()->route('product_list');
    }
}
