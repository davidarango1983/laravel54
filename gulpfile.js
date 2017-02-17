
    var elixir = require('laravel-elixir');
   
var bootstrap_sass = './node_modules/bootstrap-sass/';

elixir(mix => {
    // copy bootstrap fonts to public folder
    mix.copy(bootstrap_sass+"assets/fonts/bootstrap",'public/fonts');

    mix.sass('app.scss');
});
