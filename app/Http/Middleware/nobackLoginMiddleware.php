<?php

namespace App\Http\Middleware;

use Closure;

class nobackLoginMiddleware
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


        if (!empty(session('admin'))) {
            return redirect()->route('Home');
        }

        return $next($request);
    }
}
