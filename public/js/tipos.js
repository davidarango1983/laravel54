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



    $('#tipos').addClass('active');



        $(function () {            $('#tipos-table').DataTable({
                retrieve: true,
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "listatipos",
                    'type': 'POST'
                },
                columns: [
                    {data: 'id', name: 'id',"className":"col-xs-1"},
                
                    {data: 'name', name: 'name',"className":"col-xs-1"},
                    {data: 'precio', name: 'precio',"className":"col-xs-1"},
                    {data: 'duration', name: 'duration',"className":"col-xs-1"},
                     {'data': "id","className":"col-xs-2",
                        'render': function () {
                            /*añadimos las clases editarbtn y borrarbtn para procesar los eventos click de los botones. No lo hacemos mediante id ya que habrá más de un botón de edición o borrado*/
                            return "<a href='editartipo/"+arguments[0] +"' class='editar btn btn-sm btn-warning ' >Editar</a><span> </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>";

                        }

                    }




                ],
                'language': {
                    "url": "/spanish"

                }

            });









        });

 /*
  * Botón Borrar
  *
  */

    $('#tipos-table').on('click', '.borrarbtn', function (e) {
        var miTabla = $('#tipos-table').DataTable();
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        var aData = miTabla.row(nRow).data();
        var id = aData.id;
             $.ajax({
            /*si ponemos como type delete no lo recogeríamos en $_REQUEST, así que queda como POST*/
            type: 'post',
            url: 'eliminartipo/' + id,
            //estos son los datos que queremos actualizar, en json:
            data: {
                id: id
            },
            error: function (status, error) {

                var options = {
                 "icon": 'gymzone', //Icon class - false / string - see provided CSS
                    "title": 'Ha surgido el siguiente error', //Show title - false / string
                    "cls": "eliminado", //Additional container class
                    "speed": 200, //Fade-in / out animation speed
                    "timeout": 10000 //Timeout before notification disappears    
                };
                $.Growl.show(error);
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
                      "title": 'Mensaje de administración:', //Show title - false / string
                    "cls": "eliminado", //Additional container class
                    "speed": 200, //Fade-in / out animation speed
                    "timeout": 10000 //Timeout before notification disappears
                };
                $.Growl.show(data,options);
            },
            complete: {
            }
        });
    });




});
