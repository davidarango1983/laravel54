<?php

namespace App\Http\Controllers;

use App\Jobs\Utiles;
use App\Http\Requests\NoticiasRequest;
use App\Noticias;
use Storage;
use Illuminate\Support\Facades\DB;

class NoticiasController extends Controller {

    public function create(NoticiasRequest $request) {


        $noticia = new Noticias();
        $noticia->title = $request->titulo;
        $noticia->content = $request->contenido;
        $noticia->publicado = $request->publicar;
        $imagen = $request->file('imagen');
        if ($imagen != null) {
            $rutaimg = time() . '_' . $imagen->getClientOriginalName();
            Storage::disk('public')->put($rutaimg, file_get_contents($imagen->getRealPath()));
            $noticia->urlimg = $rutaimg;
        }
        $noticia->save();

        return redirect()->action('AdministracionController@noticias');
    }

    /*
     * @param request Datos recibidos mediante post
     * @return view redirect
     * Función que actualiza los datos de una noticia
     */

    public function update(NoticiasRequest $request) {
        try {
            $noticia = Noticias::find($request['id']);
        } catch (Exception $e) {
            return 'Se ha producdo el siguiente error: ' . $e;
        }


        $noticia->title = $request->titulo;
        $noticia->content = $request->contenido;
        $noticia->publicado = $request->publicar;

        $imagen = $request->file('imagen');
        if ($imagen != null) {
            $rutaimg = time() . '_' . $imagen->getClientOriginalName();
            Storage::disk('public')->put($rutaimg, file_get_contents($imagen->getRealPath()));
            $noticia->urlimg = $rutaimg;
        }        

        $noticia->update();

        return redirect()->action('AdministracionController@noticias');
    }

    /*
     * Función que devuelve el formulario para la creación de noticias
     * @return view form
     */

    public function anadir() {

        return view('admin.noticias.form');
    }

    public function destroy($id) {

        try {
            Noticias::find($id);
        } catch (Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }
        Noticias::destroy($id);
        return 'Se ha borrado correctamente al Profesor con id: ' . $id;
    }

    public function editar($id) {
        $noticia = Noticias::find($id);
        return view('admin.noticias.edit', ['noticia' => $noticia]);
    }

    /*
     * Función que recupera las noticias para mostrarlas en el home
     * 
     * @return array Noticias
     */

    public static function cargarNoticias() {

        $noticias = DB::table('noticias')->orderBy('created_at', 'DESC')->paginate(2);

        return $noticias;
    }

}
