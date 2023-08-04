<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function save(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
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
        $user = User::where('id',$id) -> first();
        $user -> update([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect() -> route('user_list');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('user_list');
    }
}
