<?php

namespace App\Http\Middleware;

use Closure;

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
        } else {
            session(['locale' => 'en']);
        }

        return $next($request);
    }
}
