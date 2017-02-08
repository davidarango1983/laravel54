<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Jobs\Utiles;


class ProfesorRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
           $dieciochoanyos = Utiles::anyosatras(18);
       
        return [
                    'name' => 'required|max:255',
                    'apellido' => 'required|max:255',
                    'telefono' => 'required|min:0|max:9999999999|numeric',
                    'email' => 'required|email|max:255|unique:profesors',
                    'fecha' => 'required|date_format:"Y-m-d"|before:' . $dieciochoanyos,
                    'dni' => 'required|unique:profesors|dni',
                   
        ];
        
        
       
            
            
        }
        
        
    
}

