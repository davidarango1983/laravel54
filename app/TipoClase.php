<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoClase extends Model
{


    protected $table='tipo_clases';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','description'
    ];
    
    
public function clase()
    {
        return $this->hasMany('Clases');
    }   
    

}
