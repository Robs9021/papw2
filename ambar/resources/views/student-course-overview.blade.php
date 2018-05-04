@extends('layouts.student-app')

@section('title', 'Nombre del curso')  
<!--The title must be the name of the course in the DB-->

@section('header-content')
	<div class="row margin_bottom">
		<div class="col-md-1">
	    	<img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
	    </div>
	    <div class="col-md-8 name">
	    	Nombre del curso
	    </div>
	    <div class="col-md-3">
	    	<button class="btn btn-default"><h4>Inscribirse</h4></button>
	    </div>
	</div>
@endsection

@section('content')
	<div class="row margin_bottom">
    	<div class="col-md-12 section-title">
    		<h1>Sobre el curso</h1>
    	</div>
    	<!-- If the 12 columns are used, should an extra row be created? -->
    	<div class="col-md-12 text-justify">
    		<p class="dp">Descripción general del curso</p>
    	</div>
    </div>
    <div class="row margin_bottom">
    	<div class="col-md-12 section-title">
    		<h1>Competencias a desarrollar</h1>
    	</div>
    	<div class="col-md-12 text-justify">
    		<ul>
    			<li>Competencia 1</li>
    			<li>Competencia 2</li>
    			<li>Competencia 3</li>
    		</ul>
    	</div>
    </div>
    <div class="row margin_bottom">
    	<div class="col-md-12 section-title">
    		<h1>Módulos</h1>
    	</div>
    	<div class="col-md-12 text-justify">
    		<ul>
    			<li>Módulo 1</li>
    			<li>Módulo 2</li>
    			<li>Módulo 3</li>
    		</ul>
    	</div>
    </div>
@endsection