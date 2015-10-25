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
@if($message == 'erase')
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Inhabilitado.</strong> Maestro inhabilitado exitosamente.
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
    <a href="maestros/create" class="btn btn-danger">Crear Maestro</a> 
    {!!Form::open(['rout'=>'maestros.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
        <div class="form-group">
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese'])!!}            
        </div>
        <div class="form-group">
            {!!Form::select('type',['nombre'=>'Nombre','codigo'=>'Código'],null,['class'=>'form-control'])!!}
        </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
    {!!Form::close()!!}
    <div></div>
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
            {!!$teacher->render()!!}
        </table>
            {!!$teacher->render()!!}        
    </div>
@stop