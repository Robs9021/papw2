@extends('layouts.instructor-app')

@section('title', 'Inicio')

@section('header-content')
    <div class="row margin_bottom">
    	<div class="col-md-1">
    		<img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
    	</div>
    	<div class="col-md-11 name">
    		Instructor
    	</div>
    </div>
@endsection

@section('content')
    <div class="row margin_bottom">
    	<div class="col-md-12 section-title">
    		<h1>Cursos que he subido</h1>
    	</div>
        <div class="col-md-4 pall">
            <div class="bg-secondary pall">
                <img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
                <h2>Nombre del curso</h2>
                <p>Descripción del curso</p>
                <p><a href="#"><span class="glyphicon glyphicon-plus btn-icon"></span></a></p>
            </div>
        </div>
        <div class="col-md-4 pall">
            <div class="bg-secondary pall">
                <img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
                <h2>Nombre del curso</h2>
                <p>Descripción del curso</p>
                <p><a href="#"><span class="glyphicon glyphicon-plus btn-icon"></span></a></p>
            </div>
        </div>
        <div class="col-md-4 pall">
            <div class="bg-secondary pall">
                <img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
                <h2>Nombre del curso</h2>
                <p>Descripción del curso</p>
                <p><a href="#"><span class="glyphicon glyphicon-plus btn-icon"></span></a></p>
            </div>
        </div>
    	<div class="col-md-4 bg-secondary">
    		<h2>Agrega un curso</h2>
    		<p><a href="#"><span class="glyphicon glyphicon-plus btn-icon"></span></a></p>
    	</div>
    </div>
@endsection