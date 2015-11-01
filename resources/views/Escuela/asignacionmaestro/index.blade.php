@extends('layouts.principal')

<?php $message=Session::get('message')?>

@section('content')
<div class="container col-xs-12">   
    <h3 class="title" selected="selected">Maestros</h3>    
    <a href="/maestros/{{$teacher->id}}" class="btn btn-danger">Regresar</a>
        {!!Form::open(['rout'=>'maestros.asignacionmaestros','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
            <div class="form-group">
                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
            </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
        {!!Form::close()!!}
        {!!Form::open(['route'=>'asignacionmaestros.store', 'method'=>'POST'])!!}
            <h4><strong>Maestro: </strong> {{$teacher->apellido_maestro}} , {{$teacher->nombre_maestro}}</h4>
            {!!Form::text('idmaestro',$teacher->id,['class'=>'hidden', 'id'=>'idmaestro'])!!}
            <div>{!!$course->render()!!}</div>
            <div class="table-responsive">
                <table class="table table-hover ">
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
                {!!$course->render()!!}                
               {!!Form::submit('Asignar Cursos',['class'=>'btn btn-primary pull-right'])!!}
            </div>
    {!!form::close()!!}
</div>
@stop