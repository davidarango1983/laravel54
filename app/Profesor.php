<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{


    protected $table='profesors';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name', 'email','telefono','fecha_nac','dni',
    ];
    
    
     public function clases()
    {
        return $this->hasMany('App\Clases');
    }

}
