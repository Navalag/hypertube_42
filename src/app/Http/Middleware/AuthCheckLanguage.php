<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthCheckLanguage
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
        }

        return $next($request);
    }
}
