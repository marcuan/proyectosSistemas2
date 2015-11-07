@extends('layouts.principal')
@section('content')
    <div class="container col-xs-12">
    {!!Form::open()!!}
    <h3 class="title" selected="selected">Cursos</h3>
    <a href="../cursos/{{$curso->id}}" class="btn btn-danger">Regresar</a>
        <div class="info card">
            <div class="datos">
                <span class="foto">
                    <img src="{{{ asset('images/usuario.png') }}}" alt="" class="img-circle">
                </span>
                <div class="personales"> 
                    <h5><strong>Codigo: </strong>{{$curso->codigo}}</h5>
                    <h5><strong>Nombre del Curso: </strong>{{$curso->nombre_curso}}</h5>
                    <h5><strong>Descripción: </strong>{{$curso->descripcion}}</h5>
                    <h5><strong>Máximo de Estudiantes: </strong>{{$curso->max_estudiantes}}</h5>
                    <h5><strong>Estudiantes Asignados: </strong>{{$curso->num_estudiantes}}</h5>
                </div>
            </div>       
        </div>
        <h4>Estudiantes Asignados al Curso</h4>
        <div class="table-responsive">
            <table class="table table-hover table-responsive">
                <thead>
                    <th></th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Telefono </th>                
                </thead>
                @foreach($estudiantes as $estudiante)
                <tbody>
                    <td><img src="/profile-pictures/{{$estudiante->path}}" alt="maestro" class="img-circle img-total"></td>
                    <td>{{$estudiante->nombre_estudiante}}</td>
                    <td>{{$estudiante->apellido_estudiante}}</td>
                    <td>{{$estudiante->correo}}</td>
                    <td>{{$estudiante->telefonos()->get()->first()->numero_telefono}}</td>
                </tbody>
                @endforeach
            </table>
        </div>
    
    {!!form::close()!!}
    </div>
@stop