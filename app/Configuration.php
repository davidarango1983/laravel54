<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Configuration extends Model
{
     protected $table='configurations';
     
          
        protected $fillable = [
        'disable_records','disable_reservations', 'booking_time','disable_news','disable_mails'
    ];
}
