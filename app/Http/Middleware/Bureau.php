<?php

namespace App\Http\Middleware;

use Closure;

class Bureau
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
        public function handle($request, Closure $next)
    {
        $user=$request->user ();
        if ($user&&$user->fonction_id==="2"){
            return $next($request);
        }
        return redirect ()->route ('home');
    }
    }
}
