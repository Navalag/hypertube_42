<?php namespace App\Library;

class SearchClass
{
    public function discover_request($page)
    {

        $str = 'https://api.themoviedb.org/3/discover/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page='.$page;
        $data = file_get_contents($str);
        return ($data);
    }

    public function search_request($needle, $page)
    {

        $str = 'https://api.themoviedb.org/3/search/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&query='.urlencode($needle).'&page='.$page.'&include_adult=false';
        $data = file_get_contents($str);
        return ($data);
    }

}

?>