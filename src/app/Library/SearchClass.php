<?php 
namespace App\Library;

use TorrentAPI\TorrentAPI;
use Xurumelous\TorrentScraper\TorrentScraperService;

class SearchClass
{
    public function discover_request($page, $sort, $years, $rate, $genres, $type, $lang)
    {
        $res = [];
        $str = '';
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


        if ($type != null) {
            ($type == "movies") ? $str = 'https://api.themoviedb.org/3/discover/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language='.$lang : 0;
            ($type == "tvshows") ? $str = 'https://api.themoviedb.org/3/discover/tv?api_key=838ad56065a20c3380e39bdcd7c02442&language='.$lang : 0;
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
        $str .= '&include_adult=false&include_video=false&page='.$page;
        $data = file_get_contents($str);
        return ($data);
    }

    public function search_request($needle, $page, $type, $lang)
    {

        ($type == "movies") ? $str = 'https://api.themoviedb.org/3/search/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&query='.urlencode($needle).'&language='.$lang.'&page='.$page.'&include_adult=true' : 0;
        ($type == "tvshows") ? $str = 'https://api.themoviedb.org/3/search/tv?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&query='.urlencode($needle).'&language='.$lang.'&page='.$page.'&include_adult=true' : 0;

        $data = file_get_contents($str);
        return ($data);
    }

    public function details_request($id, $type, $lang)
    {
        if ($type != null)
        {
            ($type == "movies") ? $detailed = 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang : 0;
            ($type == "tvshows") ? $detailed = 'https://api.themoviedb.org/3/tv/' . $id . '?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang : 0;


            $detailed_res = file_get_contents($detailed);

            return ($detailed_res);
        }
        else
            return ;
    }

    public function getcast_request($id, $type)
    {
        //other language then en-us is not supported!
        ($type == "movies") ? $cast = 'https://api.themoviedb.org/3/movie/'.$id.'/credits?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;
        ($type == "tvshows") ? $cast = 'https://api.themoviedb.org/3/tv/'.$id.'/credits?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;

        $cast_res = file_get_contents($cast);

        return ($cast_res);
    }

    private function make_magnet($hash)
    {
        return ("fuck");
    }


    public function links_request($id, $type, $title, $lang)

    {

        if($type == "movies")
        {
            $pop_str = 'https://tv-v2.api-fetch.website/movie/' . $id;
            $pop_data = json_decode(file_get_contents($pop_str), true);
            $list_from_yts_str = 'https://yts.am/api/v2/list_movies.json?query_term='.urlencode($title);
            $list_from_yts_arr = json_decode(file_get_contents($list_from_yts_str), true);
            //$yts_imdb_id = $list_from_yts_arr['data']['movies'][0]['imdb_code'];
           /* echo "<pre>";
                print_r($list_from_yts_arr);
            echo "<pre>";*/
            $res = [];
            $i = 0;
            if(isset($list_from_yts_arr['data']['movies']))
            {
                $inner_movies_arr = $list_from_yts_arr['data']['movies'];
                $yts_torr_arr = [];

                $res['YTS'] = [];

                    foreach($inner_movies_arr as $value)
                    {
                        if($value['imdb_code'] == $id)
                        {
                            $new = [];
                            $new['lang'] = $value['language'];
                            $new['imdb'] = $value['imdb_code'];
                            foreach($value['torrents'] as $subvalue)
                            {

                                $new['hash'] = $subvalue['hash'];
                                $new['quality'] = $subvalue['quality'];
                                $new['size'] = $subvalue['size'];
                                $new['magnet'] = $this->make_magnet($subvalue['hash']);
                                //print_r($new);
                                $res['YTS'][$i] = $new;
                                $i++;
                            }

                         }
                    }
            }
            if($pop_data)
            {
            $res['popcorn'] = [];
            $title = $pop_data['title'];
            $pop_torrents = $pop_data['torrents'];
            $i = 0;

                foreach ($pop_torrents as $key => $value) {
                    $new = [];
                    $new['lang'] = $key;
                    foreach ($value as $key => $subvalue) {
                        $new['quality'] = $key;
                        $new['size'] = $subvalue['filesize'];
                        $new['magnet'] = $subvalue['url'];
                        $res['popcorn'][$i] =  $new;
                    }
                     //$res['popcorn'] = $new;
                    $i++;
                }
            }
        }
        else if ($type == "tvshows")
        {
            $pop_str = 'https://tv-v2.api-fetch.website/show/' . $id;
            $pop_data = json_decode(file_get_contents($pop_str), true);
            $res = $pop_data['episodes'];
        }
        return (json_encode($res));
    }

    public function get_external_ids_request($type, $id) {
        $uri = '';

        ($type == "movies") ? $uri = 'https://api.themoviedb.org/3/movie/'.$id.'/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;
        ($type == "tvshows") ? $uri = 'https://api.themoviedb.org/3/tv/'.$id.'/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;
        $data = file_get_contents($uri);
        $imdb_arr = json_decode($data, true);
        $imdb_id = $imdb_arr['imdb_id'];

        $res['tmdb_id'] = $id;
        $res['imdb_id'] = $imdb_id;

        return $res;
    }

    public function get_subtitles_list($title, $imdb, $type, $season, $episode, $lang)
    {
        $result = [];

        $client = \KickAssSubtitles\OpenSubtitles\Client::create([
            'username'  => '',
            'password'  => '',
            'useragent' => 'hypertube2'
        ]);
        if($type == "movies")
        {
            if($lang != null) {
                $response = $client->searchSubtitles([
                    [
                        'sublanguageid' => $lang,
                        //'imdbid' => $imdb,
                        'query' => $title
                    ]
                ]);
            }
            else if($lang == null)
            {
                $response = $client->searchSubtitles([
                    [
                        'query' => $title
                    ]
                ]);
            }
        }
        else if($type == "tvshows")
        {
            if($lang != null) {
                $response = $client->searchSubtitles([
                    [
                        'sublanguageid' => $lang,
                        'query' => $title,
                        'season' => $season,
                        'episode' => $episode
                        //'imdbid' => $imdb,

                    ]
                ]);
            }
            else if($lang == null)
            {
                $response = $client->searchSubtitles([
                    [
                        'query' => $title,
                        'season' => $season,
                        'episode' => $episode
                        //'imdbid' => $imdb,

                    ]
                ]);
            }
        }
        return $response;
    }

}

?>