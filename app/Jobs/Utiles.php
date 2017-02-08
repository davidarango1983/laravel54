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

    public static function redimensionarImagen($imagen) {
     	// crear una imagen desde el original 

	$img = ImageCreateFromJPEG($imagen);

	// crear una imagen nueva 

	$thumb = imagecreatetruecolor(400,400);

	// redimensiona la imagen original copiandola en la imagen 

	ImageCopyResized($thumb,$img,0,0,0,0,400,400,ImageSX($img),ImageSY($img));

 	// guardar la nueva imagen redimensionada donde indicia $img_nueva 

	ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);

	ImageDestroy($img);
    }

}
