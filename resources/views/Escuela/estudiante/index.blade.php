@extends('layouts.principal')
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