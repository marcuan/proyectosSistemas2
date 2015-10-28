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
    <!-- Vista -> Cuadro para buscar platillo-->
    {!! Form::open(['href' => '../public/platillo', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del platillo']) !!}
    </div>
        <button type="submit" class="btn btn-primary">Buscar</button> 
    {!! Form::close() !!}
    <!-- .....  -->

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
                <td>{{$dato->temporada->nombre}}</td>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->precio}}</td>
                <td>{{$dato->descripcion}}</td>
                <td>{!!link_to_route('platillo.edit', $title = 'Editar', $parameters = $dato->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop