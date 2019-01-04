<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

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
		$validator = Validator::make($request->all(), [
			'username'=> ['required', 'string', 'max:255', 'unique:users,username,'.\Auth::user()->id],
			'firstName'=> ['required', 'string', 'max:255'],
			'lastName' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.\Auth::user()->id],
			'oldPass' => ['nullable', 'string'],
			'newPassword' => ['nullable', 'string', 'min:6', 'confirmed'],
		]);

		if ($validator->fails()) {
			return response()->json([
				'errors' => [$validator->errors()->all()],
			]);
		}

		$user = User::find(\Auth::user()->id);
		$user->username = $request->get('username');
		$user->email = $request->get('email');
		$user->first_name = $request->get('firstName');
		$user->last_name = $request->get('lastName');
		if (!empty($request->get('oldPass')))
		{
			if (Hash::check($request->get('oldPass'), \Auth::user()->password)) {
				$user->password = Hash::make($request->get('newPassword'));
			} else {
				return response()->json([
					'errors' => [['Old password is incorrect']],
				]);
			}
		}
		$user->save();

		return response()->json([
			'success' => 'Your account was updated',
			'user_info' => $user
		]);
	}

	public function setLanguage(Request $request)
	{
		$request->validate([
			'lang' => ['required', 'string', 'max:2'],
		]);

		$user = User::find(\Auth::user()->id);
		$user->lang = $request->get('lang') == 'en' ? 'en' : 'ua';
		$user->save();
		session(['locale' => $user->lang]);

		return back();
	}

	public function uploadPhoto(Request $request)
	{
		request()->validate([
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);
		$imageName = time().'.'.request()->image->getClientOriginalExtension();
		Image::make(request()->image)->fit(100)->save('avatar_img/'.$imageName);

		$user = User::find(\Auth::user()->id);
		$components = parse_url($user->photo_src);
		if ($user->photo_src && empty($components['scheme'])) {
			$src = $_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR.$user->photo_src;
			unlink($src);
		}
		$user->photo_src = 'avatar_img/'.$imageName;
		$user->save();

		return response()->json([
			'success' => 'Your avatar was updated',
			'image' => $user->photo_src
		]);
	}
}
