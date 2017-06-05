<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>GYMZONE </title>
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>

    <body>
        <h1 class="text-center">GYMZONE</h1>
        
         @yield('content')
        
      
        
        <section id="contact" class="container content-section text-center">
           
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>¿ Deseas más información ?</h2>
                    <p>No dudes en escribirnos. Te daremos toda la información que necesites. Y si quieres visitarnos estamos en la calle Paseo de la Ribera Nº1</p>
                    <p><a href="mailto:gymzonezaragoza@gmail.com">gymzonezaragoza@gmail.com</a>
                    </p>
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/" class="btn btn-default btn-lg"><em class="fa fa-twitter fa-fw"></em> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/davidarango1983/laravel54" class="btn btn-default btn-lg"><em class="fa fa-github fa-fw"></em> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com" class="btn btn-default btn-lg"><em class="fa fa-facebook fa-fw"></em> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
                       <p>Gym Zone Zaragoza 2017</p>
                </div>
            </div>
        </section>
          
    </body>

</html>
