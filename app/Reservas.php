<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{

   protected $table='reservas';
          /**
           * The attributes that are mass assignable.
           *
           * @var array
           */
          protected $fillable = [
             'user_id','clase_id'
          ];




    /*
    *Relacion de pertenencia a User
    *
    */

      public function user()
          {
             return $this->belongsTo('App\User');
          }

      public function clase()
             {
                return $this->belongsTo('App\Clase');
             }



    }
