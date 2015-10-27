@extends('layouts.principal')
@section('content')
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Maestros</h3>
    <a href="../maestros" class="btn btn-danger">Regresar</a>
    <div class="info card">
        <div class="datos">
            <span class="foto">
                <img src="photos/{{$teacher->path}}" alt="" class="img-circle">
            </span>
            <div class="personales"> 
                <h5><strong>Nombre: </strong>{{$teacher->nombre_maestro}}  {{$teacher->apellido_maestro}}</h5>
                <h5><strong>Fecha Nacimiento: </strong>{{$teacher->fecha_nacimiento}}</h5>
                <h5><strong>Dirección: </strong>{{$teacher->direccion}}</h5>
                <h5><strong>Correo: </strong>{{$teacher->correo}}</h5>
                <h5><strong>Teléfono: </strong>{{$telefono->numero_telefono}}</h5>
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