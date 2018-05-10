@extends('layouts.student-app')

@section('title', 'Nombre del curso')  
<!--The title must be the name of the course in the DB-->

@section('header-content')
	<div class="row margin_bottom">
		<div class="col-md-1">
	    	<img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
	    </div>
	    <div class="col-md-11 name">
	    	Nombre del Módulo
	    </div>
	</div>
@endsection

@section('content')
    <div class="sidenav">
        <a href="#">Módulo 1</a>
        <a href="#">Módulo 2</a>
        <a href="#">Módulo 3</a>
        <a href="#">Módulo 4</a>
    </div>
	<div class="row margin_bottom">
    	<div class="col-md-12 section-title">
    		<h1>Quiz</h1>
    	</div>
    	<!-- If the 12 columns are used, should an extra row be created? -->
    </div>
    <div class="row margin_bottom">
    	<!-- 16:9 aspect ratio
<iframe width="560" height="315" src="https://www.youtube.com/embed/VDg3inODBxM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
         -->
        <div class="col-md-12 bg-secondary text-justify">
            <ol class="margin_top">
                <li>Mountain V Rally es una aplicación de Realidad Virtual</li>
            </ol>
            <form>
                <div class="form-group">
                    <label><input type="radio" name="quiz" id="2" value="2"> Falso</label>                   
                </div>
                <div class="form-group">
                    <label><input type="radio" name="quiz" id="1" value="1"> Verdadero</label>
                </div>
            </form>
            <div class="col-md-3 margin_bottom">
                <button class="btn btn-default"><h4>Siguiente</h4></button>
            </div>
        </div>
    </div>
    
@endsection