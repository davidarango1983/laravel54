<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use DateTime;

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
        $nuevafecha = strtotime('-' . $numero . ' years', strtotime(date('Y-m-d')));
        $fechafin = date('Y-m-d', $nuevafecha);
        return $fechafin;
    }

    public static function formatearFecha($fecha) {
        return date("Y-m-d", strtotime($fecha));
    }

    public static function getDia($intDay) {
        $hoy = getdate();
        $dia = $hoy['wday'] + $intDay;

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

    public static function diaEng($dia) {

        switch ($dia) {
            case 'domingo':
                return 'sunday';
            case 'lunes':
                return 'monday';
            case 'martes':
                return 'tuesday';
            case 'miercoles':
                return 'wednesday';
            case 'jueves':
                return 'thursday';
            case 'viernes':
                return 'friday';
            case 'sabado':
                return 'saturday';
        }
    }

    /*
     * @return horaActual
     */

    public static function getHora() {

        $time = time();
        return date('H:i', $time);
    }

    public function dni($value, $parameters) {

        $letra = strtoupper(substr($parameters, -1));
        $numeros = substr($parameters, 0, -1);
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * ELIMINAR FUNCION
     */
    public static function diasSus() {
        $fecha = new DateTime(Auth::user()->suscripcion->fecha_ini);
        $hoy = new DateTime();
        $interval = $fecha->diff($hoy);
        return $interval->format('%a');
    }
    
    public static function cuentaActiva($user){   
      $fecha = new DateTime($user->suscripcion->fecha_fin);
      $fecha->modify('+1 day');
      return ($fecha > new Datetime() ) ? true : false ;
}

/*
 * FUNCIÓN QUE DEVUELVE SI UN USUARIO PUEDE HACER RESERVAS UN DIA X DEPENDIENDO DE SU SUSCRIPCIÓN
 * AUNQUE ESTA ESTÉ ACTIVA
 *  
 */
public static function getPuedeReservar($dia) {
        $diaEng= Utiles::diaEng($dia);
       $fecha = (new DateTime(Auth::user()->suscripcion->fecha_fin))->format('Y-m-d');
       $dataNext = (new DateTime())->modify('next '.$diaEng)->format('Y-m-d');
       //$today=new Datetime();
       $hoy = (new DateTime())->modify('+7 day')->format('Y-m-d');      
       $dataNext = ($hoy==$dataNext) ? (new Datetime())->format('Y-m-d') : $dataNext;
        return ($fecha >= $dataNext) ? true : false ;
     
    
}

}
