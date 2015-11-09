@extends('layouts.principal')

<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Operación Exitosa!</strong> Temporada creada.
</div>
@endif

@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Operación Exitosa!</strong> Temporada editada exitosamente.
</div>
@endif

@section('content')

{!! Form::open(['href' => '../temporada', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Temporada']) !!}
    </div>
        <button type="submit" class="btn btn-primary">Buscar</button> 
{!! Form::close() !!}
<!-- .....  -->

<a href="/temporada/create" class="btn btn-danger">Nueva Temporada</a>
    <div class="container-fluid">
        <table class="table table-condensed">
            <thead>
            <h3>Temporada</h3>
               	<th>Nombre</th>
		<th>Fecha Inicio</th>
		<th>Fecha Fin</th>
            </thead>
            @foreach($temporadas as $temporada)
            <tbody>
                <td>{{$temporada->nombre}}</td>
		<td>{{$temporada->fecha_inicio}}</td>
		<td>{{$temporada->fecha_fin}}</td>
  		<td>{!!link_to_route('temporada.edit', $title = 'Editar', $parameters = $temporada->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
		<td>{!!link_to_action('Restaurante\PlatilloController@mostrarplatillotemporada', $title = 'Menu', $parameters = $temporada->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
		  {!!$temporadas->render()!!}
        </table>
	   {!!$temporadas->render()!!}
    </div>

@stop
