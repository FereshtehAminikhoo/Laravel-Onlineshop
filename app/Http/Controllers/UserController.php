<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'family_name' => 'required|string|min:4',
            'national_code' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|numeric|min:6'
        ]);
        $insert = User::create([
            'name'=>$request->name,
            'family_name'=>$request->family_name,
            'national_code' =>$request->national_code,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'type'=>'admin',
            'password'=>Hash::make($request->password)
        ]);
        if ($insert){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }
        return redirect()->route('user_list');
    }

    public function list()
    {
        $users=User::all();
        return view('admin.user.list',compact('users'));
    }

    public function edit($id)
    {
        $user = User::where('id',$id) -> first();
        return view('admin.user.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'family_name' => 'required|string|min:4',
            'national_code' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:11',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|numeric|min:6'
        ]);
        $user = User::where('id',$id) -> first();
        $update = $user -> update([
            'name' => $request->name,
            'email' => $request->email,
            'family_name'=>$request->family_name,
            'national_code' =>$request->national_code,
            'mobile'=>$request->mobile,
            'password'=>Hash::make($request->password)
        ]);
        if ($update){
            session()->flash('notification',['heading'=>'موفقیت آمیز','text'=>'عملیات با موفقیت انجام شد.','icon'=>'success']);
        }else{
            session()->flash('notification',['heading'=>'ناموفق','text'=>'عملیات انجام نشد.','icon'=>'error']);
        }
        return redirect() -> route('user_list');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('user_list');
    }
}
