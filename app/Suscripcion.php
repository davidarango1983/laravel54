<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{

          protected $table='suscripcions';
          /**
           * The attributes that are mass assignable.
           *
           * @var array
           */
          protected $fillable = [
              'user_id','tipos_suscripcions_id','fecha_ini','fecha_fin'
          ];




    /*
    *Relacion de pertenencia a User
    *
    */

      public function users()
          {
             return $this->belongsToMany('App\User');
          }

          public function tipo()
              {
                 return $this->hasOne('App\TiposSuscripcion');
              }



    }
