<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\SearchClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function postSearch(Request $request)
    {
        $search = new SearchClass;
        $params = $request->all();
        if($params['method'] == "search")
        {
            $page = (int)$params['page'];
            $data = $search->discover_request($page);
            return($data);
        }
        if($params['method'] == "live_search")
        {
             $page = (int)$params['page'];
             $needle = $params['needle'];
             $data = $search->search_request($needle, $page);
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
