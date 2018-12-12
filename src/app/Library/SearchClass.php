<?php namespace App\Library;

use TorrentAPI\TorrentAPI;
use Xurumelous\TorrentScraper\TorrentScraperService;

class SearchClass
{
    public function discover_request($page, $sort, $years, $rate, $genres, $type)
    {
        $res = [];
       // dd($genres);
        if ($genres != null) {


            if ($type == "movies") {
                $i = 0;
                foreach ($genres as $value) {
                    ($value == "Action") ? $res[$i] = '28' : 0;
                    ($value == "Adventure") ? $res[$i] = '12' : 0;
                    ($value == "Animation") ? $res[$i] = '16' : 0;
                    ($value == "Comedy") ? $res[$i] = '35' : 0;
                    ($value == "Crime") ? $res[$i] = '80' : 0;
                    ($value == "Documentary") ? $res[$i] = '99' : 0;
                    ($value == "Drama") ? $res[$i] = '18' : 0;
                    ($value == "Family") ? $res[$i] = '10751' : 0;
                    ($value == "Fantasy") ? $res[$i] = '14' : 0;
                    ($value == "History") ? $res[$i] = '36' : 0;
                    ($value == "Horror") ? $res[$i] = '27' : 0;
                    ($value == "Music") ? $res[$i] = '10402' : 0;
                    ($value == "Mystery") ? $res[$i] = '9648' : 0;
                    ($value == "Romance") ? $res[$i] = '10749' : 0;
                    ($value == "Science Fiction") ? $res[$i] = '878' : 0;
                    ($value == "TV Movie") ? $res[$i] = '10770' : 0;
                    ($value == "Thriller") ? $res[$i] = '53' : 0;
                    ($value == "War") ? $res[$i] = '10752' : 0;
                    ($value == "Western") ? $res[$i] = '37' : 0;
                    $i++;
                }
            }
            else if ($type == "tvshows")
            {
                $i = 0;
                foreach ($genres as $value) {
                    ($value == "Action & Adventure") ? $res[$i] = '10759' : 0;
                    ($value == "Animation") ? $res[$i] = '16' : 0;
                    ($value == "Comedy") ? $res[$i] = '35' : 0;
                    ($value == "Crime") ? $res[$i] = '80' : 0;
                    ($value == "Documentary") ? $res[$i] = '99' : 0;
                    ($value == "Drama") ? $res[$i] = '18' : 0;
                    ($value == "Family") ? $res[$i] = '10751' : 0;
                    ($value == "Kids") ? $res[$i] = '10762' : 0;
                    ($value == "Mystery") ? $res[$i] = '9648' : 0;
                    ($value == "News") ? $res[$i] = '10763' : 0;
                    ($value == "Reality") ? $res[$i] = '10764' : 0;
                    ($value == "Sci-Fi & Fantasy") ? $res[$i] = '10765' : 0;
                    ($value == "Soap") ? $res[$i] = '10766' : 0;
                    ($value == "Talk") ? $res[$i] = '10767' : 0;
                    ($value == "War & Politics") ? $res[$i] = '10768' : 0;
                    ($value == "Western") ? $res[$i] = '37' : 0;
                    $i++;
                }

            }
        }
        $genres_str = null;
        foreach ($res as $value) {
            $genres_str .= $value . ',';
        }
        $genres_str = trim($genres_str, ',');

        $lang = "en-US";

        if ($type != null) {
            ($type == "movies") ? $str = 'https://api.themoviedb.org/3/discover/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang : 0;
            ($type == "tvshows") ? $str = 'https://api.themoviedb.org/3/discover/tv?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang : 0;
        }
        //else
          //  $str = 'https://api.themoviedb.org/3/discover/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang;


        if($sort != null)
        {
            if($type == "movies") {
                ($sort == "Popularity Descending") ? $sort = 'popularity.desc' : 0;
                ($sort == "Popularity Ascending") ? $sort = 'popularity.asc' : 0;
                ($sort == "Rating Descending") ? $sort = 'vote_average.desc' : 0;
                ($sort == "Rating Ascending") ? $sort = 'vote_average.asc' : 0;
                ($sort == "Release Date Descending") ? $sort = 'primary_release_date.desc' : 0;
                ($sort == "Release Date Ascending") ? $sort = 'primary_release_date.asc' : 0;
                ($sort == "Title Descending") ? $sort = 'original_title.desc' : 0;
                ($sort == "Title Ascending") ? $sort = 'original_title.asc' : 0;
                ($sort == "Revenue Descending") ? $sort = 'revenue.desc' : 0;
                ($sort == "Revenue Ascending") ? $sort = 'revenue.asc' : 0;
                ($sort != "none") ? $str .= '&sort_by=' . $sort : 0;
            }
            else if($type == "tvshows")
            {
                ($sort == "Popularity Descending") ? $sort = 'popularity.desc' : 0;
                ($sort == "Popularity Ascending") ? $sort = 'popularity.asc' : 0;
                ($sort == "Rating Descending") ? $sort = 'vote_average.desc' : 0;
                ($sort == "Rating Ascending") ? $sort = 'vote_average.asc' : 0;
                ($sort == "Release Date Descending") ? $sort = 'first_air_date.desc' : 0;
                ($sort == "Release Date Ascending") ? $sort = 'first_air_date.asc' : 0;
                ($sort == "Title Descending") ? $sort = 'original_title.desc' : 0;
                ($sort == "Title Ascending") ? $sort = 'original_title.asc' : 0;
                ($sort != "none") ? $str .= '&sort_by=' . $sort : 0;
            }
        }
        $str .= '&include_adult=false&include_video=false&page='.$page;
        if($years != null)
        {
            $years_arr = [];
            $years = explode(' ', $years);
            $years_arr['min'] = $years[0].'-01-01';
            $years_arr['max'] = $years[2].'-12-31';
            ($type == "movies") ? $str .='&primary_release_date.gte='.$years_arr['min'].'&primary_release_date.lte='.$years_arr['max'] : 0;
            ($type == "tvshows") ? $str .='&first_air_date.gte='.$years_arr['min'].'&first_air_date.lte='.$years_arr['max'] : 0;

        }
        if($rate != null)
        {
            $rate_arr = [];
            $rate = explode(' ', $rate);
            $rate_arr['min'] = (int)$rate[0];
            $rate_arr['max'] = (int)$rate[2];
            $str .='&vote_average.gte='.$rate_arr['min'].'&vote_average.lte='.$rate_arr['max'];
        }
        ($genres_str != null) ? $str .= '&with_genres='.$genres_str : 0;
        $data = file_get_contents($str);
        return ($data);
    }

