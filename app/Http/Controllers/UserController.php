<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Jobs\Utiles;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon;

class UserController extends Controller {

    public function editar() {
        $user = Auth::user();
        return view('auth.editar', ['usuario' => $user]);
    }

    public function update(UserUpdateRequest $request) {
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');

        $formatFecha = Utiles::formatearFecha($request['fecha']);

        try {
            $user = User::find($request['id']);
        } catch (Exceptio $e) {
            \Session::flash('flash_message_error', 'Ha ocurrido un error ' . $format . ' error: ' . $e);
        }
        $user->fill([
            'name' => $request['name'],
            'last_name' => $request['apellido'],
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'fecha_nac' => $formatFecha,]);

        $user->save();

        \Session::flash('flash_message', 'Se ha actualizado tu información personal correctamente ' . $format);
        return view('auth.perfil');
    }

    /*
     * Eliminar Usuario
     * @param $id identificador de usuario 
     * 
     */

    public function destroy($id) {
        try {
            User::find($id);
        } catch (Exception $e) {
            return 'Se ha producdo el siguiente error: ' . $e;
        }
        User::destroy($id);
        return 'Se ha borrado correctamente al Usuario con id: ' . $id;
    }

}
