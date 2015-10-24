@extends('layouts.principal')

<?php $message=Session::get('message')?>

@section('content')
    {!!Form::open(['route'=>'asignacionmaestros.store', 'method'=>'POST'])!!}
        <div class="container col-xs-12">   
        <a href="../maestros" class="btn btn-danger">Regresar</a>
        <label for=""> Maestro: {{$teacher->apellido_maestro}} , {{$teacher->nombre_maestro}}</label>
        {!!Form::text('idmaestro',$teacher->id,['class'=>'hidden', 'id'=>'idmaestro'])!!}
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
                    <td>{!!Form::checkbox('check[]', $key);!!}
                        {!!Form::text('curso['.$key.']', $curso->id, ['class'=>'hidden', 'id'=>'idcurso'])!!}</td>
                </tbody>
                @endforeach
            </table> 
        </div>
        <div class="form-btn">
               {!!Form::submit('Asignar Cursos',['class'=>'btn btn-primary'])!!}
            </div>
    {!!form::close()!!}
@stop