    public function search_request($needle, $page, $type)
    {

        ($type == "movies") ? $str = 'https://api.themoviedb.org/3/search/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&query='.urlencode($needle).'&page='.$page.'&include_adult=true' : 0;
        ($type == "tvshows") ? $str = 'https://api.themoviedb.org/3/search/tv?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&query='.urlencode($needle).'&page='.$page.'&include_adult=true' : 0;

        $data = file_get_contents($str);
        return ($data);
    }

    public function details_request($id)
    {
        $detailed = 'https://api.themoviedb.org/3/movie/'.$id.'?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&append_to_response=videos';

        $detailed_res = file_get_contents($detailed);

        return ($detailed_res);
    }

    public function getcast_request($id)
    {
        $cast = 'https://api.themoviedb.org/3/movie/'.$id.'/credits?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US';

        $cast_res = file_get_contents($cast);

        return ($cast_res);
    }


    public function links_request($id)
    {
        $pop_str = 'https://tv-v2.api-fetch.website/movie/'.$id;
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
                $new['data']['imdb'] = $id;
                array_push($res[$i], $new);
            }
            // array_push($res[], $value);
            $i++;
        }

       // $more_str = 'https://hydramovies.com/api-v2/?source=http://hydramovies.com/api-v2/current-Movie-Data.csv&imdb_id='.$id;
       // $more_data = json_decode(file_get_contents($more_str), true);

       /* $torrentAPI = new TorrentAPI('Hypertube');

        $popularMovies = $torrentAPI->query([
            "mode" => "search",
            "search_string" => $title,
            "category" => "movie",

        ]);*/


      // $token = file_get_contents('https://torrentapi.org/pubapi_v2.php?get_token=get_token');
      // dd($token);


     // $API_URL = 'https://api.myshows.me/v2/rpc/';

        //working request to myshows api
       /* $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.myshows.me/v2/rpc/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "
        {\n  \"jsonrpc\": \"2.0\",\n  \"method\": \"shows.Top\",\n  \"params\": {\n    \"mode\": \"all\",\n    \"count\": 500\n  },\n  \"id\": 1\n\n}");
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "Accept: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);*/

     //   $str = 'https://tv-v2.api-fetch.website/animes/page?sort=rating&order=-1&genre=all';
      //  $result = file_get_contents($str);
      /*  echo "<pre>";
        print_r(json_decode($result));
        echo "<pre>";*/

        return (json_encode($res));
    }


    public function get_subtitles_list($title, $imdb)
    {
        $result = [];
        $client = \KickAssSubtitles\OpenSubtitles\Client::create([
            'username'  => '',
            'password'  => '',
            'useragent' => 'hypertube2'
        ]);

        $response = $client->searchSubtitles([
            [
                'sublanguageid' => 'eng',
                //'imdbid' => $imdb,
                'query' => $title
            ]
        ]);
        return $response;
    }

}

?>