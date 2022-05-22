<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GuestOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            $type = Auth::user()->type;

            switch($type)
            {
                case 'Agent': $type = "talented";break;
                case 'Client': $type = "employer";break;
                case 'Admin': $type = 'admin'; break;

            }
            return redirect($type.'/dashboard');
        }
        return $next($request);
    }
}
