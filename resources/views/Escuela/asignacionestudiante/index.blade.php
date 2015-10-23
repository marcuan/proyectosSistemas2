@extends('layouts.principal')

<?php $message=Session::get('message')?>


@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Curso Asignado exitosamente.
</div>
@endif

@section('content')
    {!!Form::open([])!!}
        <div class="container col-xs-12">   
        <a href="../estudiantes" class="btn btn-danger">Regresar</a>
        <label for=""> Estudiante: {{$student->apellido_estudiante}} , {{$student->nombre_estudiante}}</label>
            <table class="table table-hover table-responsive">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalizacion</th>
                    <th>Maximo de Estudiantes</th>
                    <th>Asignar</th>
                </thead>
                @foreach($course as $key => $curso)
                <tbody>
                    <td>{{$curso->codigo}}</td>
                    <td>{{$curso->nombre_curso}}</td>
                    <td>{{$curso->descripcion}}</td>
                    <td>{{$curso->fecha_inicio}}</td>
                    <td>{{$curso->fecha_fin}}</td>
                    <td>{{$curso->max_estudiantes}}</td>
                    <td>{!!Form::checkbox('name', 'value');!!}</td>
                </tbody>
                @endforeach
            </table> 
        </div>
            <div class="form-btn">
               {!!Form::submit('Asignar Cursos',['class'=>'btn btn-primary'])!!}
            </div>
    {!!form::close()!!}
@stop