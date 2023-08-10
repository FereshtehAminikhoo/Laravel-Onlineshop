<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function create(){
        $brands = Brand::all();
        return view('admin.brand.create', compact('brands'));
    }

    public function save(Request $request){
        $file=$request->file('file');;
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        Brand::create([
            'name' => $request->name,
            'file' => 'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension()
        ]);
        return redirect()->route('brand_list');
    }

    public function list(){
        $brands = Brand::all();
        return view('admin.brand.list', compact('brands'));
    }

    public function edit($id){
        $brand = Brand::where('id', $id)->first();
        return view('admin.brand.edit', compact('brand'));
    }

    public function update($id, Request $request){
        $file=$request->file('file');;
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        $brand = Brand::where('id', $id)->first();
        $brand -> update([
            'name' => $request->name,
            'file' => 'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension()
        ]);
        return redirect()->route('brand_list');
    }

    public function delete($id){
        $brand = Brand::where('id', $id)->first();
        $brand -> delete();
        return redirect()->route('brand_list');
    }
}
