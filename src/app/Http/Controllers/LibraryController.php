<?php

namespace App\Http\Controllers;


class LibraryController extends Controller
{

    public function index()
    {
        return view('library')->with('user_info', \Auth::user())->with('lang', \Session::get('locale')=='ua' ? 'Українська' : 'English');
    }
}

?>
