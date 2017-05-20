
    var elixir = require('laravel-elixir');
   


elixir(mix => {

    
     mix.sass(['app.scss','datedropper.css'],'public/css');
    mix.sass(['appback.scss','datedropper.css'],'public/backend/css/appback.css');
  
  
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/css/fonts/bootstrap');
    
    
    //copiamos los archivos js a la zona pública.
    /*
     * 
     * Con gulp --production hacemos una compilación minificada
     * 
     */
     mix.scripts('clases.js','public/js/clases.js');
    mix.scripts(['principal.js','datedroppernuevo.js','growl.js'],'public/js/principal.js');
    //mix.scripts('datedroppernuevo.js','public/js/datedroppernuevo.js');
      mix.scripts('imagenes.js','public/js/imagenes.js');
       mix.scripts('noticias.js','public/js/noticias.js');
             mix.scripts('usuarios.js','public/js/usuarios.js');
         mix.scripts('profesores.js','public/js/profesores.js');
         mix.scripts('timedropper.js','public/js/timedropper.js');
     mix.scripts('tipos.js','public/js/tipos.js');
    
});
