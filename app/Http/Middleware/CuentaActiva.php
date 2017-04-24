<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Jobs\Utiles;
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
        if(Auth::check() && Utiles::cuentaActiva(Auth::user())){
         
                   return $next($request);
        }else{

            return redirect('/perfil');
        }


    }
}
