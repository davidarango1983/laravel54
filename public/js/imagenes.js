/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
href = window.location.href;
href2 = href.substring(0, href.length - 14);

$(document).ready(function () {

    /*
     * Colocamos en todas las cabecerras de las peticiones post que se realizan mediante ajax
     * el valor del token CSRF, que garantiza la privacidad de nuestras peticiones
     * 
     */
    $.ajaxPrefilter(function (options, originalOptions, xhr) {
        var token = $('meta[name="csrf-token"]').attr('content');
        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
    });
    $('#imagenes').addClass('active');
    $(function () {
        $('#imagenes-table').DataTable({
            retrieve: true,
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "imagenes",
                'type': 'POST'
            },
            columns: [
                {data: 'id', name: 'id', "className": "col-xs-1"},
                {data: 'title', name: 'title', "className": "col-xs-1"},
                {data: 'alt', name: 'alt', "className": "col-xs-1"},
                {data: 'publicado', name: 'publicado', "className": "col-xs-1",
                    'render': function () {
                        return (arguments[0] === '1') ? 'SI' : 'NO';
                    }
                },
                {data: 'urlimg', name: 'urlimg', "className": "col-xs-1",
                    'render': function () {
                        /*añadimos las clases editarbtn y borrarbtn para procesar los eventos click de los botones. No lo hacemos mediante id ya que habrá más de un botón de edición o borrado*/
                        return "<img width='200' src='" + href2 + '/images/' + arguments[0] + "' <img>";

                    }},
                {data: 'urlimg', name: 'urlimg', "className": "col-xs-1"},
                {'data': "id", "className": "col-xs-2",
                    'render': function () {
                        /*añadimos las clases editarbtn y borrarbtn para procesar los eventos click de los botones. No lo hacemos mediante id ya que habrá más de un botón de edición o borrado*/
                        return "<a href='editarimagen/" + arguments[0] + "' class='editar btn btn-sm btn-warning ' >Editar</a><span> </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>";

                    }
                }

            ],
            'language': {
                "url": "/spanish"

            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        });

    });



    $('#imagenes-table').on('click', '.borrarbtn', function (e) {
        var miTabla = $('#imagenes-table').DataTable();
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        var aData = miTabla.row(nRow).data();
        var id = aData.id;
        //$(this).closest('tr').hide('slow');
        $.ajax({
            /*si ponemos como type delete no lo recogeríamos en $_REQUEST, así que queda como POST*/
            type: 'post',
            url: 'eliminarimagen/' + id,
            //estos son los datos que queremos actualizar, en json:
            data: {
                id: id
            },
            error: function (status, error) {
                //mostraríamos alguna ventana de alerta con el error
                alert(status, error);
            },
            success: function (data) {
                //obtenemos el mensaje del servidor, es un array!!!
                //var mensaje = (data["mensaje"]) //o data[0], en función del tipo de array!!
                //actualizamos datatables:

                //retrieve recupera los datos, si no lo ponemos, hasta que no refrescamos la página no se actualiza
                /*para volver a pedir vía ajax los datos de la tabla*/
                miTabla.draw();


                var options = {
                    "icon": 'gymzone', //Icon class - false / string - see provided CSS
                    "title": 'Administración', //Show title - false / string
                    "cls": "eliminado", //Additional container class
                    "speed": 200, //Fade-in / out animation speed
                    "timeout": 3000 //Timeout before notification disappears    
                };
                $.Growl.show(data, options);
            },
            complete: {
            }
        });
    });
});


//# sourceMappingURL=imagenes.js.map
