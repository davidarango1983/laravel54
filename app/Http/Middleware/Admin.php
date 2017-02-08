<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     * Control de acceso para usuarios administrativos.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->id_rol==2){
           return $next($request);
        }else{

            return redirect()->guest('login');
        }


    }
}
