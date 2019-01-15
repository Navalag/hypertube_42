<?php

namespace App\Http\Controllers\Film;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FilmWatch;
use App\FilmToDelete;

class FilmController extends Controller
{
    public function setFilmAsWatched(Request $request, $movie_id)
	{
		$film = new FilmWatch;
		$film->movie_id = $movie_id;
		$film->user()->associate($request->user());
		$film->save();
	}

	public function getWatchedFilmsForUser($user_id) {
		$film = new FilmWatch;
		$all_films = $film->where('user_id', $user_id)->get();

		dd($all_films);
		return $all_films;
	}
}
