<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function save(Request $request){
        $file=$request->file('file');;
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
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
        $categories=Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product','categories', 'brands'));
    }

    public function update($id, Request $request)
    {
        $product = Product::where('id',$id)->first();
        $file=$request->file('file');;
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'file' => 'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension(),
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
