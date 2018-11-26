<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class EditUserInfo extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware(['auth', 'verified']);
	}

	/**
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request)
	{
		// dd($request->all());
		$request->validate([
			'username'=> ['required', 'string', 'max:255', 'unique:users'],
			'firstName'=> ['required', 'string', 'max:255'],
			'lastName' => ['required', 'string', 'max:255'],
			'lang' => ['required', 'string', 'max:2'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			// 'oldPass' => ['string', 'min:6'],
			// 'newPass' => ['string', 'min:6', 'confirmed'],
		]);

		$user = User::find(\Auth::user()->id);
		// dd($user->all());
	    $user->username = $request->get('username');
	    $user->first_name = $request->get('firstName');
	    $user->last_name = $request->get('lastName');
	    $user->lang = $request->get('lang');
	    $user->email = $request->get('email');
	    if (!empty($request->get('oldPass'))) {
	    	// $user->password = $request->get('share_qty');
	    }
	    
	    $user->save();

		return view('home')->with('user_info', $user);
	}
}
