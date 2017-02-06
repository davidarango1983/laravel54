<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    
    protected $table='noticias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description','urlimg','publicado'];
    
    
   

}
