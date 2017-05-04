<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
     protected $table='configuration';
     
     
     
        protected $fillable = [
        'allow_records','allow_reservations', 'booking_time','disable_news','disable_mails'
    ];
    
    
    
    
   


}
