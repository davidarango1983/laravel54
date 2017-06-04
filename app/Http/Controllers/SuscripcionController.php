<?php

namespace App\Http\Controllers;

class SuscripcionController extends Controller {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'user_id' => 'required|integer',
                    'tipos_suscripcions_id' => 'required|integer',
                    'fecha_ini' => 'required|date',
                    'fecha_fin' => 'required|date',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {


        return Suscripcion::create([
                    'user_id' => $data['user_id'],
                    'tipos_suscripcions' => $data['tipos_suscripcions'],
                    'fecha_ini' => $data['fecha_ini'],
                    'fecha_fin' => $data['fecha_fin'],
        ]);
    }

    /*
     * Controlador que devuelve la vista de Usuarios
     *
     *
     *
     */

    public function listaSuscripcion() {
        return view('/administracion/suscripcion');
    }

    /*
     *
     * @return users no admin
     */

    public function listarSuscripcion() {
        $suscripcion = Suscripcion::all();
        return($suscripcion);
    }

}
