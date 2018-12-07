<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;


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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function setLanguage(Request $request)
    {
        $request->validate([
            'lang'=> ['required', 'string', 'max:2'],
        ]);

        $lang = $request->get('lang') == 'en' ? 'en' : 'ua';
        session(['locale' => $lang]);

        return back();
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = $this->findOrCreateGitHubUser(
            Socialite::driver('github')->user()
        );
        auth()->login($user);
        return redirect('/');
    }

    /**
     * Fetch the GitHub user.
     *
     * @param  object $githubUser
     * @return \App\User
     */
    protected function findOrCreateGitHubUser($githubUser)
    {
        // dd($githubUser);
        $user = User::firstOrNew(['oauth_id' => $githubUser->id]);
        if ($user->exists) return $user;
        
        $user->fill([
            'username'  => $githubUser->nickname,
            'first_name'  => $githubUser->name,
            'email'     => $githubUser->email,
            'photo_src' => $githubUser->avatar,
            'email_verified_at' => date("Y-m-d H:i:s"),
        ])->save();
        return $user;
    }
}
