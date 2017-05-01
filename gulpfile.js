
    var elixir = require('laravel-elixir');
   


elixir(mix => {

    
     mix.sass('app.scss','public_html/css').sass('appback.scss','public_html/backend/css');
            
   
  
  
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public_html/css/fonts/bootstrap');
    
});
