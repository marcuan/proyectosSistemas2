@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado. </strong> Actividad creada exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Editado. </strong> Actividad editada exitosamente.
</div>
@endif

@section('content')
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Actividades</h3>
    <a href="/actividades/create" class="btn btn-danger">Crear Actividad</a> 
    {!!Form::open(['rout'=>'Actividades.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
        <div class="form-group">
            {!!Form::select('type',['actividad'=>'Actividad'],null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
        </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
    {!!Form::close()!!}
    <div></div>
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Capacidad</th>
                <th>Dirección</th>
                </thead>
            @foreach($activities as $Activity)
            <tbody>
                <td>{{$Activity->name}}</td>
                <td>{{$Activity->description}}</td>
                <td>{{$Activity->date_start}}</td>
                <td>{{$Activity->date_end}}</td>
                <td>{{$Activity->capacity}}</td>
                <td>{{$Activity->address}}</td>
                <td>{!!link_to_route('actividades.edit', $title = 'Editar', $parameters = $Activity->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
            {!!$activities->render()!!}
        </table>            
        {!!$activities->render()!!}
    </div>
@stop