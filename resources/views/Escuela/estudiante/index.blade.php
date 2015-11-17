@extends('layouts.principal')
@section('content')
    
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Estudiantes</h3>
    <?php $message=Session::get('message')?>
    @if($message == 'store')
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Creado. </strong> Estudiante creado exitosamente.
    </div>
    @endif
    @if($message == 'edit')
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Editado. </strong> Estudiante editado exitosamente.
    </div>
    @endif
    @if($message == 'erase')
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Inhabilitado.</strong> Estudiante inhabilitado exitosamente.
    </div>
    @endif
    <a href="/estudiantes/create" class="btn btn-danger">Crear Estudiante</a>
    
    <a href="reposiEstu" class="btn btn-danger">Descargar Reporte</a>

    {!!Form::open(['rout'=>'estudiantes.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
        <div class="form-group">
            {!!Form::select('type',['nombre'=>'Nombre','codigo'=>'Código'],null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::select('active',['activos'=>'Activos','inhabilitados'=>'Inhabilitados','todos'=>'Todos'],null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
        </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
    {!!Form::close()!!}
    <div>{!!$student->render()!!}</div>
    <div class="table-responsive col-xs-12">
        <table class="table table-hover">
            <thead>
                <th></th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Operación</th>
            </thead>
            @foreach($student as $estudiante)
            <tbody>
                <td><img src="/profile-pictures/{{$estudiante->path}}" alt="maestro" class="img-circle img-total"></td>
                <td>{{$estudiante->codigo}}</td>
                <td>{{$estudiante->nombre_estudiante}}</td>
                <td>{{$estudiante->apellido_estudiante}}</td>
                <td>{{$estudiante->correo}}</td>
                <td>{{$estudiante->telefonos()->get()->first()->numero_telefono}}</td>
                <td>
                @if (!$estudiante->trashed())
                    {!!link_to_route('estudiantes.edit', $title = 'Editar', $parameters = $estudiante->id, $attributes = ['class'=>'btn btn-primary']);!!}
                    {!!link_to_route('estudiantes.show', $title = 'Información', $parameters = $estudiante->id, $attributes = ['class'=>'btn btn-success']);!!}</td>
                @endif    
            </tbody>
            @endforeach
           
        </table>
        
    </div>
        <div>{!!$student->render()!!}</div>
    </div>
@stop