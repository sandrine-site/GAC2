<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
      $user=Auth::user();
              if ($user&&$user->fonction_id<=3){
                  return $next($request);
              }
              return response()->redirectTo("/login");
          }
}
