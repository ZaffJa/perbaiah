<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ( auth()->check() && auth()->user()->is($role) )
        {
            return $next($request);
        }

        return redirect('/log-masuk');
    }
}
