@extends('layouts.instructor-app')

@section('title', 'Alta')

@section('header-content')
    <div class="row margin_bottom">
    	<div class="col-md-1">
    		<img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
    	</div>
    	<div class="col-md-2 name">
    		Alumno
    	</div>
    	<div class="col-md-8 col-md-offset-1">
    		<h2><a href="#">Inscribe</a> un curso para comenzar a acumular logros</h2>
    	</div>
    </div>
@endsection

@section('content')
    <form></form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection