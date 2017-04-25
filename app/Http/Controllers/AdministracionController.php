<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdministracionController extends Controller
{

    /*
     * Aplicamos el control de acceso a la zona administrativa
     * mediante el middleware admin
     * 
     */
    
     public function __construct()
    {
        $this->middleware('Admin');
    }
    
    
    
    public function administrador(){        
        
        return view('admin.admin');
    }
    
    
    public function usuarios(){        
        
        return view('admin.usuario.usuarios');
    }
    
      public function profesores(){        
        
        return view('admin.profesor.profesores');
    }
      public function clases(){        
        
        return view('admin.clase.clases');
    }
      public function noticias(){        
        
        return view('admin.noticias.noticias');
    }
      public function imagenes(){        
        
        return view('admin.imagenes.imagenes');
    }
      public function general(){        
        
        return view('admin.general');
    }
      public function tiposuscricion(){        
        
        return view('admin.tiposuscripcion');
    }
    public function tipoclases(){        
        
        return view('admin.tipoclase.tipoclases');
    }
    
     public function reservas(){        
        
        return view('admin.reservas.reservas');
    }
   
    
    
    public function traduccionDatatable(){

$jsonDatatable='{
	"sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ Registros",
	"sZeroRecords":    "No se han encontrado resultados",
	"sEmptyTable":     "No hay datos disponibles",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar:",
	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
	},
	"oAria": {
		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}
}';

return $jsonDatatable;


}


private function eliminarClases(){
    
    
   return 'Ha entrado';
}




    
    
    
    
}
