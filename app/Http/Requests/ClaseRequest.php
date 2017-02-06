<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class ClaseRequest extends Request
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
       

        return [
                    'inicio' => 'required|date_format:"H:i"',
                    'fin' => 'required|date_format:"H:i|after:inicio',
                    'limit' => 'required|numeric|min:1|max:50',
                    'dia' => 'required',
                    'publicar' => 'required|boolean',
                    'profesor' => 'required',
                    'tipo' => 'required',
                   
        ];
      
        
       
            
            
        }
        
        
    
}

