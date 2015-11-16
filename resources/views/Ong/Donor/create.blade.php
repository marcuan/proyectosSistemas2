@extends('layouts.principal')
@section('content')
	{!!Form::open(['route'=>'donantes.store', 'method'=>'POST'])!!}
	   
		<div class="container col-xs-12">
		<h3 class="title" selected="selected">Donantes</h3>

			<div class="form-grup">
				{!!Form::label('Nombre:')!!}
				{!!Form::text('donor_name',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre Donante','required'])!!}
			</div><br>
			<div class="form-grup">
				{!!Form::label('Apellido:')!!}
				{!!Form::text('donor_lastname',null,['class'=>'form-control','placeholder'=>'Ingrese Apellido Donante','required'])!!}
			</div><br>
			<div class="form-grup">
				{!!Form::label('Dirección:')!!}
				{!!Form::text('adress',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion','required'])!!}
			</div><br>
			<div class="form-grup">
				{!!Form::label('Correo:')!!}
				{!!Form::email('e_mail',null,['class'=>'form-control','placeholder'=>'Ingrese Correo','required'])!!}
			</div><br>
			<div class="form-btn">
			{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
			</div>
		
			 {!!form::close()!!}
	 </div>

@stop
