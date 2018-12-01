<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\SearchClass;


class DetailsController extends Controller {



    public function getDetails($id)
    {

        return view('details')->with('movie_id', $id);
    }


    public function putDetails(Request $request)
    {
        $search = new SearchClass;
        $params = $request->all();
        $result = [];
        $subtitles = $search->get_subtitles_list($params['title'], $params['imdb']);

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
        return json_encode($result);
    }


    public function postDetails(Request $request)
    {
        $search = new SearchClass;
        $params = $request->all();
        if($params['method'] == "ignition")
        {
            $str = 'https://api.themoviedb.org/3/movie/' .(int)$params['id']. '/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442';
            $data = file_get_contents($str);
            $imdb_arr = json_decode($data, true);
            $imdb_id = $imdb_arr['imdb_id'];


            return ($imdb_id);
        }
        if($params['method'] == "details")
        {

            $detailed = 'https://api.themoviedb.org/3/find/'.$params['id']. '?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&external_source=imdb_id';

            $detailed_res = file_get_contents($detailed);

            return ($detailed_res);
        }
        if($params['method'] == "link")
        {
            $pop_str = 'https://tv-v2.api-fetch.website/movie/'.$params['id'];
            $pop_data = json_decode(file_get_contents($pop_str), true);
            $res = [];
            $i = 0;
            $title = $pop_data['title'];
            $pop_torrents = $pop_data['torrents'];

            foreach ($pop_torrents as $key => $value) {
                $new = [];
                $new['lang'] = $key;
                $res[$i] = $new;
                    foreach ($value as $key => $subvalue)
                    {
                        $new = [];
                       /* echo "<pre>";
                            print_r($value);
                            echo "<hr>";
                        echo "<pre>";*/
                        $new['resolution'] = $key;
                        $new['data'] = $subvalue;
                        $new['data']['title'] = $title;
                        $new['data']['imdb'] = $params['id'];
                        array_push($res[$i], $new);
                    }
               // array_push($res[], $value);
                $i++;
            }

            return (json_encode($res));
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