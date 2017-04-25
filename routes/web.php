<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');


Route::get("test-email", function() {
	Mail::send("emails.bienvenido", [], function($message) {
    $message->from('gymzonezaragoza@gmail.com', 'ADMIN');
    $message->to("soldaditorockero@gmail.com", "ASIER")->subject("Bienvenido a GYMZONE!");
	});
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/perfil', 'HomeController@perfil');
Route::post('update','UserController@update');
Route::get('editar','UserController@editar');
Route::get('loginadmin', 'AdministracionController@login');





//Rutas de la zona administrativa. Middleware isAdmin

Route::get('admin', 'AdministracionController@administrador');
Route::get('admin/usuarios', 'AdministracionController@usuarios');
Route::get('admin/clases', 'AdministracionController@clases');
Route::get('admin/tipoclases', 'AdministracionController@tipoclases');
Route::get('admin/profesores', 'ProfesorController@profesores');
Route::get('admin/anadirprofesor', 'ProfesorController@anadirprofesor');
Route::get('admin/noticias', 'AdministracionController@noticias');
Route::get('admin/imagenes', 'AdministracionController@imagenes');
Route::get('admin/general', 'AdministracionController@general');
Route::get('admin/reservas', 'AdministracionController@reservas');
Route::get('admin/noticias', 'AdministracionController@noticias');
Route::get('admin/imagenes', 'AdministracionController@imagenes');

//RUTA UTILIZADA POR CRON
Route::get('admin/eliminarclases', 'AdministracionController@eliminarClases');


/*
 * TIPOS DE SUSCRIPCIÓN
 * 
 * 
 */

Route::get('admin/tipos', 'TiposSuscripcionController@tipos');
Route::get('admin/anadirtipo', 'TiposSuscripcionController@anadirtipo');
Route::post('admin/listatipos', 'DatatablesController@tipos');
Route::get('admin/editartipo/{id}', 'DatatablesController@editartipo');
Route::post('admin/updatetipo', 'TiposSuscripcionController@update');
Route::post('admin/eliminartipo/{id}', 'TiposSuscripcionController@destroy');
Route::post('admin/createtipo', 'TiposSuscripcionController@create');

/*
 * CLASES
 * 
 */
Route::get('admin/anadirclase', 'ClaseController@anadir');
Route::post('admin/createclase', 'ClaseController@create');
Route::post('admin/listaclases', 'DatatablesController@clases');
Route::post('admin/eliminarclase/{id}', 'ClaseController@destroy');
Route::post('admin/editarclase', 'ClaseController@update');
Route::get('admin/editarclase/{id}', 'ClaseController@editar');
Route::get('reservaclases','ClaseController@reservas')->middleware('CuentaActiva');
Route::post('reservarclase','ReservaController@create');

/*
 * TIPO DE CLASES
 * 
 */
Route::post('admin/listatipoclases', 'DatatablesController@tipoclases');
Route::get('admin/anadirtipoclase', 'TipoClaseController@anadir');
Route::post('admin/createtipoclase', 'TipoClaseController@create');
Route::post('admin/eliminartipoclase/{id}', 'TipoClaseController@destroy');
Route::get('admin/editartipoclase/{id}', 'TipoClaseController@editar');
Route::post('admin/updatetipoclase', 'TipoClaseController@update');

/*
 * PROFESORES
 * 
 * 
 */
Route::post('admin/profesores', 'DatatablesController@listaProfesores');
Route::get('admin/anadirprofesor', 'ProfesorController@anadir');
Route::get('admin/editarprofesor/{id}', 'ProfesorController@editar');
Route::post('admin/profesorupdate', 'ProfesorController@update');
Route::post('admin/eliminarprofesor/{id}', 'ProfesorController@destroy');
Route::post('admin/profesorcreate', 'ProfesorController@create');


/*
 * TRADUCCIÓN DATATABLES
 * 
 */
Route::get('spanish','AdministracionController@traduccionDatatable');

/*
 * USUARIOS
 * 
 */
Route::post('admin/get_usuario/{id}', 'DatatablesController@get_usuario');
Route::post('admin/usuarios', 'DatatablesController@usuarios');
Route::post('admin/eliminarusuario/{id}','UserController@destroy');

/*
 * RESERVA DE CLASES
 * 
 * 
 */

Route::post('reservaclases/reserva','ReservaController@create');
Route::post('reservaclases/anulareserva','ReservaController@destroy');
Route::get('reservaclases/{dia}','ClaseController@dia');
Route::post('admin/reservasusuarios','DatatablesController@listaReservas');


/*
 * NOTICIAS
 * 
 */

Route::get('admin/anadirnoticia','NoticiasController@anadir');
Route::post('admin/createnews','NoticiasController@create');
Route::post('admin/noticias', 'DatatablesController@noticias');
Route::post('admin/eliminarnoticia/{id}', 'NoticiasController@destroy');
Route::get('admin/editarnoticia/{id}', 'NoticiasController@editar');
Route::post('admin/editarnoticia', 'NoticiasController@update');
/*
 * VISTA DE NOTICIAS
 * 
 */
Route::get('noticias', 'NoticiasController@vista');


/*
 * IMÁGENES
 * 
 */
Route::get('admin/anadirimagen','ImagenesController@anadir');
Route::post('admin/createimagen','ImagenesController@create');
Route::post('admin/imagenes', 'DatatablesController@imagenes');
Route::post('admin/eliminarimagen/{id}', 'ImagenesController@destroy');
Route::get('admin/editarimagen/{id}', 'ImagenesController@editar');
Route::post('admin/editarimagen', 'ImagenesController@update');




/*
 * Rutas para las imágenes
 * 
 * 
 */

Route::get('/images/{filename}', function ($filename)
{
 
    $path = storage_path() . '/app/public/' . $filename;

      $file = File::get($path);
      $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

/*
 * RUTAS DE VALIDACIONES
 * 
 */

Validator::extend('dni', 'customValidation@dni');