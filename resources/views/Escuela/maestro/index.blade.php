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
            @foreach($teacher as $maestro)
            <tbody>
                <td>{{$maestro->nombre_maestro}}</td>
                <td>{{$maestro->apellido_maestro}}</td>
                <td>{{$maestro->fecha_maestro}}</td>
                <td>{{$maestro->direccion}}</td>
                <td>{{$maestro->correo}}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop