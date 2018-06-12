@extends('layouts.admin-app')

@section('title', 'Edita')

@section('header-content')
    <div class="row margin_bottom">
    	<div class="col-md-1 text-center">
    		<img class="avatar-pic img-circle" id="avatar" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
    	</div>
    	<div class="col-md-11 name">
    		Administrator
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
        <h2>Editar Usuario</h2>
        <form action="edit" method="post" enctype="multipart/form-data">
            <div class="form-group text-left">
                <label for="user-type">Administrador</label>
                <input type="radio" name="user-type" value="1">
                <!-- <input type="number" class="form-control" placeholder="tipo" name="user-type"> -->
            </div>
            <div class="form-group text-left">
                <label for="user-type">Instructor</label>
                <input type="radio" name="user-type" value="2">
            </div>
            <div class="form-group text-left">
                <label for="user-type">Estudiante</label>
                <input type="radio" name="user-type" value="3">
            </div>
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
            <div class="form-group">
                <input type="file" class="form-control" name="imageFile" id="imageFile">
            </div>  
            <div class="form-group text-left">
                <label for="#empresas">Empresa: </label>
                <select class="form-control" id="empresas">
                    <option value="0">Selecciona</option>                    
                </select>
            </div>
            
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Agregar empresa" id="company">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="addCompany"><i class="glyphicon glyphicon-ok"></i></button>
                </span>
            </div><!-- /input-group -->
                    
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </form>
        <div class="row margin_bottom">
            <div class="col-md-6">
                <a href="#" class="btn btn-danger btn-block" id="delete"><h4>Borrar usuario</h4></a>
            </div>
            <div class="col-md-6">
                <a href="#" class="btn btn-success btn-block" id="edit"><h4>Guardar</h4></a>
            </div>
        </div>
    </div>    
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/aedit.js') }}"></script>
@endsection