<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\SearchClass;
use App\Http\Controllers\Comment\CommentController;


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
        $params = $request->all();
        $result = [];
        $lang = null;
        ($params['lang'] == "en-US") ? $lang = 'eng' : 0;
        ($params['lang'] == "uk-UA") ? $lang = 'ukr' : 0;
        $subtitles = $search->get_subtitles_list($params['title'], $params['type'], $params['season'], $params['episode'], $lang);
        if($subtitles != "penetration") {
            $result['movie'] = $params;
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
        $subtitles_all = $search->get_subtitles_list($params['title'],  $params['type'], $params['season'], $params['episode'], null);
         if($subtitles_all != "penetration") {
             $result['allsubs'] = (array)$subtitles_all;

             foreach ($result['allsubs'] as $key => $value) {
                 if ($key[1] === "*") {
                     $result['allsubs'][substr($key, 3)] = $result['allsubs'][$key];
                     unset($result['allsubs'][$key]);
                 }
             }
         }
      //   dd(public_path().'/subtitles/');
        // $this->downloadFile($result['subs']['response']['data'][0]['SubDownloadLink'], public_path().'/subtitles');
        
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

    private function downloadFile($url, $path)
    {
        $newfname = $path;
        $file = fopen ($url, 'rb');
        if ($file) {
            $newf = fopen ($newfname, 'wb');
            if ($newf) {
                while(!feof($file)) {
                    fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                }
            }
        }
        if ($file) {
            fclose($file);
        }
        if ($newf) {
            fclose($newf);
        }
    }

}
?>