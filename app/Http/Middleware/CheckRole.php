<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // https://www.youtube.com/watch?v=mjIRBlzMMTo

        if( auth()->user()->isAdmin == 1 ) {
            return $next($request);
        }

       return redirect('/dashboard')->with('errors', 'You are not the admin.');
    }
}
