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
use Illuminate\Foundation\Auth\User;
use Carbon;
use App\Configuration;

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

        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
        \Session::flash('flash_message', 'Se ha creado un registro nuevo correctamente. ' . $format);

        return redirect()->action('AdministracionController@clases');
    }

    public function update(ClaseRequest $request) {
        $config=  \App\Configuration::find(1);
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
        try {
            $clase = Clase::find($request['id']);
        } catch (Exception $e) {
            \Session::flash('flash_message_error', 'Ha ocurrido un error. ' . $format . ' error:' . $e);
        }
        $clase->fill([
            'hora_ini' => $request['inicio'],
            'hora_fin' => $request['fin'],
            'dia' => $request['dia'],
            'limit' => $request['limit'],
            'publicado' => $request['publicar'],
            'profesor_id' => $request['profesor'],
            'tipo_id' => $request['tipo']]);

        /*         * Si la clase ha pasado de publicada a no publicada
         * eliminamos las reservas asociadas a esa clase
         *  y enviamos un email a los usuarios
         * 
         */
        if ($request['publicar'] == 0) {
            $get = Reservas::all()->where('clase_id', $clase->id);
            foreach ($get as $user) {
                $user = User::find($user->user_id);
                if($config->disable_mails==0){
                Mail::send('emails.cancelacion', ['user' => $user, 'clase' => $clase], function ($m) use ($user) {
                    $m->from('hello@app.com', 'GYMZONE ZARAGOZA');
                    $m->to($user->email, $user->name)->subject('Tu clase ha sido cancelada!');
                });
                }
            }
            DB::table('reservas')->where('clase_id', $clase->id)->delete();
        } else {
            /*             * Si la clase ha sufrido cambios enviamos un email a los usuarios
             * informando de los cambios 
             */

            $get = Reservas::all()->where('clase_id', $clase->id);
            foreach ($get as $user) {
                $user = User::find($user->user_id);
                //Enviamos correos a lso usuarios si el uso de correos no está desactivado
                if($config->disable_mails==0){
                   Mail::send('emails.cambios', ['user' => $user, 'clase' => $clase], function ($m) use ($user) {
                    $m->from('gymzonezaragoza@gmail.com', 'GYMZONE ZARAGOZA');
                    $m->to($user->email, $user->name)->subject('Tu clase ha sufrido modificaciones cancelada!');
                });
               }
            }
        }

        $clase->save();
        \Session::flash('flash_message', 'El registro se ha actualizado Correctamente. ' . $format);

        return redirect()->action('AdministracionController@clases');
    }

    /*
     * Eliminar Clase
     * @param $id identificador de usuario 
     * 
     */

    public function destroy($id) {
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
        try {
            Clase::find($id);
        } catch (Exception $e) {
            return 'No se ha encontrado la clase con id: ' . $e;
        }
        try {
            Clase::destroy($id);
        } catch (\Exception $e) {

            if ($e->getCode() == '23000') {
                return ("Error " . $e->getCode() . ". No se puede eliminar una clase asociada a reservas. Debes pasar la clase a NO publicado. "
                        . " El sistema borrará las reservas y avisará a los usuarios via email."
                        . " Pincha aquí para editar la clase: <a href='/admin/editarclase/" . $id . "'>Editar Clase</a>");
            } else {
                return "Error :" . $e->getCode();
            }
        }
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
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
        $profesor = Profesor::all();
        $tiposclase = TipoClase::all();
        try {
            $clase = Clase::find($id);
        } catch (\Exception $e) {
            \Session::flash('flash_message', 'El registro se ha actualizado Correctamente. ' . $format . ' error: ' . $e);
            return redirect()->action('AdministracionController@clases');
        }

        return view('admin.clase.editar', ['profesores' => $profesor, 'tipos' => $tiposclase, 'clase' => $clase]);
    }

    /*
     * Devuelve la vista de las reservas con los datos separados por días
     * Y las reservas ya hechas del usuario
     * @return view reservas
     */

    public function reservas() {
        
      $config=Configuration::find(1);
   if($config->disable_reservations==1){
         \Session::flash('flash_message', 'Esta sección está inhabilitada temporalmente.');
       return redirect()->action('HomeController@index');
   }else{
         return view('reservas.reservas');
   }
    }

    public function dia($dia) {
        
        $horaL=  Configuration::find(1);
        $horaLimite=$horaL->booking_time;
        $reservasUsuario = Reservas::all()->where('user_id', Auth::user()->id);
        $clases = Clase::where('dia', $dia)->orderBy('hora_ini','asc')->get();
        $Reservas = DB::select("SELECT clases.id,count(reservas.clase_id) as count FROM reservas,clases where clases.id = reservas.clase_id and dia=:dia group by clase_id", ['dia' => $dia]);
        $array = array($Reservas);

        $hoy = Utiles::getDia(0);
        $hora = Utiles::getHora();
        $puedeReservar = Utiles::getPuedeReservar($dia);
        return view('reservas.dia', ['hora' => $hora, 'hoy' => $hoy, 'reserva' => $reservasUsuario, 'clases' => $clases, 'day' => $dia, 'reservar' => $array, 'puedeReservar' => $puedeReservar,'horalimite'=>$horaLimite]);
  
    }
    /*
     * Función que devuelve las clases que se realizan en el día actual
     * @return clases del día
     */

    public static function cargarClases($intDay) {

        $dia = Utiles::getDia($intDay);
        return Clase::all()->where('dia', $dia);
    }

}
