<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function adminLogin(){
        $rememner_me = \request('remember_me')==1?true:false;
        $email = \request('email');
        $password = \request('password');

        if(Auth::guard('admin')->attempt(['email'=> $email, 'password'=> $password,], $rememner_me )){
            return redirect()->intended('/admin');
        }else {
            session()->flash('error', 'Incorrect User Or Password');
            return redirect('admin/login');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
