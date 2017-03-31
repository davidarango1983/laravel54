<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClaseRequest;
use App\Clase;
use App\Profesor;
use App\Reservas;
use App\TipoClase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jobs\Utiles;

class ClaseController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function create(ClaseRequest $request) {


        Clase::create([
            'hora_ini' => $request['inicio'],
            'hora_fin' => $request['fin'],
            'dia' => $request['dia'],
            'limit' => $request['limit'],
            'publicado' => $request['publicar'],
            'profesor_id' => $request['profesor'],
            'tipo_id' => $request['tipo']]);

        return redirect()->action('AdministracionController@clases');
    }

    public function update(ClaseRequest $request) {


        try {
            $clase = Clase::find($request['id']);
        } catch (Exception $e) {
            return 'Se ha producdo el siguiente error: ' . $e;
        }

        $clase->fill([
            'hora_ini' => $request['inicio'],
            'hora_fin' => $request['fin'],
            'dia' => $request['dia'],
            'limit' => $request['limit'],
            'publicado' => $request['publicar'],
            'profesor_id' => $request['profesor'],
            'tipo_id' => $request['tipo']]);


        $clase->save();

        return redirect()->action('AdministracionController@clases');
    }

    /*
     * Eliminar Clase
     * @param $id identificador de usuario 
     * 
     */

    public function destroy($id) {
        try {
            Clase::find($id);
        } catch (Exception $e) {
            return 'Se ha producdo el siguiente error: ' . $e;
        }
        Clase::destroy($id);
        return 'Se ha borrado correctamente la clase con id: ' . $id;
    }

    /*
     * Añadir clase
     * @return view form
     *
     */

    public function anadir() {

        $profesor = Profesor::all();
        $tiposclase = TipoClase::all();

        return view('admin.clase.form', ['profesores' => $profesor, 'tipos' => $tiposclase]);
    }

    /*
     * Editar clase
     * @return view edit
     */

    public function editar($id) {
        $profesor = Profesor::all();
        $tiposclase = TipoClase::all();
        try {
            $clase = Clase::find($id);
        } catch (\Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }

        return view('admin.clase.editar', ['profesores' => $profesor, 'tipos' => $tiposclase, 'clase' => $clase]);
    }

    /*
     * Devuelve la vista de las reservas con los datos separados por días
     * Y las reservas ya hechas del usuario
     * @return view reservas
     */

    public function reservas() {

        return view('reservas.reservas');
    }

    public function dia($dia) {

        $reservasUsuario = Reservas::all()->where('user_id', Auth::user()->id);
        $clases = Clase::all()->where('dia', $dia);
        $clasesR = DB::select("SELECT clases.id,count(reservas.clase_id) as count FROM reservas,clases where clases.id = reservas.clase_id and dia=:dia group by clase_id", ['dia' => $dia]);
        $array = array($clasesR);
        $hoy = Utiles::getDia(0);
        $hora = Utiles::getHora();      
        return view('reservas.dia', ['hora' => $hora, 'hoy' => $hoy, 'reserva' => $reservasUsuario, 'clases' => $clases, 'dia' => $dia, 'reservar' => $array]);
    }
    
    /*
     * Función que devuelve las clases que se realizan en el día actual
     * @return clases del día
     */

    public static function cargarClases($intDay) {
        
        $dia=Utiles::getDia($intDay);
        return Clase::all()->where('dia', $dia);
        
    }
    
}
