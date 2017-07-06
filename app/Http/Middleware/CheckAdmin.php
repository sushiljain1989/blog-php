<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if($request->session()->has('is_admin') && $request->session()->get('is_admin') == 1)
        {
          return $next($request);
        }
        return redirect('/dashboard');

    }
}
