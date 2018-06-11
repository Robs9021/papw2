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
                            <!-- <a class="navbar-brand" href="#"><img class="image-responsive" src="imgs/logo.png"></a> -->
                        </div>
                        <div class="nav navbar-nav navbar-right">
                            <!-- <button class="btn btn-default navbar-btn"><h4>Contáctanos</h4></button> -->
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