<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{




      protected $table='rols';
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'name', 'description'
      ];




/*
*Relacion de pertenencia a User
*
*/

  public function users()
      {
          return $this->hasOne('App\User');
      }
}
