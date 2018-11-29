<?php namespace App\Library;

class SearchClass
{
    public function discover_request($page, $sort, $years, $rate, $genres)
    {
        $res = [];
        if ($genres != null) {

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
        $genres_str = null;
        foreach ($res as $value)
        {
            $genres_str .= $value.',';
        }
        $genres_str = trim($genres_str, ',');

        $lang = "en-US";

        $str = 'https://api.themoviedb.org/3/discover/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language='.$lang;
        if($sort != null)
        {
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
            ($sort != "none") ? $str .= '&sort_by='.$sort : 0;
        }
        $str .= '&include_adult=false&include_video=false&page='.$page;
        if($years != null)
        {
            $years_arr = [];
            $years = explode(' ', $years);
            $years_arr['min'] = $years[0].'-01-01';
            $years_arr['max'] = $years[2].'-12-31';
            $str .='&primary_release_date.gte='.$years_arr['min'].'&primary_release_date.lte='.$years_arr['max'];
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

    public function search_request($needle, $page)
    {

        $str = 'https://api.themoviedb.org/3/search/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&query='.urlencode($needle).'&page='.$page.'&include_adult=true';
        $data = file_get_contents($str);
        return ($data);
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