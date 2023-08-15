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
        $request->validate([
            'name' => 'required|string|min:3',
            'file'=>'required|max:10000|mimes:png,jpeg,jpg,webp'
        ]);

        $file=$request->file('file');;
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        $insert=Brand::create([
            'name' => $request->name,
            'file' => 'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension()
        ]);
        if ($insert){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }
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
        if($request->has('file')){
            $request->validate([
                'name' => 'required|string|min:3',
                'file'=>'required|max:10000|mimes:png,jpeg,jpg,webp'
            ]);
            $file=$request->file('file');
            $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
            $brand = Brand::where('id', $id)->first();
            $update=$brand -> update([
                'name' => $request->name,
                'file' => 'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension()
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|min:3',
            ]);
            $brand = Brand::where('id', $id)->first();
            $update=$brand -> update([
                'name' => $request->name,
            ]);
        }
        if ($update){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }else{
            session()->flash('notification',['heading'=>'ناموفق','text'=>'عملیات انجام نشد.','icon'=>'error']);
        }
        return redirect()->route('brand_list');
    }

    public function delete($id){
        $brand = Brand::where('id', $id)->first();
        $brand -> delete();
        return redirect()->route('brand_list');
    }
}
