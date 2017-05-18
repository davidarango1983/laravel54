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

    


    $('#clases').addClass('active');

    /*
     * 
     * ZONA CLASES
     * 
     */
    /*
     * 
     * @returns Datatable
     * 
     * función que crea la tabla de clases
     * 
     */


    $(function () {
        $('#clase-table').DataTable({
            retrieve: true,
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "listaclases",
                'type': 'POST'

            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'hora_ini', name: 'hora_ini',
                    "className": "col-xs-1"},            
                {data: 'hora_fin', name: 'hora_fin',
           "className": "col-xs-1"},        
                {data: 'dia', name: 'dia'},
                {data: 'limit', name: 'limit', 
             "className": "col-xs-1"},        
                {data: 'publicado', name: 'publicado',
                    'render': function () {
                        return (arguments[0] === '1') ? 'SI' : 'NO';
                    },
               "className": "col-xs-1"},        
                {data: 'profesor.name', name: 'profesor_id',
                    'render': function () {

                        return arguments[0] + ' ' + arguments[2]['profesor']['last_name'];

                    }},
                {data: 'tipo.name', name: 'tipo', "className": "col-xs-1"},
                {'data': "id", "className": "col-xs-2",
                    'render': function () {
                        /*añadimos las clases editarbtn y borrarbtn para procesar los eventos click de los botones. No lo hacemos mediante id ya que habrá más de un botón de edición o borrado*/
                        return "<a href='editarclase/" + arguments[0] + "' class='editar btn btn-sm btn-warning ' >Editar</a><span> </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>";

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
    /*
     *BOTÓN BORRAR ZONA CLASES
     */


    $('#clase-table').on('click', '.borrarbtn', function (e) {
        var miTabla = $('#clase-table').DataTable();
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        var aData = miTabla.row(nRow).data();
        var id = aData.id;
        //$(this).closest('tr').hide('slow');
        $.ajax({
            /*si ponemos como type delete no lo recogeríamos en $_REQUEST, así que queda como POST*/
            type: 'post',
            url: 'eliminarclase/' + id,
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
                    "timeout": 100000 //Timeout before notification disappears    
                };
                $.Growl.show(data, options);
            },
            complete: {
            }
        });
    });



    /*
     * 
     * ZONA TIPOS DE CLASE TABLE
     */
    /*
     * 
     * @returns DATATABLES
     * función que crea la tabla de tipso de clases
     */


    $(function () {
        $('#tipoclase-table').DataTable({
            retrieve: true,
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "listatipoclases",
                'type': 'POST'
            },
            columns: [
                {data: 'id', name: 'id',"className": "col-xs-1"},    
                {data: 'name', name: 'name',"className": "col-xs-2"},    
                 {data: 'description', name: 'description',"className": "col-xs-7",
                    'render': function (data) {
                        return data.substring(0, 80) + "...";
                    }
                },
             
                {'data': "id","className": "col-xs-2",
                    'render': function () {
                        /*añadimos las clases editarbtn y borrarbtn para procesar los eventos click de los botones. No lo hacemos mediante id ya que habrá más de un botón de edición o borrado*/
                        return "<a href='editartipoclase/" + arguments[0] + "' class='editar btn btn-sm btn-warning ' >Editar</a><span> </span><button class='borrarbtn btn btn-xs btn-danger'>Borrar</button>";

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
    /*
     * Botón borrar 
     * 
     */


    $('#tipoclase-table').on('click', '.borrarbtn', function (e) {
        var miTabla = $('#tipoclase-table').DataTable();
        e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        var aData = miTabla.row(nRow).data();
        var id = aData.id;
        //$(this).closest('tr').hide('slow');
        $.ajax({
            /*si ponemos como type delete no lo recogeríamos en $_REQUEST, así que queda como POST*/
            type: 'post',
            url: 'eliminartipoclase/' + id,
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

/*
 * ZONA RESERVAS
 * 
 * 
 */

$('.btnimprimir').click(function (){
   window.print(); 
    
});     

    $(function () {
       $('#reservasusuarios-table').DataTable({
          "lengthMenu": [[50, -1], [50, "Todos"]],
            retrieve: true,
            processing: true,
            serverSide: true,
             
            
            "ajax": {
                "url": "reservasusuarios",
                'type': 'POST'
            },
            columns: [
                
                {data: 'clase_id', name: 'clase_id',"className": "col-xs-1"},
                {data: 'clase.dia', name: 'clase.dia',"className": "col-xs-1"},
                {data: 'clase.hora_ini', name: 'clase.hora_ini',"className": "col-xs-1"},
                {data: 'clase.hora_fin', name: 'clase.hora_fin',"className": "col-xs-1"},
                {data: 'user_id', name: 'user_id',"className": "col-xs-1"},
                {data: 'user.name', name: 'user.name',"className": "col-xs-1"},
                {data: 'user.last_name', name: 'user.last_name',"className": "col-xs-1"},
                {data: 'user.telefono', name: 'user.telefono',"className": "col-xs-1"}              
               

            ],
            'columnDefs'        : [   
                { 
                    'searchable'    : false, 
                    'targets'       : [1,2,3,4,5,6,7] 
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




});
