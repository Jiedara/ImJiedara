<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class LanguageRedirect
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
        Session::set('applocale', App::getLocale());
        return $next($request);
    }
}
