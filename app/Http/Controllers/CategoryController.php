<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {
        $categories=Category::all();
        return view('admin.category.create',compact('categories'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'file'=>'required|max:10000|mimes:png,jpeg,jpg,webp'
        ]);
        $file=$request->file('file');;
        $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
        $insert = Category::create([
            'name' => $request->name,
            'parent_id'=>$request->parent_id,
            'file'=>'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension()
        ]);
        if ($insert){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }
        return redirect()->route('category_list');
    }

    public function list()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }

    public function edit($id)
    {
        $categories = Category::where('id', '!=', $id)->get();
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category','categories'));
    }

    public function update($id, Request $request)
    {

        if($request->has('file')){
            $request->validate([
                'name' => 'required|string|min:5',
                'file'=>'required|max:10000|mimes:png,jpeg,jpg,webp'
            ]);
            $file=$request->file('file');;
            $file->move('uploads',Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension());
            $category = Category::where('id', $id)->first();
            $update = $category->update([
                'name' => $request->name,
                'parent_id'=>$request->parent_id,
                'file'=>'uploads/'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension(),
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|min:5',
            ]);
            $category = Category::where('id', $id)->first();
            $update = $category->update([
                'name' => $request->name,
                'parent_id'=>$request->parent_id,
            ]);
        }
        if ($update){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }else{
            session()->flash('notification',['heading'=>'ناموفق','text'=>'عملیات انجام نشد.','icon'=>'error']);
        }

        return redirect()->route('category_list');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('category_list');
    }
}
