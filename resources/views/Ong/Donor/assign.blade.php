@extends('layouts.principal')

@section('content')
{!!Form::open()!!}
	<div class="container col-xs-12">
	<h3 class="title" selected="selected">Donadores</h3>
	<a href="/donantes" class="btn btn-danger">Regresar</a>
		<div class="info card">
			<div class="datos">
				<div class="personales"> 
					<h5><strong>Nombre: </strong>{{$donor->donor_name}} {{$donor->donor_lastname}}</h5>
					<h5><strong>Dirección: </strong>{{$donor->adress}}</h5>
					<h5><strong>Correo: </strong>{{$donor->e_mail}}</h5>
				</div>
			</div>       
		</div>
		<h4>Donaciones Hechas</h4>
		<table class="table table-hover table-responsive">
			<thead>
				<th>Descripción</th>
				<th>Monto</th>
				<td>Fecha</td>
			</thead>
			@foreach($donations as $key => $donation)
				@if ($donation->id_donor == $donor->id)
					<tbody>
						<td>{{$donation->descripcion}}</td>
						<td>Q {{$donation->monto}}</td>
						<td>{{$donation->created_at}}</td>
					</tbody>
				@endif
			@endforeach
		</table>
	</div>
 {!!form::close()!!}

@stop