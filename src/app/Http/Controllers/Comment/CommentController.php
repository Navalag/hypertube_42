<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
	public function store(Request $request)
	{
		$comment = new Comment;
		$comment->body = $request->get('comment_body');
		$comment->movie_id = $request->get('movie_id');
		$comment->user()->associate($request->user());
		$comment->save();

		return back();
	}

	public function getAllCommentsForFilm($movie_id) {
		$comment = new Comment;
		$all_comments = $comment->where('movie_id', $movie_id)->get();

		return $all_comments;
	}
}
