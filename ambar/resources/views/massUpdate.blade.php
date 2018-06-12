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
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña" name="signup-password">
            </div>                    
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </form>
        <div class="row margin_bottom">
            <div class="col-md-12">
                <a href="#" class="btn btn-success btn-block" id="edit"><h4>Guardar</h4></a>
            </div>
        </div>
    </div>    
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/massUpdate.js') }}"></script>
@endsection