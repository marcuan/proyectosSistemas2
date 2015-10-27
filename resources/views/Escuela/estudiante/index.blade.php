@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado. </strong> Estudiante creado exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Editado. </strong> Estudiante editado exitosamente.
</div>
@endif
@if($message == 'erase')
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Inhabilitado.</strong> Estudiante inhabilitado exitosamente.
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
    <h3 class="title" selected="selected">Estudiantes</h3>
    <a href="/estudiantes/create" class="btn btn-danger">Crear Estudiante</a>
    
    {!!Form::open(['rout'=>'estudiantes.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
        <div class="form-group">
            {!!Form::select('type',['nombre'=>'Nombre','codigo'=>'Código'],null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::select('active',['activos'=>'Activos','inhabilitados'=>'Inhabilitados','todos'=>'Todos'],null,['class'=>'form-control'])!!}
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
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Operación</th>
            </thead>
            @foreach($student as $estudiante)
            <tbody>
                <td>{{$estudiante->nombre_estudiante}}</td>
                <td>{{$estudiante->apellido_estudiante}}</td>
                <td>{{$estudiante->fecha_nacimiento}}</td>
                <td>{{$estudiante->direccion}}</td>
                <td>{{$estudiante->correo}}</td>
                <td>{!!link_to_route('estudiantes.edit', $title = 'Editar', $parameters = $estudiante->id, $attributes = ['class'=>'btn btn-primary']);!!}
                    {!!link_to('asignacionestudiantes/'.$estudiante->id, $title = 'Asignar Cursos', $attributes = ['class'=>'btn btn-success'], $secure = null);!!}
                    {!!link_to_route('estudiantes.show', $title = 'Ver Información', $parameters = $estudiante->id, $attributes = ['class'=>'btn btn-warning']);!!}</td>
            </tbody>
            @endforeach
            {!!$student->render()!!}
        </table>
        {!!$student->render()!!}

    </div>
@stop