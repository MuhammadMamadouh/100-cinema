<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function authenticated()
    {
        $previous = URL::previous();
        return redirect($previous);

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookHandleProviderCallback()
    {

        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // check the user is logged in facebook
            if ($facebookUser) {
                $findUser = User::where('email', $facebookUser->email)->first();

                if ($findUser) {
                    Auth::login($findUser);
                    return redirect('/');
                }
            }
            return redirect('register')->with('We can not find this email, please sign up first');
        } catch (ClientException $exception) {
            return redirect()->back();
        }

    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleHandleProviderCallback()
    {

        $facebookUser = Socialite::driver('facebook')->user();

        $findUser = User::where('email', $facebookUser->email)->first();

        if ($findUser) {
            Auth::login($findUser);
            redirect('/');

        }
        return response($facebookUser->name);

    }

}
