@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Maestro creado exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Maestro editado exitosamente.
</div>
@endif

@section('content')
    <a href="/proyectosSistemas2/public/maestros/create" class="btn btn-danger">Crear Maestro</a>
    <div class="container">
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
                    {!!link_to_route('maestros.show', $title = 'Asignar Cursos', $parameters = $maestro->id, $attributes = ['class'=>'btn btn-success']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop