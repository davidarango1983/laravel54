<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CuentaActiva
{
    /**
     * Handle an incoming request.
     * Control de acceso a la reserva de clases
     * Sólo para usuarios con una cuenta activa
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->suscripcion->fecha_fin < getdate()){
           return $next($request);
        }else{

            return redirect('/perfil');
        }


    }
}
