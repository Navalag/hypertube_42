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
		$films = $film->where('user_id', $user_id)->get();

		$films_id = [];
		foreach ($films as $value) {
			$films_id[] = $value->movie_id;
		}
		return $films_id;
	}
}
