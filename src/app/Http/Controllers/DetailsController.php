<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;


class DetailsController extends Controller {


    public function getDetails($id)
    {
        $str = 'https://api.themoviedb.org/3/movie/'.(int)$id.'/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442';
        $data = file_get_contents($str);

        $imdb_arr = json_decode($data, true);
        $imdb_id = $imdb_arr['imdb_id'];
        var_dump($imdb_id);

        $detailed = 'https://api.themoviedb.org/3/find/'.$imdb_id.'?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&external_source=imdb_id';

        $detailed_res = json_decode(file_get_contents($detailed), true);
        $title = $detailed_res['movie_results'][0]['title'];
        /*echo "<pre>";
            print_r($detailed_res);
            echo $title;
        echo "<pre>";*/

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
        }*/
        //echo "<pre>";
          //  print_r($sub_data_parsed);
        //echo "</pre>";
      //  $file = file_get_contents($sub_data_parsed[12]['en']);
        //var_dump($file);

        $client = \KickAssSubtitles\OpenSubtitles\Client::create([
            'username'  => '',
            'password'  => '',
            'useragent' => 'hypertube2'
        ]);
       // echo "<pre>";
            //var_dump($client);
       // echo "</pre>";
        $response = $client->searchSubtitles([
            [
                'query' => $title
            ]
        ]);
        echo "<pre>";
            var_dump($response);
        echo "<pre>";




        return view('details')->with('popcorn', $pop_torrents);
    }

    public function playMovie()
    {
        $link = $_POST['link'];
        \Session::put('link', $link);
        return ("fuck");
    }

}
?>