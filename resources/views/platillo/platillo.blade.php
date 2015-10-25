@extends('layouts.principal')

<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado</strong> Se ha creado nuevo Platillo exitosamente.
</div>
@endif

@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> platillo editado exitosamente.
</div>
@endif

@section('content')
	<a href="/platillo/create" class="btn btn-danger">Crear platillo</a>
    <div class="container-fluid">
        <table class="table table-condensed">
            <thead>
                <th>Temporada</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
            </thead>
            @foreach($platillo as $dato)
            <tbody>
                <td>{{$dato->temporada_id}}</td>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->precio}}</td>
                <td>{{$dato->descripcion}}</td>
                <td>{!!link_to_route('platillo.edit', $title = 'Editar', $parameters = $dato->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop