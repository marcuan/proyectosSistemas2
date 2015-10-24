@extends('layouts.principal')
@section('content')
    <div class="container">
    <a href="../maestros" class="btn btn-danger">Regresar</a>
        <table class="table">
            <thead>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalizacion</th>
                <th>Maximo de Estudiantes</th>
            </thead>
            @foreach($courses as $curso)
            <tbody>
                <td>{{$curso->codigo}}</td>
                <td>{{$curso->nombre_curso}}</td>
                <td>{{$curso->descripcion}}</td>
                <td>{{$curso->fecha_inicio}}</td>
                <td>{{$curso->fecha_fin}}</td>
                <td>{{$curso->max_estudiantes}}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop