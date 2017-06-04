<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservas;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'user_id' => 'required',
                    'clase_is' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return view
     */
    protected function create(Request $data) {

        //Antes de realizar la reserva comprobamos otra vez que haya plazas disponibles
        $find = \App\Clase::find($data['claseid']);
        $clasesR = DB::select("SELECT count(reservas.clase_id) as count FROM reservas where reservas.clase_id=:id ", ['id' => $data['claseid']]);
        if (!isset($clasesR) && count($clasesR >= $find->limit)) {

            return 'La clase ahora está completa';
        }
        Reservas::create([
            'user_id' => $data['userid'],
            'clase_id' => $data['claseid'],
        ]);

        return 'Tienes una plaza reservada para esta clase!';
    }

    public function destroy(Request $data) {

        try {
            Reservas::where('user_id', $data['userid'])->where('clase_id', $data['claseid'])->get();
        } catch (\Exception $e) {
            return 'No se ha encontrado la reserva con id: ' . $data['id'];
        }
        try {
            Reservas::where('user_id', $data['userid'])->where('clase_id', $data['claseid'])->delete();
            return 'Tu reserva ha sido cancelada!';
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function reiniciarReservas() {

        return redirect()->action('AdministracionController@noticias');
    }

}
