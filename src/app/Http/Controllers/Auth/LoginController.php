<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Socialite;
use App\User;
use GuzzleHttp\Client;

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
    public function redirectToProvider($provider)
    {
        if ($provider == 'github' || $provider == 'google')
        {
            return Socialite::driver($provider)->redirect();
        }
        elseif ($provider == '42')
        {
            return redirect(env('42INTRANET_REDIRECT_URL'));
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        if ($provider == 'github' || $provider == 'google')
        {
            $user = $this->findOrCreateUser(
                Socialite::driver($provider)->user()
            );
        }
        elseif ($provider == '42')
        {
            $user = $this->parseAndCreate42User(
                $request->get('code')
            );
        }
        auth()->login($user);
        return redirect('/');
    }

    /**
     * Fetch the oauth user.
     *
     * @param  object $githubUser
     * @return \App\User
     */
    protected function findOrCreateUser($oauthUser)
    {
        $user = User::firstOrNew(['oauth_id' => $oauthUser->id]);
        if ($user->exists) return $user;
        
        $user->fill([
            'username'  => $oauthUser->nickname == null ? $oauthUser->name : $oauthUser->nickname,
            'first_name'  => $oauthUser->name,
            'email'     => $oauthUser->email,
            'photo_src' => $oauthUser->avatar,
            'email_verified_at' => date("Y-m-d H:i:s"),
        ])->save();
        return $user;
    }

    /**
     * Fetch the user information from Intranet 42.
     *
     * @return \Illuminate\Http\Response
     */
    public function parseAndCreate42User($code)
    {
        $data = [
            'grant_type' => 'authorization_code',
            'client_id' => env('42INTRANET_CLIENT_ID'),
            'client_secret' => env('42INTRANET_CLIENT_SECRET'),
            'code' => $code,
            'redirect_uri' => env('42INTRANET_CALLBACK_URL')
        ];

        // init curl POST request
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.intra.42.fr/oauth/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response);

            // init curl GET request
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.intra.42.fr/v2/me",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$data->access_token,
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $data = json_decode($response);
                $user_id = $data->id;
                $username = $data->login;
                $first_name = $data->first_name;
                $last_name = $data->last_name;
                $email = $data->email;
                $photo_src = $data->image_url;

                $user = User::firstOrNew(['oauth_id' => $user_id]);
                if ($user->exists) return $user;
                
                $user->fill([
                    'username'  => $username,
                    'first_name'  => $first_name,
                    'last_name'  => $last_name,
                    'email'     => $email,
                    'photo_src' => $photo_src,
                    'email_verified_at' => date("Y-m-d H:i:s"),
                ])->save();
                return $user;
            }
        }
    }
}
