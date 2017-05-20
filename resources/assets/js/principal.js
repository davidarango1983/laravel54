/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {


  $('#fecha').dateDropper({format:"Y-m-d",
                            lang:"es"});
    $('#fecha-user').dateDropper({format:"Y-m-d",
                            lang:"es"});
    
               
    
    
    
    /*Edición del perfil
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
                    "icon": 'gymzone', //Icon class - false / string - see provided CSS
                    "title": 'Administración', //Show title - false / string
                    "cls": "eliminado", //Additional container class
                    "speed": 500, //Fade-in / out animation speed
                    "timeout": 4000 //Timeout before notification disappears    
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






// jQuery to collapse the navbar on scroll
function collapseNavbar() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
}

$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $(".navbar-collapse").collapse('hide');
});

// Google Maps Scripts
var map = null;
// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);
google.maps.event.addDomListener(window, 'resize', function() {
    map.setCenter(new google.maps.LatLng(41.658516, -0.876254));
});

function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 18,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(41.658516, -0.876254), 

        // Disables the default Google Maps UI components
        disableDefaultUI: true,
        scrollwheel: true,
        draggable: true,
        

        // How you would like to style the map.
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 17
            }]
        }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 20
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 17
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 29
            }, {
                "weight": 0.2
            }]
        }, {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 18
            }]
        }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 16
            }]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 21
            }]
        }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "visibility": "on"
            }, {
                "color": "#000000"
            }, {
                "lightness": 16
            }]
        }, {
            "elementType": "labels.text.fill",
            "stylers": [{
                "saturation": 36
            }, {
                "color": "#000000"
            }, {
                "lightness": 40
            }]
        }, {
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 19
            }]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 20
            }]
        }, {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#000000"
            }, {
                "lightness": 17
            }, {
                "weight": 1.2
            }]
        }]
    };

    // Get the HTML DOM element that will contain your map
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map');

    // Create the Google Map using out element and options defined above
    map = new google.maps.Map(mapElement, mapOptions);

    // Custom Map Marker Icon - Customize the map-marker.png file to customize your icon
    var image = '/images/map-marker.png';
    var myLatLng = new google.maps.LatLng(41.658516, -0.876254);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
       
    });
}

