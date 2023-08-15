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
        $request->validate([
            'title' => 'required|string|min:5',
            'category_id' => 'required|numeric|exists:categories,id',
            'brand_id' => 'required|numeric|exists:brands,id',
            'file'=>'required|max:10000|mimes:png,jpeg,jpg,webp',
            'price' => 'required|numeric|gt:0',
            'color' => 'required|string',
            'description' => 'nullable|string',
            'stock' => 'required|numeric|gt:0',
        ]);
        $file=$request->file('file');
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        $insert = Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'file'=>'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension(),
            'price' => $request->price,
            'color' => $request->color,
            'description' => $request->description,
            'stock_product' => $request->stock
        ]);
        if ($insert){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }
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
        if ($request->has('file')){
            $request->validate([
                'title' => 'required|string|min:5',
                'category_id' => 'required|numeric|exists:categories,id',
                'brand_id' => 'required|numeric|exists:brands,id',
                'file'=>'required|max:10000|mimes:png,jpeg,jpg,webp',
                'price' => 'required|numeric|gt:0',
                'color' => 'required|string',
                'description' => 'nullable|string',
                'stock' => 'required|numeric|gt:0',
            ]);
            $product = Product::where('id',$id)->first();
            $file=$request->file('file');
            $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
            $update = $product->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'file' => 'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension(),
                'price' => $request->price,
                'color' => $request->color,
                'description' => $request->description,
                'stock_product' => $request->stock
            ]);
        }else{
            $request->validate([
                'title' => 'required|string|min:5',
                'category_id' => 'required|numeric|exists:categories,id',
                'brand_id' => 'required|numeric|exists:brands,id',
                'price' => 'required|numeric|gt:0',
                'color' => 'required|string',
                'description' => 'nullable|string',
                'stock' => 'required|numeric|gt:0',
            ]);
            $product = Product::where('id',$id)->first();
            $update = $product->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                'color' => $request->color,
                'description' => $request->description,
                'stock_product' => $request->stock
            ]);
        }
        if ($update){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }else{
            session()->flash('notification',['heading'=>'ناموفق','text'=>'عملیات انجام نشد.','icon'=>'error']);
        }

        return redirect()->route('product_list');
    }

    public function delete($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return redirect()->route('product_list');
    }
}
