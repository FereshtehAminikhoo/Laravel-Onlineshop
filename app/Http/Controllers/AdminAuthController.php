<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $admin=User::where('email',$request->email)->first();
        //echo Hash::make($request->password).'</br>';
        //echo $admin->password;
        //die;
        if ($admin){
            if (Hash::check($request->password,$admin->password)){
                return redirect()->route('admin_home');
            }else{
               return back();
            }
        }else{
            echo 'in karbar vojood nadarad';
        }
    }
}
