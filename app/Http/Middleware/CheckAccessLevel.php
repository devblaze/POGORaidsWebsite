<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use Illuminate\View\View;


class CheckAccessLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->access_level >= 0){
            return $next($request);
        }
        return redirect(route('admin_unauthorized'));
    }
}
