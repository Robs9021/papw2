@extends('layouts.admin-app')

@section('title', 'Alta')

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
        <h2>Buscar Usuarios</h2>
        <form action="search" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar" id="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="btnSearchUser"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div><!-- /input-group -->
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </form>
    </div>

    <div class="row margin_bottom text-center" id="catalogArea">
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/asearch.js') }}"></script>
@endsection