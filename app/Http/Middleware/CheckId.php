<?php

namespace App\Http\Middleware;

use Closure;

class CheckId
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
        if (isset($request->id) && false == is_numeric($request->id)) {
            return response('Это не число!');
        }
        if (isset($request->about) && false == is_numeric($request->about)) {
            return response('Это не число!');
        }
        if (isset($request->main) && false == is_numeric($request->main)) {
            return response('Это не число!');
        }                
        return $next($request);
    }
}
