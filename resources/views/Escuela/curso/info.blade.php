@extends('layouts.principal')
@section('content')
    {!!Form::open()!!}
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Cursos</h3>
    <?php $message=Session::get('message')?>
    @if($message == 'assign')
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Creado.</strong> Horario creado exitosamente.
    </div>
    @endif
    @if($message == 'edit')
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Editado.</strong> Horario editado exitosamente.
    </div>
    @endif
    @if($message == 'erase')
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Borrado.</strong> Horario borrado exitosamente.
    </div>
    @endif
    <a href="/cursos" class="btn btn-danger">Regresar</a>
        <div class="info card">
            <div class="datos">
                <figure class="foto">
                    <img src="{{{ asset('images/cursos.png') }}}" alt="" class="img-datos">
                </figure>
                <div class="personales"> 
                    <h5><strong>Codigo: </strong>{{$curso->codigo}}</h5>
                    <h5><strong>Nombre del Curso: </strong>{{$curso->nombre_curso}}</h5>
                    <h5><strong>Descripción: </strong>{{$curso->descripcion}}</h5>
                    <h5><strong>Fecha de Inicio: </strong>{{$curso->fecha_inicio}}</h5>
                    <h5><strong>Fecha de Finalización: </strong>{{$curso->fecha_fin}}</h5>
                    <h5><strong>Máximo de Estudiantes: </strong>{{$curso->max_estudiantes}}</h5>
                    <h5><strong>Estudiantes Asignados: </strong>{{$curso->num_estudiantes}}</h5>
                    <h5><strong>Maestros: </strong><br> 
                    @foreach($maestros as $maestro) 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$maestro->nombre_maestro}} , {{$maestro->apellido_maestro}}<br> 
                    @endforeach</h5>
                </div>
            </div>       
        </div>
        <h4>Horarios del Curso</h4>
        {!!link_to('/horarios/'.$curso->id, $title = 'Añadir Horario', $attributes = ['class'=>'btn btn-primary'], $secure = null);!!}
        {!!link_to('/asignacioncursoestudiantes/'.$curso->id, $title = 'Asignar Estudiantes', $attributes = ['class'=>'btn btn-success'], $secure = null);!!}
        {!!link_to('cursoestudiantes/'.$curso->id, $title = 'Ver Estudiantes', $attributes = ['class'=>'btn btn-warning'], $secure = null);!!}
        <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead>
                <th>Día</th>
                <th>Hora de Inicio</th>
                <th>Hora de Finalización</th>
                <th>Salón </th>
                <th>Operación </th>   
            </thead>
            @foreach($horarios as $horario)
            <tbody>
                <td>{{$horario->dia}}</td>
                <td><?php echo date('g:i a', strtotime($horario->hora_inicio)); ?></td>
                <td><?php echo date('g:i a', strtotime($horario->hora_fin)); ?></td>
                <td>{{$horario->salon}}</td>
                <td>{!!link_to_route('horarios.edit', $title = 'Editar', $parameters = $horario->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
        </table>
        </div>
    </div>
    {!!form::close()!!}
@stop