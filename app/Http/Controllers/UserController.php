<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Jobs\Utiles;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function editar() {
        $user = Auth::user();
        return view('auth.editar', ['usuario' => $user]);
    }

    public function update(UserUpdateRequest $request) {

        $formatFecha = Utiles::formatearFecha($request['fecha']);
        
        $user = User::find($request['id']);

        $user->fill([
            'name' => $request['name'],
            'last_name' => $request['apellido'],
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'fecha_nac' => $formatFecha,]);

        $user->save();

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
