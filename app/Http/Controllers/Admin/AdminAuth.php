<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    public function login()
    {
        if (\auth('admin')->check()) {
            return redirect('/admin');
        }
        return view('admin.login');
    }

    public function adminLogin()
    {
        $remember_me = \request('remember_me') == 1 ? true : false;
        $email = \request('email');
        $password = \request('password');

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password,], $remember_me)) {

            return redirect('/admin');
        } else {
            session()->flash('Incorrect User Or Password');
            return redirect('admin/login');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
