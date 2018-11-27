<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;

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
			'username'=> ['required', 'string', 'max:255', 'unique:users,username,'.\Auth::user()->id],
			'firstName'=> ['required', 'string', 'max:255'],
			'lastName' => ['required', 'string', 'max:255'],
			'lang' => ['required', 'string', 'max:2'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.\Auth::user()->id],
			'oldPass' => ['nullable', 'string'],
			'newPassword' => ['nullable', 'string', 'min:6', 'confirmed'],
		]);

		$user = User::find(\Auth::user()->id);
		$user->username = $request->get('username');
		$user->email = $request->get('email');
		$user->first_name = $request->get('firstName');
		$user->last_name = $request->get('lastName');
		$user->lang = $request->get('lang') == 'en' ? 'en' : 'ua';
		if (!empty($request->get('oldPass')))
		{
			if (Hash::check($request->get('oldPass'), \Auth::user()->password)) {
				$user->password = Hash::make($request->get('newPassword'));
			} else {
				return back()->withErrors('Old password is incorrect');
			}
		}

		$user->save();

		return redirect('/')->with('user_info', $user);
	}

	public function uploadPhoto(Request $request)
	{
		request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        Image::make(request()->image)->fit(50)->save('avatar_img/'.$imageName);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
	}
}
