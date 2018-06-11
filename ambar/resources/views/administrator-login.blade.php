@extends('layouts.admin-app')

@section('title', 'Administrador Login')

@section('header-content')
    <div class="row margin_bottom">
    	
    	<div class="col-md-12 name">
    		Inicia Sesión como administrador
    	</div>
    </div>
@endsection

@section('content')
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
    <div class="col-md-6 col-md-offset-3">
        <h2>Ingresa tus datos</h2>
        <form action="store" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="login-email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña" name="login-password">
            </div>           
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </form>
        <div class="row margin_bottom">
            <div class="col-md-12">
                <a href="#" class="btn btn-success btn-block" id="login"><h4>Entrar</h4></a>
            </div>
        </div>
    </div>    
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/administrator-login.js') }}"></script>
@endsection