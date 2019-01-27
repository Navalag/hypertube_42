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
        if ($genres != null) {


            if ($type == "movies") {
                $i = 0;
                foreach ($genres as $value) {
                    ($value == "Action" || $value == "Бойовик") ? $res[$i] = '28' : 0;
                    ($value == "Adventure" || $value == "Пригоди") ? $res[$i] = '12' : 0;
                    ($value == "Animation" || $value == "Мультфільм") ? $res[$i] = '16' : 0;
                    ($value == "Comedy" || $value == "Комедія") ? $res[$i] = '35' : 0;
                    ($value == "Crime" || $value == "Кримінал") ? $res[$i] = '80' : 0;
                    ($value == "Documentary" || $value == "Документальний") ? $res[$i] = '99' : 0;
                    ($value == "Drama" || $value == "Драма") ? $res[$i] = '18' : 0;
                    ($value == "Family" || $value == "Сімейний") ? $res[$i] = '10751' : 0;
                    ($value == "Fantasy" || $value == "Фвнтастика") ? $res[$i] = '14' : 0;
                    ($value == "History" || $value == "Історичний") ? $res[$i] = '36' : 0;
                    ($value == "Horror" || $value == "Жахи") ? $res[$i] = '27' : 0;
                    ($value == "Music" || $value == "Мюзикл") ? $res[$i] = '10402' : 0;
                    ($value == "Mystery" || $value == "Детектив") ? $res[$i] = '9648' : 0;
                    ($value == "Romance" || $value == "Романтичний") ? $res[$i] = '10749' : 0;
                    ($value == "Science Fiction" || $value == "Наукова фантастика") ? $res[$i] = '878' : 0;
                    ($value == "TV Movie") ? $res[$i] = '10770' : 0;
                    ($value == "Thriller" || $value == "Трилер") ? $res[$i] = '53' : 0;
                    ($value == "War" || $value == "Військовий") ? $res[$i] = '10752' : 0;
                    ($value == "Western" || $value == "Вестерн") ? $res[$i] = '37' : 0;
                    $i++;
                }
            } else if ($type == "tvshows") {
                $i = 0;
                foreach ($genres as $value) {
                    ($value == "Action & Adventure" || $value == "Бойовик") ? $res[$i] = '10759' : 0;
                    ($value == "Animation" || $value == "Мультфільм") ? $res[$i] = '16' : 0;
                    ($value == "Comedy" || $value == "Комедія") ? $res[$i] = '35' : 0;
                    ($value == "Crime" || $value == "Кримінал") ? $res[$i] = '80' : 0;
                    ($value == "Documentary" || $value == "Документальний") ? $res[$i] = '99' : 0;
                    ($value == "Drama" || $value == "Драма") ? $res[$i] = '18' : 0;
                    ($value == "Family" || $value == "Сімейний") ? $res[$i] = '10751' : 0;
                    ($value == "Kids" || $value == "Дитячий") ? $res[$i] = '10762' : 0;
                    ($value == "Mystery" || $value == "Детектив") ? $res[$i] = '9648' : 0;
                    ($value == "News" || $value == "Новини") ? $res[$i] = '10763' : 0;
                    ($value == "Reality" || $value == "Реаліті") ? $res[$i] = '10764' : 0;
                    ($value == "Sci-Fi & Fantasy" || $value == "Фантастика") ? $res[$i] = '10765' : 0;
                    ($value == "Soap" || $value == "Мильні драми") ? $res[$i] = '10766' : 0;
                    ($value == "Talk" || $value == "Шоу") ? $res[$i] = '10767' : 0;
                    ($value == "War & Politics" || $value == "Війна та політика") ? $res[$i] = '10768' : 0;
                    ($value == "Western" || $value == "Вестерн") ? $res[$i] = '37' : 0;
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
            ($type == "movies") ? $str = 'https://api.themoviedb.org/3/discover/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang : 0;
            ($type == "tvshows") ? $str = 'https://api.themoviedb.org/3/discover/tv?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang : 0;
        }

        if ($sort != null) {
            if ($type == "movies") {
                ($sort == "Popularity Descending" || $sort == "Популярність висока") ? $sort = 'popularity.desc' : 0;
                ($sort == "Popularity Ascending" || $sort == "Популярність низька") ? $sort = 'popularity.asc' : 0;
                ($sort == "Rating Descending" || $sort == "Рейтинг високий") ? $sort = 'vote_average.desc' : 0;
                ($sort == "Rating Ascending" || $sort == "Рейтинг низький") ? $sort = 'vote_average.asc' : 0;
                ($sort == "Release Date Descending" || $sort == "Реліз свіжий") ? $sort = 'primary_release_date.desc' : 0;
                ($sort == "Release Date Ascending" || $sort == "Реліз давній") ? $sort = 'primary_release_date.asc' : 0;
                ($sort == "Title Descending" || $sort == "Назва (А-Я)") ? $sort = 'original_title.desc' : 0;
                ($sort == "Title Ascending" || $sort == "Назва (Я-А)") ? $sort = 'original_title.asc' : 0;
                ($sort == "Revenue Descending" || $sort == "Бюджет зростання") ? $sort = 'revenue.desc' : 0;
                ($sort == "Revenue Ascending" || $sort == "Бюджет спадання") ? $sort = 'revenue.asc' : 0;
                ($sort != "none" && $sort != "-") ? $str .= '&sort_by=' . $sort : 0;
            } else if ($type == "tvshows") {
                ($sort == "Popularity Descending" || $sort == "Популярність висока") ? $sort = 'popularity.desc' : 0;
                ($sort == "Popularity Ascending" || $sort == "Популярність низька") ? $sort = 'popularity.asc' : 0;
                ($sort == "Rating Descending" || $sort == "Рейтинг високий") ? $sort = 'vote_average.desc' : 0;
                ($sort == "Rating Ascending" || $sort == "Рейтинг низький") ? $sort = 'vote_average.asc' : 0;
                ($sort == "Release Date Descending" || $sort == "Реліз свіжий") ? $sort = 'first_air_date.desc' : 0;
                ($sort == "Release Date Ascending" || $sort == "Реліз давній") ? $sort = 'first_air_date.asc' : 0;
                ($sort == "Title Descending" || $sort == "Назва (А-Я)") ? $sort = 'original_title.desc' : 0;
                ($sort == "Title Ascending" || $sort == "Назва (Я-А)") ? $sort = 'original_title.asc' : 0;
                ($sort != "none" && $sort != "-") ? $str .= '&sort_by=' . $sort : 0;
            }
        }

        if ($years != null) {
            $years_arr = [];
            $years = explode(' ', $years);
            $years_arr['min'] = $years[0] . '-01-01';
            $years_arr['max'] = $years[2] . '-12-31';
            ($type == "movies") ? $str .= '&primary_release_date.gte=' . $years_arr['min'] . '&primary_release_date.lte=' . $years_arr['max'] : 0;
            ($type == "tvshows") ? $str .= '&first_air_date.gte=' . $years_arr['min'] . '&first_air_date.lte=' . $years_arr['max'] : 0;
        }
        if ($rate != null) {
            $rate_arr = [];
            $rate = explode(' ', $rate);
            $rate_arr['min'] = (int)$rate[0];
            $rate_arr['max'] = (int)$rate[2];
            $str .= '&vote_average.gte=' . $rate_arr['min'] . '&vote_average.lte=' . $rate_arr['max'];
        }
        ($genres_str != null) ? $str .= '&with_genres=' . $genres_str : 0;
        $str .= '&include_adult=false&include_video=false&page=' . $page;
        $data = file_get_contents($str);
        return ($data);
    }

    public function search_request($needle, $page, $type, $lang)
    {
        ($type == "movies") ? $str = 'https://api.themoviedb.org/3/search/movie?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&query=' . urlencode($needle) . '&language=' . $lang . '&page=' . $page . '&include_adult=true' : 0;
        ($type == "tvshows") ? $str = 'https://api.themoviedb.org/3/search/tv?api_key=838ad56065a20c3380e39bdcd7c02442&language=en-US&query=' . urlencode($needle) . '&language=' . $lang . '&page=' . $page . '&include_adult=true' : 0;

        $data = file_get_contents($str);
        return ($data);
    }

    public function details_request($id, $type, $lang)
    {
        if ($type != null) {
            ($type == "movies") ? $detailed = 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang : 0;
            ($type == "tvshows") ? $detailed = 'https://api.themoviedb.org/3/tv/' . $id . '?api_key=838ad56065a20c3380e39bdcd7c02442&language=' . $lang : 0;


            $detailed_res = file_get_contents($detailed);

            return ($detailed_res);
        } else
            return;
    }

    public function getcast_request($id, $type)
    {
        //other language then en-us is not supported!
        ($type == "movies") ? $cast = 'https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;
        ($type == "tvshows") ? $cast = 'https://api.themoviedb.org/3/tv/' . $id . '/credits?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;

        $cast_res = file_get_contents($cast);
        return ($cast_res);
    }

    private function make_magnet($hash)
    {
        $magnet = 'magnet:?xt=urn:btih:' . $hash . '&tr=udp://open.demonii.com:1337/announce&tr=udp://tracker.openbittorrent.com:80&tr=udp://tracker.coppersurfer.tk:6969
       &tr=udp://glotorrents.pw:6969/announce&tr=udp://tracker.opentrackr.org:1337/announce&tr=udp://torrent.gresille.org:80/announce&tr=udp://p4p.arenabg.com:1337
       &tr=udp://tracker.leechers-paradise.org:6969';
        return ($magnet);
    }

    public function links_request($id, $type, $title, $lang)

    {
        $res = null;
        if ($type == "movies") {
            $pop_str = 'https://tv-v2.api-fetch.website/movie/' . $id;
            $pop_data = json_decode(file_get_contents($pop_str), true);
            $list_from_yts_str = 'https://yts.am/api/v2/list_movies.json?query_term=' . urlencode($title);
            $list_from_yts_arr = json_decode(file_get_contents($list_from_yts_str), true);
            $res = [];
            $i = 0;
            if (isset($list_from_yts_arr['data']['movies'])) {
                $inner_movies_arr = $list_from_yts_arr['data']['movies'];
                $res['YTS'] = [];

                foreach ($inner_movies_arr as $value) {
                    if ($value['imdb_code'] == $id) {
                        $new = [];
                        $new['lang'] = $value['language'];
                        $new['imdb'] = $value['imdb_code'];
                        foreach ($value['torrents'] as $subvalue) {

                            $new['hash'] = $subvalue['hash'];
                            $new['quality'] = $subvalue['quality'];
                            $new['size'] = $subvalue['size'];
                            $new['magnet'] = $this->make_magnet($subvalue['hash']);
                            $res['YTS'][$i] = $new;
                            $i++;
                        }

                    }
                }
            }
            if ($pop_data) {
                $res['popcorn'] = [];
                $pop_torrents = $pop_data['torrents'];
                $i = 0;

                foreach ($pop_torrents as $key => $value) {
                    $new = [];
                    $new['lang'] = $key;
                    foreach ($value as $key => $subvalue) {
                        $new['quality'] = $key;
                        $new['size'] = $subvalue['filesize'];
                        $new['magnet'] = $subvalue['url'];
                        $res['popcorn'][$i] = $new;
                    }
                    $i++;
                }
            }
        } else if ($type == "tvshows") {
            $pop_str = 'https://tv-v2.api-fetch.website/show/' . $id;
            $pop_data = json_decode(file_get_contents($pop_str), true);
            if ($pop_data)
                $res = $pop_data['episodes'];
        }
        return (json_encode($res));
    }

    public function get_external_ids_request($type, $id)
    {
        $uri = '';

        ($type == "movies") ? $uri = 'https://api.themoviedb.org/3/movie/' . $id . '/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;
        ($type == "tvshows") ? $uri = 'https://api.themoviedb.org/3/tv/' . $id . '/external_ids?api_key=838ad56065a20c3380e39bdcd7c02442' : 0;
        $data = file_get_contents($uri);
        $imdb_arr = json_decode($data, true);
        $imdb_id = $imdb_arr['imdb_id'];

        $res['tmdb_id'] = $id;
        $res['imdb_id'] = $imdb_id;

        return $res;
    }

    public function get_subtitles_list($title, $type, $season, $episode, $hash,$lang)
    {
        if  ($this->validate_subtitles_request($type, $season, $episode)) {
            $response = null;
            $client = \KickAssSubtitles\OpenSubtitles\Client::create([
                'username' => '',
                'password' => '',
                'useragent' => 'hypertube2'
            ]);
            if ($type == "movies") {

                    $response = $client->searchSubtitles([
                        [
                            'sublanguageid' => $lang,
                            'moviehash' => $hash,
                            'query' => $title
                        ]
                    ]);

            } else if ($type == "tvshows") {
                    $response = $client->searchSubtitles([
                        [
                            'sublanguageid' => $lang,
                            'moviehash' => $hash,
                            'query' => $title,
                            'season' => $season,
                            'episode' => $episode
                        ]
                    ]);
            }
            return $response;
        }
        else
            return "penetration";
    }

    private function validate_subtitles_request( $type, $season, $episode)
    {
        $error = 1;
        if (!is_null($type)) {
            if (preg_match('/^[a-zA-Z]*$/', $type))
                ;
            else
                $error = 0;
        }
        if (!is_null($season)) {
                if (preg_match('/^[0-9]*$/', $season))
                    ;
                else
                    $error = 0;
        }
        if (!is_null($episode)) {
            if (preg_match('/^[0-9]*$/', $episode))
                ;
            else
                $error = 0;
        }
        return $error;
    }
}

?>