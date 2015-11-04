@extends('layouts.principal')
@section('content')
{!!Form::open()!!}
	<div class="container col-xs-12">
    <h3 class="title" selected="selected">Estudiantes</h3>
    <?php $message=Session::get('message')?>
    @if($message == 'assign')
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Asignado. </strong> Curso(s) Asignado(s) exitosamente.
    </div>
    @endif
    @if($message == 'unassign')
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Desasignado. </strong> Curso(s) Desasignado(s) exitosamente.
    </div>
    @endif
    @if($message == 'no-assign')
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>No Asignado </strong> No se seleccionó ningún curso.
    </div>
    @endif
    <a href="../estudiantes" class="btn btn-danger">Regresar</a>
        <div class="info card">
            <div class="datos">
                <figure class="foto">
                    <img src="/profile-pictures/{{$student->path}}" alt="" class="img-circle img-datos">
                </figure>
                <div class="personales"> 
                    <h5><strong>Nombre: </strong>{{$student->nombre_estudiante}} {{$student->apellido_estudiante}}</h5>
                    <h5><strong>Fecha Nacimiento: </strong>{{$student->fecha_nacimiento}}</h5>
                    <h5><strong>Dirección: </strong>{{$student->direccion}}</h5>
                    <h5><strong>Correo: </strong>{{$student->correo}}</h5>
                    <h5><strong>Teléfono: </strong>{{$telefono->numero_telefono}}</h5>
                </div>
            </div>       
        </div>
        <h4>Cursos Asignados</h4>
        {!!link_to('asignacionestudiantes/'.$student->id, $title = 'Asignar Cursos', $attributes = ['class'=>'btn btn-success'], $secure = null);!!}
        {!!link_to('desasignacionestudiantes/'.$student->id, $title = 'Desasignar Cursos', $attributes = ['class'=>'btn btn-warning'], $secure = null);!!}
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalizacion</th>
                <th>Cupo Restante</th>
            </thead>
            @foreach($courses as $key => $curso)
            <tbody>
                <td>{{$curso->codigo}}</td>
                <td>{{$curso->nombre_curso}}</td>
                <td>{{$curso->descripcion}}</td>
                <td>{{$curso->fecha_inicio}}</td>
                <td>{{$curso->fecha_fin}}</td>
                <td>{{$curso->max_estudiantes - $curso->num_estudiantes}}</td>
            </tbody>
            @endforeach
        </table>
        </div>
    </div>
 {!!form::close()!!}

@stop