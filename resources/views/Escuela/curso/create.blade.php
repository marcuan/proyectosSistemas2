@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'cursos.store', 'method'=>'POST'])!!}
        <h3>Cursos</h3>
        <div class="container">
            <div class="form-grup">
        		{!!Form::label('Codigo:')!!}
        		{!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Ingrese Codigo', 'required'])!!}
        	</div>
        	<div class="form-grup">
        		{!!Form::label('Curso:')!!}
        		{!!Form::text('nombre_curso',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre del Curso', 'required'])!!}
        	</div>
        	<div class="form-grup">
        		{!!Form::label('Descripcion:')!!}
        		{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese Descripcion', 'required'])!!}
        	</div>
            <div class="form-grup">
                {!!Form::label('Fecha de Inicio:')!!}
                {!!Form::Date('fecha_inicio',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Inicio','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Fecha de Finalización:')!!}
                {!!Form::Date('fecha_fin',null,['class'=>'form-control','placeholder'=>'Ingrese Fecha de Finalización','required'])!!}
            </div>
        	<div class="form-grup">
        		{!!Form::label('Maximo Estudiantes:')!!}
        		{!!Form::number('max_estudiantes',null,['class'=>'form-control','placeholder'=>'Ingrese Maximo de Estudiantes','required'])!!}
        	</div>
        	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
  
@stop
