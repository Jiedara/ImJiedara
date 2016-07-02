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
        
        Meta::title('Portfolio'); // Complete title
        Meta::meta('title', 'I\'m Jiedara');
        Meta::meta('description','Left handed in life, ambidextrous in development. I love making website, application to help people, public license, functional programming, cookies & ponies!');
        Meta::meta('robots', 'index,follow');
        Meta::meta('image', asset('img/default.jpg'));
        
        return $next($request);
    }
}
