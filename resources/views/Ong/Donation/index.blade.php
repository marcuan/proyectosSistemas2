@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado. </strong> Donación creada exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Editado. </strong> Donación editada exitosamente.
</div>
@endif

@section('content')
	<div class="container col-xs-12">
	<h3 class="title" selected="selected">Donaciones</h3>
	
	{!!Form::open(['rout'=>'Donaciones.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
		<div class="form-group">
			{!!Form::select('type',['created_at'=>'Fecha'],null,['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
		</div>
		<button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>    
	{!!Form::close()!!}
	<div></div>
		<table class="table">
			<thead>
				<th>Nombre del Donante</th>
				<th>Descripcion</th>
				<th>Monto</th>
				<th>Fecha</th>
				</thead>
			@foreach($donation as $Donacion)
			<tbody>
				@foreach($donor as $Donante)
					@if($Donante->id == $Donacion->id_donor)
						<td>{{$Donante->donor_name}}</td>
					@endif
				@endforeach
				<td>{{$Donacion->descripcion}}</td>
				<td>Q {{$Donacion->monto}}</td>
				<th>{{$Donacion->created_at}}</th>
			</tbody>
			@endforeach
		</table>
	</div>
@stop