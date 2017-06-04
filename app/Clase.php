<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Clase extends Model
{
    protected $table='clases';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hora_ini','hora_fin', 'dia','limit','publicado','profesor_id','tipo_id'
    ];
//Definimos la relación con tipo
    public function tipo()
    {
        return $this->belongsTo('App\TipoClase');
    }
    //Definimos la relación con Profesor
    public function profesor(){
        
         return $this->belongsTo('App\Profesor');
    }

}
