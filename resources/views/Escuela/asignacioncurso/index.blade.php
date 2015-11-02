@extends('layouts.principal')

<?php $message=Session::get('message')?>

@section('content')
<div class="container col-xs-12">
    <h3 class="title" selected="selected">Estudiantes</h3>
    <a href="#" class="btn btn-danger">Regresar</a>

    {!!Form::open(['route'=>'asignacioncursos.store', 'method'=>'POST'])!!}
        <h4><strong>Curso: </strong>  {{$curso->nombre_curso}} </h4>
        {!!Form::text('idcurso',$curso->id,['class'=>'hidden', 'id'=>'idcurso'])!!}
            <div class="table-responsive">            
            <table class="table table-hover">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Asignar</th>
                </thead>
                @foreach($students as $key => $estudiante)
                <tbody>
                    <td>{{$estudiante->codigo}}</td>
                    <td>{{$estudiante->nombre_estudiante}}</td>
                    <td>{{$estudiante->apellido_estudiante}}</td>
                    <td>{{$estudiante->direccion}}</td>
                    <td>{{$estudiante->correo}}</td>
                    <td>{!!Form::checkbox('check[]', $key);!!}
                        {!!Form::text('estudiante['.$key.']', $estudiante->id, ['class'=>'hidden', 'id'=>'idestudiante'])!!}</td>
                </tbody>
                @endforeach
               
            </table> 
        </div>
        <div class="">
               {!!Form::submit('Asignar Estudiantes',['class'=>'btn btn-primary pull-right'])!!}
        </div>
    {!!form::close()!!}
    
</div>
@stop