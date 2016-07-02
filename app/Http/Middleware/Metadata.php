<?php

namespace App\Http\Middleware;

use Closure;
use Meta;

class Metadata
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
        
        # Default meta data
        
        Meta::title('Bulk'); // Complete title
        Meta::meta('title', 'Title default');
        Meta::meta('description','Description default');
        Meta::meta('robots', 'index,follow');
        Meta::meta('image', asset('img/default.jpg'));
        
        return $next($request);
    }
}
