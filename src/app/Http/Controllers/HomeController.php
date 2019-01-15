<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\SearchClass;
use App\Http\Controllers\Film\FilmController;
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
        $error = 1;
            if (!is_null($params['sort'])) {
                if($params['lang'] == "en-US") {
                    if (preg_match('/^[a-zA-Z\s]*$/', $params['sort']))
                        ;
                    else
                        $error = 0;
                }
               if($params['lang'] == "uk-UA") {
                    if (preg_match('/^[a-zA-Z\p{Cyrillic}\s\-()]+$/u', $params['sort']))
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
                        if (preg_match('/^[a-zA-Z\s&amp\-]*$/', $value))
                            ;
                        else
                            $error = 0;
                    }
                }
                if($params['lang'] == "uk-UA") {
                    foreach ($params['genres'] as $value) {
                        if (preg_match('/^[a-zA-Z\p{Cyrillic}\s&amp\-]+$/u', $value))
                            ;
                        else
                            $error = 0;
                    }
                }
            }
        return $error;
    }

    public function postHome(Request $request)
    {
        $search = new SearchClass;
        $film = new FilmController;
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
            return $film->getWatchedFilmsForUser(\Auth::user()->id);
        }
        return view('home');
    }
}
