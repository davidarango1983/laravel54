<?php

namespace App\Http\Controllers;

use \App\Imagenes;
use App\TipoClase;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function perfil() {
        return view('auth.perfil');
    }

    public function index() {
        /*
         * 
         * Cargamos las informacion
         * 
         */

        $actividad = TipoClase::all();
        $imagenes = Imagenes::all();
        return view('home.home', ['imagen' => $imagenes, 'actividad' => $actividad]);
    }

}
