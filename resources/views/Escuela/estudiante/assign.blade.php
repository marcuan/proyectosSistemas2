@extends('layouts.principal')
@section('content')
{!!Form::model(['method'=>'POST'])!!}
	<div class="container">
        <table class="table">
            <thead>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalizacion</th>
                <th>Maximo de Estudiantes</th>
                <th>Operación</th>
            </thead>
            @foreach($course as $key => $curso)
            <tbody>
                <td>{{$curso->codigo}}</td>
                <td>{{$curso->nombre_curso}}</td>
                <td>{{$curso->descripcion}}</td>
                <td>{{$curso->fecha_inicio}}</td>
                <td>{{$curso->fecha_fin}}</td>
                <td>{{$curso->max_estudiantes}}</td>
                <td>{!!Form::checkbox('Asignar',['class'=>'btn btn-primary'])!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
 {!!form::close()!!}

@stop