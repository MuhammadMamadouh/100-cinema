<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserAuth extends Controller
{
    public function login()
    {
        return view('front.auth.login');
    }

    public function userLogin()
    {
        $rememner_me = \request('remember_me') == 1 ? true : false;
        $email = \request('email');
        $password = \request('password');

        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('/home');
        } else {
            session()->flash('error', 'Incorrect User Or Password');
            return redirect('front/login');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('web/login');
    }

    public function register()
    {
        $data = $this->isValid();
        if (!empty($data['image'])) {
            $data['image'] = request()->file('image')->storeAs('user', time());
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'about' => $data['about'],
            'image' => $data['image'],
            'site' => $data['site'],
            'short_bio' => $data['short_bio'],
        ]);

        Auth::guard()->login($user);
        return redirect('/');
    }


    /**
     * Check if request data is valid
     * @return array
     */
    protected function isValid()
    {
        return $this->validate(\request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'about' => 'string|nullable',
            'image' => v_image(),
            'site' => 'string|max:255',
            'short_bio' => 'string|max:255',
        ]);
    }
}
