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
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->resetPasswordNot();
        }
        return view('verify-code');
    }

    public function checkVerifyCode(Request $request){
        $user=User::where('email',$request->email)->first();
        if(cache()->get('verify_code_'.$user->id)==$request->verify_code){
            auth()->loginUsingId($user->id);
            return view('reset_password');
        }else{
            return back()->withErrors(['verify_code'=>'کد وارد شده صحیح نمی باشد.']);
        }
    }
}
