<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\BlogModel;
use App\Models\CommentModel;

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
        if ($request->is('blog/delComment/*')) {
            if (!CommentModel::find($request->id)) {
                return response('Такой записи не существует');
            }
        }
        else {
            if (!BlogModel::find($request->id)) {
                return response('Такой записи не существует');
            }
        }
        return $next($request);
    }
}
