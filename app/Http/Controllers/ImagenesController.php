<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagenesRequest;
use App\Imagenes;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ImagenesRequest $request)
    {
    
        $imagen = new Imagenes();
        $imagen->title = $request->title;
        $imagen->alt = $request->alt;
        $imagen->publicado = $request->publicar;        
        $imagenOri = $request->file('imagen');
        if ($imagenOri != null) {
            $rutaimg = time() . '_' . $imagenOri->getClientOriginalName();
            Storage::disk('public')->put($rutaimg, file_get_contents($imagenOri->getRealPath()));
            $imagen->urlimg = $rutaimg;
        }
        $imagen->save();

        return redirect()->action('AdministracionController@imagenes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      
     public function update(ImagenRequest $request) {
        try {
            $imagen = Imagenes::find($request['id']);
        } catch (Exception $e) {
            return 'Se ha producdo el siguiente error: ' . $e;
        }

        $imagen->title = $request->title;
        $imagen->alt = $request->alt;
         $imagen->urlImg = $request->urlimg;
        $imagen->publicado = $request->publicar;        
        $imagenOri = $request->file('imagen');
        if ($imagenOri != null) {
            $rutaimg = time() . '_' . $imagenOri->getClientOriginalName();
            Storage::disk('public')->put($rutaimg, file_get_contents($imagenOri->getRealPath()));
            $imagen->urlimg = $rutaimg;
        }
        $imagen->update();

        return redirect()->action('AdministracionController@imagenes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
// $imagen=null;
        try {
            $imagen=Imagenes::find($id);
        } catch (Exception $e) {
            return 'Se ha producido el siguiente error: ' . $e;
        }
        Storage::disk('public')->delete($imagen->urlimg);
        Imagenes::destroy($id);
        
        return 'Se ha borrado correctamente la imagen con id: ' . $id;
        
    }
    
    
     public function anadir() {
        return view('admin.imagenes.form');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id) {
        $imagen = Imagenes::find($id);
        return view('admin.imagenes.edit', ['noticia' => $imagen]);
    }
    
    public static function cargarImagenes() {
        $imagenes = DB::table('imagenes')->orderBy('created_at', 'DESC')->paginate(100);
        return $imagenes;
    }
}
