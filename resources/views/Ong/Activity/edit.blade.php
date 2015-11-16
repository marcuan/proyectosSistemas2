@extends('layouts.principal')
@section('content')
	{!!Form::model($activity,['route'=>['actividades.update', $activity->id], 'method'=>'PUT'])!!}
		
	   <div class="container col-xs-12">
		<h3 class="title" selected="selected">Actividades</h3>

			<div class="form-grup">
				{!!Form::label('Nombre de la actividad:')!!}
				{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese Monto de Donación','required'])!!}
			</div><br>
			<div class="form-grup">
				{!!Form::label('Descripción:')!!}
				{!!Form::text('description',null,['class'=>'form-control','placeholder'=>'Ingrese Descripción de Donación','required'])!!}
			</div><br>
			<div class="form-grup">
				{!!Form::label('Dirección:')!!}
				{!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingrese ID del Donador','required'])!!}
			</div><br>
			<div class="form-grup">
				{!!Form::label('Capacidad:')!!}
				{!!Form::text('capacity',null,['class'=>'form-control','placeholder'=>'Ingrese ID del Donador','required'])!!}
			</div><br>
			<div class="form-grup">
				{!!Form::label('Fecha de Inicio:')!!}
				{!!Form::text('date_start',null,['class'=>'form-control','placeholder'=>'aaaa-mm-dd hh:mm:ss','pattern'=>'[0-9]{4}[-][0-1][0-9][-][0-3][0-9][ ][0-2][0-9][:][0-5][0-9]|[0-9]{4}[-][0-1][0-9][-][0-3][0-9][ ][0-2][0-9][:][0-5][0-9][:][0-5][0-9]','required'])!!}
			</div><br>
			<div class="form-grup">
				{!!Form::label('Fecha de Fin:')!!}
				{!!Form::text('date_end',null,['class'=>'form-control','placeholder'=>'aaaa-mm-dd hh:mm:ss','pattern'=>'[0-9]{4}[-][0-1][0-9][-][0-3][0-9][ ][0-2][0-9][:][0-5][0-9]|[0-9]{4}[-][0-1][0-9][-][0-3][0-9][ ][0-2][0-9][:][0-5][0-9][:][0-5][0-9]','required'])!!}
			</div><br>
			<div class="form-btn">
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		</div>
	{!!form::close()!!}
	{!!Form::open(['route'=>['actividades.destroy', $activity->id], 'method'=>'DELETE'])!!}
	{!!form::close()!!}
	</div>
@stop