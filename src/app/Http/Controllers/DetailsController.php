<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\SearchClass;


class DetailsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function getDetails($id)
    {
        return view('details')->with('movie_id', $id);
    }


    public function putDetails(Request $request)
    {
        $search = new SearchClass;
        $params = $request->all();
        $result = [];
        $lang = null;
        ($params['lang'] == "en-US") ? $lang = 'eng' : 0;
        ($params['lang'] == "uk-UA") ? $lang = 'ukr' : 0;
        $subtitles = $search->get_subtitles_list($params['title'], $params['imdb'], $params['type'], $params['season'], $params['episode'], $lang);

        $result['movie'] = $params;
        $result['subs'] = (array)$subtitles;
        /* very dumb crutch below. i don't know how to convert object to array properly, so there is used (array) typecast,
        which resulting with this motherfucking symbols \u0000*\u0000 in array keys. It is possible to access this properties
        in json parsed array, but will look like "object.property.["motherfucking\u0000*\u0000property"].property", so i have
        added a dumb crutch which  cuts fucking symbols*/
            foreach ($result['subs'] as $key => $value)
            {
                if($key[1] === "*") {
                    $result['subs'][substr($key, 3)] = $result['subs'][$key];
                    unset($result['subs'][$key]);
                }
            }
        $subtitles_all = $search->get_subtitles_list($params['title'], $params['imdb'], $params['type'], $params['season'], $params['episode'], null);

         $result['allsubs'] =  (array)$subtitles_all;

        foreach ($result['allsubs'] as $key => $value)
        {
            if($key[1] === "*") {
                $result['allsubs'][substr($key, 3)] = $result['allsubs'][$key];
                unset($result['allsubs'][$key]);
            }
        }

        return json_encode($result);
    }


    public function postDetails(Request $request)
    {
        $search = new SearchClass;
        $params = $request->all();

        if(isset($params['raw_id']))
        {
            $id_arr = explode('_', $params['raw_id']);

            $type = $id_arr[0];
            $id = (int)$id_arr[1];

        }
        $res = [];
        if($params['method'] == "ignition")
        {
            if($id != null)
            {

                ($type == "movies") ? $str = 'https://api.themoviedb.org/3/movie/'.$id.'/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;
                ($type == "tvshows") ? $str = 'https://api.themoviedb.org/3/tv/'.$id.'/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;
                $data = file_get_contents($str);
                $imdb_arr = json_decode($data, true);
                $imdb_id = $imdb_arr['imdb_id'];
                $detailed = json_decode($search->details_request($id, $type, $params['lang']), true);
                $res[0] = $id;
                $res[1] = $imdb_id;
                $res[2] = $type;
                if($type == "tvshows")
                    $res[3] = $detailed['name'];
                else if($type == "movies")
                    $res[3] = $detailed['original_title'];
                return ($res);
            }
            else
                return ;
        }
        if($params['method'] == "details")
        {
            $detailed = $search->details_request($params['id'], $params['type'], $params['lang']);

            return ($detailed);
        }
        if($params['method'] == "getcast")
        {
            $movie_cast = $search->getcast_request($params['id'], $params['type']);

            return ($movie_cast);
        }
        if($params['method'] == "link")
        {
            $links = $search->links_request($params['id'], $params['type'], $params['title'], $params['lang']);

          return ($links);
        }
         //   $title = $detailed_res['movie_results'][0]['title'];
        /*echo "<pre>";
            print_r($detailed_res);
            echo $title;
        echo "<pre>";

        $pop_str = 'https://tv-v2.api-fetch.website/movie/'.$imdb_id;
        $pop_data = file_get_contents($pop_str);


        $pop_magnet_arr = json_decode($pop_data, true);
        $pop_torrents = $pop_magnet_arr['torrents'];

        //$sub_str = 'https://subtitle-api.org/videos/'.$imdb_id.'/subtitles?Number%20of%20subtitles%20to%20retrieve=20';
        //$sub_data = json_decode(file_get_contents($sub_str), true);
        $sub_data_parsed = [];

      /*  foreach($sub_data['items'] as $value)
        {
            $key = $value['language'];
            echo "<pre>";
            print_r($sub_data['items']);
            echo "</pre>";
            $newarr = [];
            $newarr[$key] = $value['downloadPage'];
          //  array_push($sub_data_parsed, $newarr);
        }
        //echo "<pre>";
          //  print_r($sub_data_parsed);
        //echo "</pre>";
      //  $file = file_get_contents($sub_data_parsed[12]['en']);
        //var_dump($file);*/

    }

}
?>