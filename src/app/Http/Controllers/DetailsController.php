<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\SearchClass;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Film\FilmController;
use \Done\Subtitles\Subtitles;


class DetailsController extends Controller {

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function getDetails($movie_id)
    {
        $search = new SearchClass;
        $comments = new CommentController;
        $id_arr = explode('_', $movie_id);
        $type = $id_arr[0];
        $id = (int)$id_arr[1];
        $external_ids = $search->get_external_ids_request($type, $id);
        $lang = \Session::get('locale')=='ua' ? 'Українська' : 'English';
        ($lang == "English") ? $lang = "en-US" : 0;
        ($lang == "Українська") ? $lang = "uk-UA" : 0;
        $details = $search->details_request($id, $type, $lang);
        $details_temp = json_decode($details, true);
        ($type == "movies") ? $title = $details_temp['original_title'] : 0;
        ($type == "tvshows") ? $title = $details_temp['original_name'] : 0;
        unset($details_temp);
        $cast_details = $search->getcast_request($id, $type);
        $all_comments = $comments->getAllCommentsForFilm($movie_id);
        $details_temp = json_decode($details);
        $image = 'https://image.tmdb.org/t/p/original'.$details_temp->backdrop_path;
        unset($details_temp);
        ///cOtB6A7yI1WtJaiKAlXbbqZ64lQ.jpg
        return view('details')
             ->with('user_info', \Auth::user())
             ->with('movie_id', $movie_id)
             ->with('external_ids', $external_ids)
             ->with('details', json_decode($details, true))
             ->with('cast_details', json_decode($cast_details, true))
             ->with('comments', $all_comments)
             ->with('type', $type)
             ->with('title', $title)
             ->with('player_preview_img', $image)
             ->with('lang', \Session::get('locale')=='ua' ? 'Українська' : 'English');
    }

    public function putDetails(Request $request)
    {
        $search = new SearchClass;
        $film = new FilmController;
        $params = $request->all();
        $result = [];
        $lang = null;
        ($params['lang'] == "en-US") ? $lang = 'eng' : 0;
        ($params['lang'] == "uk-UA") ? $lang = 'ukr' : 0;
         $result['movie'] = $params;
        $hash = explode(':', $result['movie']['magnet'])[3];
        $hash = explode('&', $hash)[0];
        $subtitles = $search->get_subtitles_list($params['title'], $params['type'], $params['season'], $params['episode'], $hash, "ukr");
        if($subtitles != "penetration") {
            $result['subs'] = (array)$subtitles;  
        /* very dumb crutch below. i don't know how to convert object to array properly, so there is used (array) typecast,
        which resulting with this motherfucking symbols \u0000*\u0000 in array keys. It is possible to access this properties
        in json parsed array, but will look like "object.property.["motherfucking\u0000*\u0000property"].property", so i have
        added a dumb crutch which  cuts fucking symbols*/
        foreach ($result['subs'] as $key => $value) {
            if ($key[1] === "*") {
                $result['subs'][substr($key, 3)] = $result['subs'][$key];
                unset($result['subs'][$key]);
            }
        }
        $subtitles_all = $search->get_subtitles_list($params['title'],  $params['type'], $params['season'], $params['episode'], $hash, "eng");
         if($subtitles_all != "penetration") {
             $result['allsubs'] = (array)$subtitles_all;
             foreach ($result['allsubs'] as $key => $value) {
                 if ($key[1] === "*") {
                     $result['allsubs'][substr($key, 3)] = $result['allsubs'][$key];
                     unset($result['allsubs'][$key]);
                 }
             }
         }
         //   var hash = link.split(':')[3].split('&')[0];
          
            $result['subs_en'] = null;
            $result['subs_uk'] = null;
         if(!empty($result['subs']['response']['data'])) {
             foreach ($result['subs']['response']['data'] as $value)
             {
                if($value['MovieName'] == $params['title'])
                {
                     $this->downloadFile($value['SubDownloadLink'], $hash . 'uk');
             $result['subs_uk'] = $hash . 'uk.vtt';
                    break ;
                }
                
            }

            
         }
         if(!empty($result['allsubs']['response']['data'])) {
            foreach ($result['allsubs']['response']['data'] as $value)
             {
                if($value['MovieName'] == $params['title'])
                {
                     $this->downloadFile($value['SubDownloadLink'], $hash . 'en');
                    $result['subs_en'] = $hash . 'en.vtt';
                    break ;
                }
                
            }
            
         }
        $film->setFilmAsWatched($request, $params['id']);
        return json_encode($result);
        }
    }

    public function postDetails(Request $request)
    {
        $search = new SearchClass;
        $params = $request->all();

        if ($params['method'] == "link")
        {
            if($params['id'] != null) {
                $links = $search->links_request($params['id'], $params['type'], $params['title'], $params['lang']);
                return ($links);
            }
            else
                return ("noID");
        }
        if ($params['method'] == "redirect")
        {
            return response()->json(['redirect' => url('/')]);
        }

    }

    private function downloadFile($subtitles_url, $hash) {
        $subtitles_path = public_path() . '/subtitles/' . $hash . '.gz';
        $subtitles_gz = fopen($subtitles_path, "w") or die ("Unable to open file!");
        file_put_contents($subtitles_path, fopen($subtitles_url, 'r'));
        $this->unzipSubtitles($subtitles_path);
        Subtitles::convert(public_path() . '/subtitles/' . $hash . '.srt', public_path() . '/subtitles/' . $hash . '.vtt');
        unlink($subtitles_path);
        unlink(public_path() . '/subtitles/' . $hash . '.srt');
    }

    private function unzipSubtitles($file_name) {
        //This input should be from somewhere else, hard-coded in this example
        //$file_name = '2013-07-16.dump.gz';

        // Raising this value may increase performance
        $buffer_size = 4096; // read 4kb at a time
        $out_file_name = str_replace('.gz', '', $file_name . '.srt');

        // Open our files (in binary mode)
        $file = gzopen($file_name, 'rb');
        $out_file = fopen($out_file_name, 'wb');

        // Keep repeating until the end of the input file
        while (!gzeof($file)) {
            // Read buffer-size bytes
            // Both fwrite and gzread and binary-safe
            fwrite($out_file, gzread($file, $buffer_size));
        }

        // Files are done, close files
        fclose($out_file);
        gzclose($file);
    }

}
?>