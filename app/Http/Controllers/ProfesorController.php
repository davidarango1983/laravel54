<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfesorUpdateRequest;
use App\Profesor;
use App\Jobs\Utiles;
use App\Http\Requests\ProfesorRequest;
use Carbon;

class ProfesorController extends Controller {
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new profesorinstance after a valid registration.
     *
     * @param  array  $request
     * @return profesor
     */
    protected function create(ProfesorRequest $request) {
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
        $formatFecha = Utiles::formatearFecha($request['fecha']);
        Profesor::create([
            'name' => $request['name'],
            'last_name' => $request['apellido'],
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'fecha_nac' => $formatFecha,
            'dni' => $request['dni']]);

        \Session::flash('flash_message', 'Se ha creado un registro nuevo correctamente. ' . $format);
        return redirect()->action('ProfesorController@profesores');
    }

    /*
     *
     * @return profesores
     */

    public function profesores() {
        return view('admin.profesor.profesores');
    }

    /*
     * anadir 
     * 
     * @return view form
     * 
     */

    public function anadir() {

        return view('admin.profesor.form', ['funcion' => 'create']);
    }

    public function destroy($id) {

        try {
            Profesor::find($id);
        } catch (Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }
        Profesor::destroy($id);
        return 'Se ha borrado correctamente al Profesor con id: ' . $id;
    }

    public function editar($id) {
        try {
            $profesor = Profesor::find($id);
        } catch (Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }

        return view('admin.profesor.form', ['profesor' => $profesor, 'funcion' => 'update']);
    }

    public function update(ProfesorUpdateRequest $request) {

        $formatFecha = Utiles::formatearFecha($request['fecha']);

         $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
       
        try{
            $profesor = Profesor::find($request['id']);
        }  catch (Exception $e){
    
        \Session::flash('flash_message_error', 'Ha ocurrido un error. ' . $format.' error: '.$e);
            
        }

        $profesor->fill([
            'name' => $request['name'],
            'last_name' => $request['apellido'],
            'dni' => $request['dni'],
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'fecha_nac' => $formatFecha,]);

        $profesor->update();

        \Session::flash('flash_message', 'Se ha creado un registro nuevo correctamente. ' . $format);
        return view('admin.profesor.profesores');
    }

    public function clase() {

        return $this->belongsTo('App\Clase');
    }

}
