@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado. </strong> Maestro creado exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Editado. </strong> Maestro editado exitosamente.
</div>
@endif
@if($message == 'assign')
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Asignado. </strong> Curso(s) Asignado(s) exitosamente.
</div>
@endif

@section('content')
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Maestros</h3>
    <div class="buscar">
        <a href="maestros/create" class="btn btn-danger">Crear Maestro</a> 
        <div class="col-lg-4">
            <div class="input-group">
                <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                  </span>
            </div>
        </div>
        <select name="" id="" class="btn btn-default select">
            <option value="1">Codigo</option>
            <option value="1">Nombre</option>
        </select>
    </div>
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Operación</th>
            </thead>
            @foreach($teacher as $maestro)
            <tbody>
                <td>{{$maestro->nombre_maestro}}</td>
                <td>{{$maestro->apellido_maestro}}</td>
                <td>{{$maestro->fecha_nacimiento}}</td>
                <td>{{$maestro->direccion}}</td>
                <td>{{$maestro->correo}}</td>
                <td>{!!link_to_route('maestros.edit', $title = 'Editar', $parameters = $maestro->id, $attributes = ['class'=>'btn btn-primary']);!!}
                {!!link_to('asignacionmaestros/'.$maestro->id, $title = 'Asignar Cursos', $attributes = ['class'=>'btn btn-success'], $secure = null);!!}
                {!!link_to_route('maestros.show', $title = 'Ver Información', $parameters = $maestro->id, $attributes = ['class'=>'btn btn-warning']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop