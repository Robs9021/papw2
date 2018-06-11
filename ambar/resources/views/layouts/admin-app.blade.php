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
                                    <!-- Check if navbar has utility here -->
                                    <li><a href="#">Agregar curso</a></li>
                                    <li><a href="#">Editar curso</a></li>
                                    <li><a href="#">Eliminar curso</a></li>
                                </ul>
                            </li>
                        </ul>
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
                        <div class="nav navbar-nav navbar-right">
                            <!-- Username must go here with a link to the user profile using brand font -->
                            <a class="navbar-important" href="#">Administrator</a>
                        </div>
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