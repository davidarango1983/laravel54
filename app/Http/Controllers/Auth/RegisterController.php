<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Jobs\Utiles;
use App\TiposSuscripcion;
use App\Suscripcion;
use App\Configuration;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
          $dieciseisanyos = Utiles::anyosatras(16);
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'apellido' => 'required|max:255',
                    'telefono' => 'required|min:0|max:9999999999|numeric',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:8|confirmed',
                    'fecha' => 'required|date_format:"Y-m-d"|before:' . $dieciseisanyos,
                    'suscripcion' => 'required|string',
                    'condiciones' => 'required'
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
      $formatFecha = Utiles::formatearFecha($data['fecha']);

        $create = User::create([
                    'name' => $data['name'],
                    'last_name' => $data['apellido'],
                    'telefono' => $data['telefono'],
                    'email' => $data['email'],
                    'fecha_nac' => $formatFecha,
                    'password' => bcrypt($data['password']),
                    'id_rol' => 1,]);
        $datos = $create['original'];
        $fechaini = Date('Y-m-d');
        $tipo = TiposSuscripcion::find( $data['suscripcion']);
        $fechafin = Utiles::sumarFecha($fechaini, $tipo['duration']);
        $suscripcion = ([
            'user_id' => $datos['id'], 'tipos_suscripcions_id' =>  $data['suscripcion'],
            'fecha_ini' => $fechaini, 'fecha_fin' => $fechafin]);
        Suscripcion::create($suscripcion);
        return $create;
    }
    
  
    public function showRegistrationForm() {

          $config=Configuration::find(1);
   if($config->disable_records==1){
         \Session::flash('flash_message', 'Esta sección está inhabilitada temporalmente.');
       return redirect()->action('HomeController@index');
   }else{
        $datos = new \App\TiposSuscripcion();
        $tipos = $datos->all();

        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register', array('datos' => $tipos));
    }
    
}
}
