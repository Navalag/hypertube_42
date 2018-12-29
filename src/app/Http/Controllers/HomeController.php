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

        return true;
    }

    public function postHome(Request $request)
    {
        $search = new SearchClass;
        $params = $request->all();
        if($params['method'] == "search")
        {
            if($this->validate_search_request($params)) {
                $page = (int)$params['page'];
                $data = $search->discover_request($page, $params['sort'], $params['years'], $params['rate'], $params['genres'], $params['type'], $params['lang']);
                return ($data);
            }
            else
            {
                //return penetration view;
                return ;
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
           // $id_request = 'https://api.themoviedb.org/3/movie/'.(int)$id.'/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442';
           // $movie_id = file_get_contents($id_request);




            //$pop_str = 'https://tv-v2.api-fetch.website/movie/'.$imdb_id;
            //$pop_data = file_get_contents($pop_str);
            //var_dump($pop_data);

       return view('home');
    }
}
