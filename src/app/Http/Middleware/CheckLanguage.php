<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckLanguage
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$lang = $request->session()->get('locale');
		if ($lang != null) {
			app()->setLocale($lang);
		} else if (\Auth::user()) {
			$user = User::find(\Auth::user()->id);
			app()->setLocale($user->lang);
		}

		return $next($request);
	}
}
