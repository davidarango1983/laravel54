<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoClase;
use Carbon;
use Exception;

class TipoClaseController extends Controller {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'description' => 'required|max:10000'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Tipo Clase
     */
    protected function create(Request $request) {

        $tipoclase = new TipoClase();
        $tipoclase->name = $request->name;
        $tipoclase->description = $request->description;

        $tipoclase->save();
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
        \Session::flash('flash_message', 'Se ha creado un registro nuevo correctamente. ' . $format);
        return redirect()->action('AdministracionController@tipoclases');
    }

    /*
     * Return form for create clase type
     * @return view
     */

    public function anadir() {

        return view('admin.tipoclase.form');
    }

    public function destroy($id) {

        try {
            TipoClase::find($id);
             TipoClase::destroy($id);
        } catch (Exception $e) {
            if ($e->getCode() == '23000') {
                return ("Error " . $e->getCode() . ". No se puede eliminar un tipo de clase asociada a una clase");
            } else {
                return "Error :" . $e->getCode();
            }
        }
       
        return 'Se ha borrado correctamente el Tipo de clase con id: ' . $id;
    }

    public function editar($id) {
        try {
            $tipoclase = TipoClase::find($id);
        } catch (Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }

        return view('admin.tipoclase.editar', ['tipo' => $tipoclase]);
    }

    public function update(Request $request) {
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');

        try {
            $tipoclase = TipoClase::find($request['id']);
        } catch (Exception $e) {

            \Session::flash('flash_message_error', 'Ha ocurrido un error. ' . $format . ' error:' . $e);
        }
        $tipoclase->name = $request->name;
        $tipoclase->description = $request->description;
        $tipoclase->update();
        \Session::flash('flash_message', 'Se ha creado un registro nuevo correctamente. ' . $format);
        return redirect()->action('AdministracionController@tipoclases');
    }

}
