
    var elixir = require('laravel-elixir');
   


elixir(mix => {

    
     mix.sass('app.scss','public/css').sass('appback.scss','public/backend/css');
            
   
  
  
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/css/fonts/bootstrap');
    
});
