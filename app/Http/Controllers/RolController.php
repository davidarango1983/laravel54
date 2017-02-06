<?php

namespace App\Http\Controllers;

class RolController extends Controller
{




  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|max:255',
          'description' => 'required|max:255',
        ]);
  }



  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  protected function create(array $data)
  {
      return User::create([
          'name' => $data['name'],
          'description' => $data['description'],
      ]);
  }

/*
* Controlador que devuelve la vista de Usuarios
*
*
*
*/

public function  listaRoles(){
  return view('/administracion/roles');
}

/*
*
*@return users no admin
*/

public function  listarRoles(){
  $roles = Rol::all();
    return($roles);
    }

public function user()
    {
        return $this->hasOne('User');
    }
    
}