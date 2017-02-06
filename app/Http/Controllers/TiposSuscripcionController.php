<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TiposSuscripcion;

class TiposSuscripcionController extends Controller
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
          'precio' => 'required|max:5|float',
          'duration'=> 'required|max:2|integer'
        ]);
  }



  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  protected function create(Request $data)
  {
   
         TiposSuscripcion::create([
          'name' => $data['name'],
          'precio' => $data['precio'],
          'duration' => $data['duration']]);
    
      
      
       return redirect()->action('TiposSuscripcionController@tipos');       
  }

  
  protected function update(Request $request){
      $tipo=TiposSuscripcion::find($request['id']);
    $tipo->fill([
            'name' => $request['name'],
            'precio' => $request['precio'],
            'duration' => $request['duration']]);
    $tipo->save();
    
         return redirect()->action('TiposSuscripcionController@tipos');     
      
      
  }
  
  public function destroy($id){
          
      try {     
          TiposSuscripcion::find($id);        
   } catch (\Exception $e) {
     return 'No se ha encontrado al tipo con id: '.$id;
        }
        try{
        TiposSuscripcion::destroy($id);
          return 'Se ha eliminido correctamente el tipo con id: '.$id;
            
        }  catch (\Exception $e){
            
            return $e->getMessage();
        }
     
   
    }
      
  
  /*
* Controlador que devuelve la vista de Usuarios
*
*
*
*/

public function  tipos(){
    
     return view('admin.tipos.tiposuscripcion');
}


 public function  anadirtipo(){
  return view('admin.tipos.form');
}



    }

    
    
