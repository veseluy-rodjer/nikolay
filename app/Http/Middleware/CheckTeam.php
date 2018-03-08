<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\TeamModel;

class CheckTeam
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
        if (!TeamModel::find($request->about)) {
                return response('Такой записи не существует');
        }
        return $next($request);
    }
}
