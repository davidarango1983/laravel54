<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;

abstract class Utiles {

    use Queueable;



    /*
     * Método que devuelve una fecha con la suma de los meses que se pasan por parámeto
     * 
     * @param $meses número entero, cantidad de meses a sumar
     * @return date
     */

    public static function sumarFecha($fechain, $meses) {

        $nuevafecha = strtotime('+' . $meses . ' month', strtotime($fechain));
        $fechafin = date('Y-m-d', $nuevafecha);

        return $fechafin;
    }

    public static function anyosatras($numero) {

        $nuevafecha = strtotime('-'.$numero.' years', strtotime(date('Y-m-d')));
        $fechafin = date('Y-m-d', $nuevafecha);

        return $fechafin;
    }

    public static function formatearFecha($fecha) {


        return date("Y-m-d", strtotime($fecha));
    }

    public static function getDia() {

        $hoy = getdate();

        $dia = $hoy['wday'];

        switch ($dia) {
            case 0:
                return 'domingo';
            case 1:
                return 'lunes';
            case 2:
                return 'martes';
            case 3:
                return 'miercoles';
            case 4:
                return 'jueves';
            case 5:
                return 'viernes';
            case 6:
                return 'sabado';
        }
    }

    /*
     * @return horaActual
     */

    public static function getHora() {

        $time = time();

        return date('H:i', $time);
    }

    
      
     public function dni($value,$parameters){
  
         $letra = strtoupper(substr($parameters, -1));
	$numeros = substr($parameters, 0, -1);
	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		return true;
	}else{
		return false;
	}
}
   

}
