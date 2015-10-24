@extends('layouts.principal')
@section('content')
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Maestros</h3>
    <a href="../maestros" class="btn btn-danger">Regresar</a>
    <div class="info card">
        <div class="datos">
            <span class="foto">
                <img src="{{{ asset('images/usuario.png') }}}" alt="" class="img-circle">
            </span>
            <div class="personales"> 
                <h5><strong>Nombre: </strong></h5>
                <h5><strong>Fecha Nacimiento: </strong></h5>
                <h5><strong>Dirección: </strong></h5>
                <h5><strong>Correo: </strong></h5>
                <h5><strong>Teléfono: </strong></h5>
            </div>
        </div>       
    </div>
    <h4>Cursos Asignados</h4>
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