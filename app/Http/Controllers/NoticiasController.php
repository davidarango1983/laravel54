<?php

namespace App\Http\Controllers;
use Carbon;
use App\Http\Requests\NoticiasRequest;
use App\Noticias;
use Storage;
use Illuminate\Support\Facades\DB;
use App\Configuration;

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
         \Session::flash('flash_message', 'Es registro se ha creado Correctamente. ');
        return redirect()->action('AdministracionController@noticias');
    }

    /*
     * @param request Datos recibidos mediante post
     * @return view redirect
     * Función que actualiza los datos de una noticia
     */

    public function update(NoticiasRequest $request) {
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');

        try {
            $noticia = Noticias::find($request['id']);
        } catch (Exception $e) {
          \Session::flash('flash_message_error', 'Ha ocurrido un error: '.$format.' error: '.$e);
        return redirect()->action('AdministracionController@noticias');
        }


        $noticia->title = $request->titulo;
        $noticia->content = $request->contenido;
        $noticia->publicado = $request->publicar;
        $imagen = $request->file('imagen');
        if ($imagen != null) {
            Storage::disk('public')->delete($noticia->urlimg);
            $rutaimg = time() . '_' . $imagen->getClientOriginalName();
            Storage::disk('public')->put($rutaimg, file_get_contents($imagen->getRealPath()));
            $noticia->urlimg = $rutaimg;
        }

        $noticia->update();
          \Session::flash('flash_message', 'Es registro se ha actualizado correctamente. '.$format);
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
            $noticia = Noticias::find($id);
        } catch (Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }
        Storage::disk('public')->delete($noticia->urlimg);
        Noticias::destroy($id);
        return 'Se ha borrado correctamente la noticia id: ' . $id;
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
        $noticias = DB::table('noticias')->orderBy('created_at', 'DESC')->paginate(5);
        return $noticias;
    }

    public function vista() {
        
          $config=Configuration::find(1);
   if($config->disable_news==1){
         \Session::flash('flash_message', 'Esta sección está inhabilitada temporalmente.');
       return redirect()->action('HomeController@index');
   }else{
        $ruta = storage_path() . '/imgNoticias';
        $noticias = self::cargarNoticias();
        return view('news', ['noticia' => $noticias, 'ruta' => $ruta]);
       
   }
        
    }

}
