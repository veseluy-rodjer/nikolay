<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\BlogModel;

class CheckBlog
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
        if (!BlogModel::find($request->id)) {
            return response('Такой записи не существует');
        }        
        return $next($request);
    }
}
