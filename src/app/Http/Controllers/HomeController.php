<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\SearchClass;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with('user_info', \Auth::user())->with('lang', \Session::get('locale')=='ua' ? 'Українська' : 'English');

    }

    public function validate_search_request($params)
    {
        //dd($params);
        $error = 1;
       //(preg_match('(ˆ[0-9]$)', $params['page'])) ? 0 : $error = 1;

            if (!is_null($params['sort'])) {
                if($params['lang'] == "en-US") {
                    if (preg_match('/^[a-zA-Z\s]*$/', $params['sort']))
                        ;
                    else
                        $error = 0;
                }
                if($params['lang'] == "uk-UA") {
                    if (preg_match('/^[a-zA-Z\p{Cyrillic}\s\-]+$/u', $params['sort']))
                        ;
                    else
                        $error = 0;
                }
            }
            if (!is_null($params['years'])) {
                if (preg_match('(^\d{1,4}\s{1}[-]{1}\s{1}\d{1,4}$)', $params['years']))
                    ;
                else
                    $error = 0;
            }
            if (!is_null($params['rate'])) {
                if (preg_match('(^\d{1,2}\s{1}[-]{1}\s{1}\d{1,2}$)', $params['rate']))
                    ;
                else
                    $error = 0;
            }
            if (!is_null($params['genres'])) {
                if($params['lang'] == "en-US") {
                    foreach ($params['genres'] as $value) {
                        if (preg_match('/^[a-zA-Z\s]*$/', $value))
                            ;
                        else
                            $error = 0;
                    }
                }
                if($params['lang'] == "uk-UA") {
                    foreach ($params['genres'] as $value) {
                        if (preg_match('/^[a-zA-Z\p{Cyrillic}\s\-]+$/u', $value))
                            ;
                        else
                            $error = 0;
                    }
                }
            }



        /*if($params['rate'] != null && preg_match('(^\d{1,4}\s{1}[-]{1}\s{1}\d{1,4}$)', $params['years']))
            ;
        else
            $error = 0;*/
      //  dd($error);
        return $error;
    }

    public function postHome(Request $request)
    {
        $search = new SearchClass;
        $params = $request->all();
       // dd($params);
        if($params['method'] == "search")
        {
            if($this->validate_search_request($params)) {
                $page = (int)$params['page'];
                $data = $search->discover_request($page, $params['sort'], $params['years'], $params['rate'], $params['genres'], $params['type'], $params['lang']);
                return ($data);
            }
            else
            {
                return "penetration";
            }
        }
        if($params['method'] == "live_search")
        {
            $page = (int)$params['page'];
            $needle = $params['needle'];
            $type = $params['type'];
            $data = $search->search_request($needle, $page, $type, $params['lang']);
            return($data);
        }
        if($params['method'] == "set_mark")
        {
            $arr = [];
            $arr[0] = "Venom";
            $arr[1] = "Bird Box";
            $arr[2] = "Creed II";
            return ($arr);
        }
           // $id_request = 'https://api.themoviedb.org/3/movie/'.(int)$id.'/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442';
           // $movie_id = file_get_contents($id_request);




            //$pop_str = 'https://tv-v2.api-fetch.website/movie/'.$imdb_id;
            //$pop_data = file_get_contents($pop_str);
            //var_dump($pop_data);

       return view('home');
    }
}
