<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Ambar - @yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @section('navbar')
                 <nav class="navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
                            <!-- A link to home must go here -->
                            <a class="navbar-important" href="#">Ámbar</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Acciones <span class="glyphicon glyphicon-triangle-bottom"></span></a>
                                <ul class="dropdown-menu">
                                    <!-- If user has no courses, just show a link to cousrses catalog -->
                                    <li><a href="#" class="addCourse">Agregar curso</a></li>
                                    <li><a href="#">Editar curso</a></li>
                                    <li><a href="#">Eliminar curso</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="nav navbar-nav navbar-right text-center">
                            <button class="btn btn-default navbar-btn hidden" id="logout"><h4>Cerrar Sesión <i class="glyphicon glyphicon-log-out"></i></h4></button>
                        </div>
                        <!-- A search action must be included here -->
                        <form class="navbar-form navbar-left" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
            @show

            <div class="container-fluid bg-primary secondary-head margin_bottom">
                <div class="container">
                    @yield('header-content')
                </div>
            </div>
            <div class="container text-center">
                @yield('content')
            </div>
            <!-- Scripts -->
            @section('scripts')
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            @show
        </div>
    </body>
</html>