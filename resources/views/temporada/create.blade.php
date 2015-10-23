@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'temporada.store', 'method'=>'POST'])!!}
        <h3>Cursos</h3>
        <div class="container">
      
        	<div class="form-grup">
        		{!!Form::label('Nombre:')!!}
        		{!!Form::text('nombre_temporada',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de la temporada', 'required'])!!}
        	</div>
      
        	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
  
@stop
