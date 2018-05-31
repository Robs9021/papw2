<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ambar</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <!-- <a class="navbar-brand" href="#"><img class="image-responsive" src="imgs/logo.png"></a> -->
                    </div>
                    <div class="nav navbar-nav navbar-right">
                        <!-- <button class="btn btn-default navbar-btn"><h4>Contáctanos</h4></button> -->
                    </div>
                </div>
            </nav>

            <div class="container-fluid bg-primary masthead margin_bottom">
                <img class="image-responsive center-block" src="{{ asset('imgs/logo.png') }}">
                <h2><br><span class="title">ÁMBAR</span> <br><br> La mejor solución en capacitaciones para tu empresa.</h2>
            </div>
            <div class="container text-center tab-content">
                <div id="land" class="tab-pane fade in active">
                    <h2>Ingresa ahora a nuestro sitio.</h2>
                    <div class="row margin_bottom">
                        <div class="col-md-4 col-md-offset-4">
                            <a data-toggle="tab" href="#trainer" class="btn btn-default btn-block"><h4>Instructores, iniciar aquí</h4></a>
                        </div>
                    </div>
                    <div class="row margin_bottom">
                        <div class="col-md-4 col-md-offset-4">
                            <a data-toggle="tab" href="#student" class="btn btn-default btn-block"><h4>Estudiantes, iniciar aquí</h4></a>
                        </div>
                    </div>
                </div>
                <div id="trainer" class="tab-pane fade">
                    <h2>Inicia sesión</h2>
                    <form>
                        <div class="form-group col-md-4 col-md-offset-4">
                            <input type="email" class="form-control" placeholder="Email">                   
                        </div>
                        <div class="form-group col-md-4 col-md-offset-4">
                            <input type="password" class="form-control" placeholder="Contraseña">
                        </div>
                    </form>
                    <div class="row margin_bottom">
                        <div class="col-md-2 col-md-offset-4">
                            <a data-toggle="tab" href="#land" class="btn btn-info btn-block"><h4><span class="glyphicon glyphicon-triangle-left"></span>Atrás</h4></a>
                        </div>
                        <div class="col-md-2">
                            <a data-toggle="tab" href="#" class="btn btn-success btn-block"><h4>Entrar</h4></a>
                        </div>
                    </div>
                </div>
                <div id="student" class="tab-pane fade">
                    <div class="col-md-3 col-md-offset-3 border_right">
                        <h2>Inicia sesión</h2>
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">                   
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Contraseña">
                            </div>
                        </form>
                        <div class="row margin_bottom">
                            <div class="col-md-12">
                                <a data-toggle="tab" href="#" class="btn btn-success btn-block"><h4>Entrar</h4></a>
                            </div>
                            
                        </div>
                        <div class="row margin_bottom">
                            <div class="col-md-12">
                                <a data-toggle="tab" href="#land" class="btn btn-info btn-block"><h4><span class="glyphicon glyphicon-triangle-left"></span>Atrás</h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h2>Regístrate</h2>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre(s)" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Apellido(s)" name="last-name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="signup-email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Contraseña" name="signup-password">
                            </div>
                        </form>
                        <div class="row margin_bottom">
                            <div class="col-md-12">
                                <a data-toggle="tab" href="#" class="btn btn-success btn-block"><h4>Registrarse</h4></a>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        </div>
    </body>
</html>
