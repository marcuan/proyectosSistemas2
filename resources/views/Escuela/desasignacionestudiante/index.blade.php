@extends('layouts.principal')
@section('content')
<div class="container col-xs-12">
    <h3 class="title" selected="selected">Estudiantes</h3>

    <a href="../estudiantes/{{$student->id}}" class="btn btn-danger">Regresar</a>
    
    {!!Form::open(['route'=>'desasignacionestudiantes.store', 'method'=>'POST'])!!}
        <h4><strong>Estudiante: </strong>  {{$student->apellido_estudiante}} , {{$student->nombre_estudiante}}</h4>
        {!!Form::text('idestudiante',$student->id,['class'=>'hidden', 'id'=>'idestudiante'])!!}
            <div class="table-responsive">
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
       
            <div class="">
               {!!Form::submit('Desasignar Cursos',['class'=>'btn btn-primary pull-right'])!!}
            </div>
    {!!form::close()!!}
 </div>
@stop