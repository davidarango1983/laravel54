<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ClaseController;
use App\Http\Controllers\NoticiasController;
use App\Reservas;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
    
    public function perfil()
    {
        return view('auth.perfil');
    }
   
    public function home(){        
        /*
     * 
     * Cargamos las noticias 
     * 
     */
    $noticias=  NoticiasController::cargarNoticias();
    $clasesdehoy = ClaseController::cargarClases(0);
    $clasesM = ClaseController::cargarClases(1);
     $ruta=storage_path().'/imgNoticias'; 
    
    //Conmprobamos si es un usuario autentificado
     if(Auth::check()){
     
    //comprobamos si su siscripción está activa, de no ser así redirigimos a la zona de activación
         $sus = Auth::user()->suscripcion;
        if($sus->fecha_fin > getdate()){            
            return view('auth.perfil');
        } 
         
         
    $reservasUsuario = Reservas::all()->where('user_id', Auth::user()->id);    
    return view('home',['noticia'=>$noticias,'ruta'=>$ruta,'clases'=>$clasesdehoy,'clasesM'=>$clasesM,'reservas'=>$reservasUsuario]);
     }else{    
    return view('home',['noticia'=>$noticias,'ruta'=>$ruta]);
     }
        
    }
    
    
}
