@extends('layouts.instructor-app')

@section('title', 'Alta de curso')  
<!--The title must be the name of the course in the DB-->

@section('header-content')
	<div class="row margin_bottom">
		<div class="col-md-1">
	    	<img class="avatar-pic" src="{{ asset('imgs/profile-picture-placeholder.png') }}">
	    </div>
	    <div class="col-md-11 name">
	    	Alta de curso
	    </div>
	</div>
@endsection

@section('content')
	<div class="row margin_bottom">
    	<div class="col-md-12 section-title">
    		<h1>Agrega los datos siguientes</h1>
    	</div>
    	<!-- If the 12 columns are used, should an extra row be created? -->
    	<div class="col-md-12 text-justify">
    		<form>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre del curso">                   
                </div>
                <div class="tab-content">
                    <div id="land" class="tab-pane fade in active">
                        <h2>Agrega un módulo</h2>
                        <div class="col-md-1">
                            <a data-toggle="tab" href="#trainer" class="btn btn-default btn-block margin_bottom">
                                <span class="glyphicon glyphicon-plus btn-icon"></span>
                            </a>
                        </div>
                    </div>
                    <div id="trainer" class="tab-pane fade">
                        <input type="text" class="form-control margin_bottom" placeholder="Nombre del módulo"> 
                        <input type="text" class="form-control margin_bottom" placeholder="URL del video"> 
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-2 col-md-offset-10">
                        <button class="btn btn-success btn-block">Guardar</button>
                    </div>
                </div>
            </form>
    	</div>
    </div>
    
@endsection