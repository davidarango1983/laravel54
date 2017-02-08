<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoClase;

class TipoClaseController extends Controller
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
           'description' => 'required|max:10000',
           'imagen'=>'required',
                 ]);
  }



  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return Tipo Clase
   */
  protected function create(Request $request)
  {
   
       $tipoclase = new TipoClase();
         $tipoclase->name=$request->name;
         $tipoclase->description=$request->description;
      

            
        $imagen= $request->file('imagen');    
        $rutaimg= time().'_'.$imagen->getClientOriginalName();
        
       Storage::disk('public')->put($rutaimg, file_get_contents($imagen->getRealPath()->resize(400,400)->save($rutaimg)));
       $tipoclase->urlimg=$rutaimg;
       $tipoclase->save();
      
     
      
      
      
      return redirect()->action('AdministracionController@tipoclases');
  }

  /*
   * Return form for create clase type
   * @return view
   */
public function anadir(){
    
 return view ('admin.tipoclase.form');
    
}


  public function destroy($id){
        
         try {
             TipoClase::find($id);
        } catch (Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }
        TipoClase::destroy($id);
        return 'Se ha borrado correctamente el Tipo de clase con id: ' . $id;
    }
    
      public function editar($id){
        try {
           $tipoclase= TipoClase::find($id);
        } catch (Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }
              
         return view('admin.tipoclase.editar',['tipo'=>$tipoclase]); 
    }
    
    
    public function update(Request $request){
      
        $tipoclase = TipoClase::find($request['id']);
      
        $tipoclase->fill([
            'name' => $request['name'],
            'description' => $request['description']]);

        $tipoclase->update();
        return redirect()->action('AdministracionController@tipoclase');
  
     }
    
    
    
    
}
    
    
    

