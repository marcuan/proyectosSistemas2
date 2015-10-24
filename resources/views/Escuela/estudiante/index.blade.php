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
@if($message == 'assign')
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Asignado. </strong> Curso(s) Asignado(s) exitosamente.
</div>
@endif

@section('content')
    
    <div class="container col-xs-12">
    <a href="estudiantes/create" class="btn btn-danger">Crear Estudiante</a>
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
                    {!!link_to_route('estudiantes.show', $title = 'Ver Cursos', $parameters = $estudiante->id, $attributes = ['class'=>'btn btn-warning']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop