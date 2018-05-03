@extends('layouts.student-app')

@section('title', 'Catálogo')

@section('header-content')
    <div class="row margin_bottom">
    	<div class="col-md-12 name">
    		Catálogo de cursos
    	</div>
    </div>
@endsection

@section('content')
    <!-- Each row of the catalog must be centered -->
    <div class="row margin_bottom text-center">
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
    </div>
@endsection