<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showResetPasswordForm()
    {
        return view('forget_password');
    }

    public function sendVerifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $user=User::where('email',$request->email)->first();
        if ($user){
            $user->resetPasswordNot();
        }
    }
}
