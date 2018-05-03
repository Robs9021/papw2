@extends('layouts.student-app')

@section('title', 'Inicio')

@section('header-content')
    <div class="row margin_bottom">
    	<div class="col-md-1">
    		<img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
    	</div>
    	<div class="col-md-2 username">
    		Alumno
    	</div>
    	<div class="col-md-8 col-md-offset-1">
    		<h2><a href="#">Inscribe</a> un curso para comenzar a acumular logros</h2>
    	</div>
    </div>
@endsection

@section('content')
    <div class="row margin_bottom">
    	<div class="col-md-12 section-title">
    		<h1>Mis cursos</h1>
    	</div>
    	<div class="col-md-4 bg-secondary">
    		<h2>Inscribe un curso</h2>
    		<p><a href="#"><span class="glyphicon glyphicon-plus btn-icon"></span></a></p>
    	</div>
    </div>
    <div class="row margin_bottom">
    	<div class="col-md-12 section-title">
    		<h1>Mis logros</h1>
    	</div>
    	<div class="col-md-4 bg-secondary">
    		<h2>Aún no has obtenido logros</h2>
    		<p><span class="glyphicon glyphicon-alert btn-icon"></span></p>
    	</div>
    </div>
@endsection