<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposSuscripcion extends Model {

    protected $table = 'tipos_suscripcions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'precio', 'duration',
    ];

    /*
     * Relacion de pertenencia a User
     *
     */

    public function suscripcion() {
        return $this->hasMany('App\Suscripcion');
    }

}
