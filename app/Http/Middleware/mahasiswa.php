<?php

namespace App\Http\Middleware;

use Closure;
use auth;

class mahasiswa
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
        if(auth::user()->role1 == 'Mahasiswa'){
            return $next($request);
        }else{
            return abort(404);
        }
    }
}
