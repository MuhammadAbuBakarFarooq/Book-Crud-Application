<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;


class IsAdmin
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
        if (!auth()->user()->admin) {
            return redirect()->route('home');
        }

        return $next($request);
    }
 }
