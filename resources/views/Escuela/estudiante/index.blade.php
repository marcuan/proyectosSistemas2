@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Estudiante creado exitosamente.
</div>
@endif
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Direccion</th>
                <th>Correo</th>
            </thead>
            @foreach($student as $estudiante)
            <tbody>
                <td>{{$estudiante->nombre_estudiante}}</td>
                <td>{{$estudiante->apellido_estudiante}}</td>
                <td>{{$estudiante->fecha_nacimiento}}</td>
                <td>{{$estudiante->direccion}}</td>
                <td>{{$estudiante->correo}}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop