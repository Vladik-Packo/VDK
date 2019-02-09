<?php

namespace App\Http\Middleware;

use Closure;

class GetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $locale)
    {
        if ($locale == \App::getLocale()) {
            return $next($request);
        } 

        return \Response::make(null, 404);
    }
}
