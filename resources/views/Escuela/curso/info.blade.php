@extends('layouts.principal')
@section('content')
    {!!Form::open()!!}
        <div class="container col-xs-12">
    <h3 class="title" selected="selected">Cursos</h3>
    <a href="../cursos" class="btn btn-danger">Regresar</a>
        <div class="info card">
            <div class="datos">
                <span class="foto">
                    <img src="{{{ asset('images/usuario.png') }}}" alt="" class="img-circle">
                </span>
                <div class="personales"> 
                    <h5><strong>Codigo: </strong>{{$curso->codigo}}</h5>
                    <h5><strong>Nombre del Curso: </strong>{{$curso->nombre_curso}}</h5>
                    <h5><strong>Descripción: </strong>{{$curso->descripcion}}</h5>
                    <h5><strong>Fecha de Inicio: </strong>{{$curso->fecha_inicio}}</h5>
                    <h5><strong>Fecha de Finalización: </strong>{{$curso->fecha_fin}}</h5>
                    <h5><strong>Máximo de Estudiantes: </strong>{{$curso->max_estudiantes}}</h5>
                    <h5><strong>Estudiantes Asignados: </strong>{{$curso->num_estudiantes}}</h5>
                </div>
            </div>       
        </div>
        <h4>Horarios del Curso</h4>
        {!!link_to('/agregarhorario/'.$curso->id, $title = 'Añadir Horario', $attributes = ['class'=>'btn btn-primary'], $secure = null);!!}
        <table class="table">
            <thead>
                <th>Día</th>
                <th>Hora de Inicio</th>
                <th>Hora de Finalización</th>
                <th>Salón </th>                
            </thead>
            @foreach($horario as $horario)
            <tbody>
                <td>{{$horario->dia}}</td>
                <td>{{$horario->hora_inicio}}</td>
                <td>{{$horario->hora_fin}}</td>
                <td>{{$horario->salon}}</td>
            </tbody>
            @endforeach
        </table>
    </div>
    {!!form::close()!!}
@stop