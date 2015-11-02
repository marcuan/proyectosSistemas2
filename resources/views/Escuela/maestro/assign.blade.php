@extends('layouts.principal')
@section('content')
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Maestros</h3>
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
    <a href="/maestros" class="btn btn-danger">Regresar</a>
    <div class="info card">
        <div class="datos">
            <figure class="foto">
                <img src="/profile-pictures/{{$teacher->path}}" alt="" class="img-circle img-datos">
            </figure>
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
    {!!link_to('asignacionmaestros/'.$teacher->id, $title = 'Asignar Cursos', $attributes = ['class'=>'btn btn-success'], $secure = null);!!}
    {!!link_to('desasignacionmaestros/'.$teacher->id, $title = 'Desasignar Cursos', $attributes = ['class'=>'btn btn-warning'], $secure = null);!!}
       <div class="table-responsive"> 
        <table class="table table-hover">
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
    </div>
@stop