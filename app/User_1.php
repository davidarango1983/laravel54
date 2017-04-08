<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Notification;
class User extends Authenticatable
{

 protected $casts = [
        'isAdmin' => 'boolean',
    ];
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name', 'email','telefono','id_suscripcion','password','id_rol','fecha_nac',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /*
    *Relacion con Rol
    *
    */
    public function rol()
  {
      $user=$this->belongsTo('App\Rol');
      return $user;
  }

  /*
  *Relacion con Suscripción
  *
  */    

  public function suscripcion()
    {
        return $this->hasOne('App\Suscripcion');
    }
    
    
   
     


    
    
    }
