<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite as LaravelSocialite;

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
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Githunの認証ページへユーザをリダイレクト
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->scopes(['read:user', 'public_repo'])->redirect();
    }

    /**
     * Githunの認証ページへユーザをリダイレクト
     * 
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('github')->user();

        $request->session()->put('github_token', $user->token);
        return redirect('github');
    }
}
