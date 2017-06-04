<?php

namespace App\Http\Controllers;

use App\Reservas;
use App\User;
use Yajra\Datatables\Datatables;
use App\Clase;
use App\TiposSuscripcion;
use App\Profesor;
use App\TipoClase;
use App\Noticias;
use App\Imagenes;

class DatatablesController extends Controller {

    public function __construct() {
        $this->middleware('Admin');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function usuarios() {
        try {
            $users = User::with('suscripcion')->where('id_rol', 1);
        } catch (Exception $e) {

            return 'Se ha producdo el siguiente error: ' . $e;
        }
        return Datatables::of($users)->make(true);
    }
    /*
     * TIPOS DE SUSCRIPCIÓN
     * 
     * 
     */

    public function tipos() {

        try {
            $tipos = TiposSuscripcion::all();
        } catch (Exception $e) {

            return 'Se ha producdo el siguiente error: ' . $e;
        }
        return Datatables::of($tipos)->make(true);
    }

    public function editartipo($id) {
        $tipo = TiposSuscripcion::find($id);

        return view('admin.tipos.editar', ['tipo' => $tipo]);
    }

    /*
     * PROFESORES
     * 
     * 
     */

    public function listaProfesores() {
        try {

            $profesors = Profesor::all();
        } catch (\Exception $e) {

            return 'Se ha producdo el siguiente error: ' . $e;
        }
        return Datatables::of($profesors)->make(true);
    }

    public function clases() {
        try {
            $clases = Clase::with('tipo', 'profesor');
        } catch (\Exception $e) {

            return 'Se ha producdo el siguiente error: ' . $e;
        }
        return Datatables::of($clases)->make(true);
    }

    /*
     * TIPOS DE CLASE
     * 
     */

    public function tipoclases() {
        try {
            $clases = TipoClase::all();
        } catch (\Exception $e) {

            return 'Se ha producdo el siguiente error: ' . $e;
        }
        return Datatables::of($clases)->make(true);
    }

    /*
     * RESERVAS
     * 
     */

    public function listaReservas() {
        try {

            $reservas = Reservas::with('user', 'clase');
        } catch (\Exception $e) {

            return 'Se ha producdo el siguiente error: ' . $e;
        }
        return Datatables::of($reservas)->make(true);
    }

    /*
     * NOTICIAS
     * 
     */

    public function noticias() {
        try {

            $noticias = Noticias::all();
        } catch (\Exception $e) {

            return 'Se ha producdo el siguiente error: ' . $e;
        }
        return Datatables::of($noticias)->make(true);
    }

    /*
     * NOTICIAS
     * 
     */

    public function imagenes() {
        try {

            $imagenes = Imagenes::all();
        } catch (\Exception $e) {

            return 'Se ha producdo el siguiente error: ' . $e;
        }
        return Datatables::of($imagenes)->make(true);
    }

}
