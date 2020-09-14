<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsUser
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
        // What we want here is to check if the user is logged in and if the user has a role_id===2
        if(Auth::user()){
            return $next($request);
        }
        else{
            return redirect('/timeline');
        }
    }
}
