<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth extends Controller
{
    public function login()
    {
        return view('front.auth.login');
    }

    public function userLogin(){
        $rememner_me = \request('remember_me')==1?true:false;
        $email = \request('email');
        $password = \request('password');

        if(Auth::guard('web')->attempt(['email'=> $email, 'password'=> $password])){
            return redirect()->intended('/home');
        }else {
            session()->flash('error', 'Incorrect User Or Password');
            return redirect('front/login');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('web/login');
    }
}
