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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle()
    {
        $user = $this->findOrCreateGitHubUser(
            Socialite::driver('google')->user()
        );
        auth()->login($user);
        return redirect('/');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider42()
    {
        return redirect('https://api.intra.42.fr/oauth/authorize?client_id=d09541ef67f0d52638c2e89899f79c6165b57e1fea5e032d386a673ce9913c7d&redirect_uri=http%3A%2F%2Fhypertube42.com%2Flogin%2F42%2Fcallback&response_type=code');
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback42(Request $request)
    {
        if ($request->get('code')) {
            $code = $request->get('code');

            $data1 = [
                'grant_type' => 'authorization_code',
                'client_id' => 'd09541ef67f0d52638c2e89899f79c6165b57e1fea5e032d386a673ce9913c7d',
                'client_secret' => '3af5c01251f5ada3ce59b84b15aab884f83f12d5058219d99329afe242e21830',
                'code' => $code,
                'redirect_uri' => 'http://hypertube42.com/login/42/callback'
            ];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.intra.42.fr/oauth/token",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data1),
                CURLOPT_HTTPHEADER => array(
                    // Set here requred headers
                    "accept: */*",
                    "accept-language: en-US,en;q=0.8",
                    "content-type: application/json",
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                dd("cURL Error #:" . $err);
            } else {
                $data = json_decode($response);
                // dd($data->access_token);

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.intra.42.fr/v2/me",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_TIMEOUT => 30000,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        // Set Here Your Requesred Headers
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
                    dd(json_decode($response));
                }
            }
        } else {
            dd($request->get('access_token'));
        }
        
        // dd($code);

        // $endpoint = "https://api.intra.42.fr/oauth/token";
        // $client = new Client();

        // $response = $client->request('POST', 'https://api.intra.42.fr/oauth/token', ['form_params' => [
        //     'grant_type' => 'authorization_code', 
        //     'client_id' => 'd09541ef67f0d52638c2e89899f79c6165b57e1fea5e032d386a673ce9913c7d',
        //     'client_secret' => '3af5c01251f5ada3ce59b84b15aab884f83f12d5058219d99329afe242e21830',
        //     'code' => $code,
        //     'redirect_uri' => 'http://hypertube42.com/login/42/callback'
        // ]]);

        
        // dd($data1);

        

        // $client = new Client(['headers' => ['Authorization: Bearer' => '59a4c9dc8c725e00991b527aa928e3210fa171f32c39787136d79fb2b5ad08ad']]);

        // $response = $client->request('GET', 'https://api.intra.42.fr/v2/me');

        // $statusCode = $response->getStatusCode();
        // $content = $response->getBody();
        // dd($response, $content);

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
            'username'  => $githubUser->nickname == null ? 'test' : $githubUser->nickname,
            'first_name'  => $githubUser->name,
            'email'     => $githubUser->email,
            'photo_src' => $githubUser->avatar,
            'email_verified_at' => date("Y-m-d H:i:s"),
        ])->save();
        return $user;
    }
}
