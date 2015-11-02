@extends('layouts.principal')

@section('content')
    <div class="container col-xs-12">
        <h3 class="title" selected="selected">Cursos</h3>
        <?php $message=Session::get('message')?>
        @if($message == 'store')
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Creado.</strong> Curso creado exitosamente.
        </div>
        @endif
        @if($message == 'edit')
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Editado.</strong> Curso editado exitosamente.
        </div>
        @endif
        @if($message == 'erase')
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Inhabilitado.</strong> Curso inhabilitado exitosamente.
        </div>
        @endif

        <a href="/cursos/create" class="btn btn-danger">Crear Curso</a>
        <a href="reposiCurso" class="btn btn-danger">Descargar Reporte</a>
        {!!Form::open(['rout'=>'estudiantes.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
        <div class="form-group">
            {!!Form::select('type',['nombre'=>'Nombre','codigo'=>'Código','fecha'=>'Fecha'],null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::select('active',['activos'=>'Activos','inhabilitados'=>'Inhabilitados','todos'=>'Todos'],null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
        </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
        <br></br>
        <div class="form-group">
            {!!Form::date('init_date',null,['class'=>'form-control','placeholder'=>''])!!}            
        </div>
        <div class="form-group">
            {!!Form::date('finish_date',null,['class'=>'form-control','placeholder'=>''])!!}            
        </div>
    {!!Form::close()!!}
    <div>{!!$course->render()!!}</div>
    <div class="table-responsive col-xs-12"> 
        <table class="table table-hover">
            <thead>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Maximo de Estudiantes</th>
                <th>Operación</th>
            </thead>
            @foreach($course as $curso)
            <tbody>
                <td>{{$curso->codigo}}</td>
                <td>{{$curso->nombre_curso}}</td>
                <td>{{$curso->descripcion}}</td>
                <td>{{$curso->max_estudiantes}}</td>
                <td>{!!link_to_route('cursos.edit', $title = 'Editar', $parameters = $curso->id, $attributes = ['class'=>'btn btn-primary']);!!}
                    {!!link_to_route('cursos.show', $title = 'Información', $parameters = $curso->id, $attributes = ['class'=>'btn btn-success']);!!}</td>
            </tbody>
            @endforeach
            
        </table>
        </div>
        <div>
            {!!$course->render()!!}
        </div>
    </div>

@stop