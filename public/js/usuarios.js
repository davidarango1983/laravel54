/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


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



    $('#usuarios').addClass('active');



        $(function (){$('#users-table').DataTable({
                retrieve: true,
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "usuarios",
                    'type': 'POST'



                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'telefono', name: 'telefono',
                        "className": "visible-lg visible-md visible-sm"},
                    {data: 'email', name: 'email',
                        "className": "visible-lg visible-md visible-sm"},
                    {data: 'fecha_nac', name: 'fecha_nac',
                        "className": "visible-lg visible-md visible-sm"},
                    {'data': "id", "className": "visible-lg",
                        'render': function () {
                            /*añadimos las clases editarbtn y borrarbtn para procesar los eventos click de los botones. No lo hacemos mediante id ya que habrá más de un botón de edición o borrado*/
                            return "<button class='vermas btn btn-sm btn-info ' >Ver Mas</button><span> </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>";

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



    $('#users-table').on('click', '.borrarbtn', function (e) {
        var miTabla = $('#users-table').DataTable();
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        var aData = miTabla.row(nRow).data();
        var id = aData.id;
        //$(this).closest('tr').hide('slow');
        $.ajax({
            /*si ponemos como type delete no lo recogeríamos en $_REQUEST, así que queda como POST*/
            type: 'post',
            url: 'eliminarusuario/' + id,
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
                    "icon": true, //Icon class - false / string - see provided CSS
                    "title": 'Administración', //Show title - false / string
                    "cls": "eliminado", //Additional container class
                    "speed": 200, //Fade-in / out animation speed
                    "timeout": 2000 //Timeout before notification disappears    
                };
                $.Growl.show(data, options);
            },
            complete: {
            }
        });
    });


    /*
     * Botón Ver más
     * 
     */

    $('#users-table').on('click', '.vermas', function (e) {

        var miTabla = $('#users-table').DataTable();
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        var aData = miTabla.row(nRow).data();
        var id = aData.id;


        /*
         * Hacemos una petición ajax para recuperar la información del usuario desde la bbdd
         *  
         */
        $.ajax({
            /*si ponemos como type delete no lo recogeríamos en $_REQUEST, así que queda como POST*/
            type: 'post',
            url: 'get_usuario/' + id,
            //estos son los datos que queremos actualizar, en json:
            data: {
                id: id
            },
            error: function (status, error) {
                //mostraríamos alguna ventana de alerta con el error
              alert('Se ha producido el siguiente error: '+error);
              
            },
            success: function (data) {
                     $('#modalusuarios').html(data);
                     
                },
            complete: function (){
                
                $('#modalusuarios').modal('show');
            }
        });

    });
    
  
    
    
});

