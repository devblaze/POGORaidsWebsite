<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use Auth;


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
        $level = Auth::user()->AccessLevel->label;
        if (ucwords($level) === "Admin" || strtolower($level) === "admin" || strtoupper($level) === "ADMIN") {
            return $next($request);
        }

        (bool)$access = Auth::user()->AccessLevel->can_modify_users;
        if ($access){
            return $next($request);
        }
        return redirect(route('unauthorized'));
    }
}
