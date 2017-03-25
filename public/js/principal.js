/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

 /*
  * 
  * 
  * FUNCIONES DE ANIMACIÓN
  * 
  */
 
 

	$('[data-bs-hover-animate]')
		.mouseenter( function(){ var elem = $(this); elem.addClass('animated ' + elem.attr('data-bs-hover-animate')); })
		.mouseleave( function(){ var elem = $(this); elem.removeClass('animated ' + elem.attr('data-bs-hover-animate')); });

 
 
 
 
 
 /*
  * FIN DE CUNIONES DE ANIMACIÓN
  * 
  */

  $('#fecha').dateDropper({format:"Y-m-d",
                            lang:"es"});
    /*
     * Dropdown auto
     * 
     */
    $('ul.nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(100);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
    });
    /*
     * Botón Editar en perfil
     * 
     */

    $('#editar').click(function () {
        /*
         * Hacemos una petición ajax para recuperar la información del usuario desde la bbdd
         *  
         */
        $.ajax({
            /*si ponemos como type delete no lo recogeríamos en $_REQUEST, así que queda como POST*/
            type: 'get',
            url: 'editarusuario',
            //estos son los datos que queremos actualizar, en json:
            data: {
            },
            error: function (status, error) {
                //mostraríamos alguna ventana de alerta con el error
                alert('Se ha producido el siguiente error: ' + error);
            },
            success: function (data) {
                $('#modaleditar').html(data);
            },
            complete: function () {

                $('#modaleditar').modal('show');
            }
        });
    });
    /*
     * ZONA ADMINISTRATIVA
     * 
     * 
     */

    $('#limitClase').on('input', function () {

        $('#infoLimit').html(this.value);
    });
    $('#limitClase').on('change', function () {

        $('#infoLimit').html(this.value);
    });
    /*
     * FIN ZONA ADMINISTRATIVA
     * 
     */


    /*
     * ZONA RESERVA DE CLASES
     * 
     */

    $('.btnreserva').prop('disabled', false);

    /*
     * Redireccionamos al día actual.
     * 
     * 
     */
    var d = new Date();
    var n = d.getDay();
    var urlActual = window.location;
    if (urlActual.href.endsWith('reservaclases')) {



        switch (n) {
            case 0:
                window.location.href = urlActual + '/domingo';
            case 0:
                window.location.href = urlActual + '/domingo';
                break;
            case 1:
                window.location.href = urlActual + '/lunes';
                break;
            case 2:
                window.location.href = urlActual + '/martes';
                break;
                ;
            case 3:
                window.location.href = urlActual + '/miercoles';
                break;
            case 4:
                window.location.href = urlActual + '/jueves';
                break;
            case 5:
                window.location.href = urlActual + '/viernes';
                break;
            case 6:
                window.location.href = urlActual + '/sabado';
                break;
        }
    }

    /*
     * 
     * Botón Reservar Clase
     */
    $('.formularioreserva').on('click', function (event) {

        event.preventDefault();
        $('.btnreserva').prop('disabled', true);
        if (this[3].name === 'cancelar') {
            $url = 'anulareserva';
        } else {
            $url = 'reserva';
        }

        $.ajax({
            type: 'post',
            url: $url,
            //estos son los datos que queremos actualizar, en json:
            data: $(this).serialize()
            ,
            error: function (status, error) {
                //mostraríamos alguna ventana de alerta con el error
                alert('Se ha producido el siguiente error: ' + error);
            },
            success: function (data) {

                var options = {
                    "icon": "heart", //Icon class - false / string - see provided CSS
                    "title": 'Administración', //Show title - false / string
                    "cls": "eliminado", //Additional container class
                    "speed": 500, //Fade-in / out animation speed
                    "timeout": 3000 //Timeout before notification disappears    
                };
                $.Growl.show(data, options);
                setTimeout(reiniciar, 2000);
               
                function reiniciar() {
                    window.location.reload();
                }

            },
            complete: function () {




            }
        });
    });
});
/*
 * FIN ZONA RESERVA DE CLASES
 * 
 */




