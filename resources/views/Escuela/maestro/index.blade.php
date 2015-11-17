@extends('layouts.principal')
@section('content')

    <div class="container col-xs-12">
        <h3 class="title" selected="selected">Maestros</h3>
        <?php $message=Session::get('message')?>
        @if($message == 'store')
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Creado. </strong> Maestro creado exitosamente.
        </div>
        @endif
        @if($message == 'edit')
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Editado. </strong> Maestro editado exitosamente.
        </div>
        @endif
        @if($message == 'erase')
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Inhabilitado.</strong> Maestro inhabilitado exitosamente.
        </div>
        @endif
        <a href="/maestros/create" class="btn btn-danger">Crear Maestro</a> 
        <a href="reposiMaestro" class="btn btn-danger">Descargar Reporte</a>
        {!!Form::open(['rout'=>'maestros.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
            <div class="form-group">
                {!!Form::select('active',['activos'=>'Activos','inhabilitados'=>'Inhabilitados','todos'=>'Todos'],null,['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::select('type',['nombre'=>'Nombre','codigo'=>'Código'],null,['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
            </div>
            <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
        {!!Form::close()!!}
        <div>{!!$teacher->render()!!}</div>
        <div class="table-responsive col-xs-12 ">
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
                @foreach($teacher as $maestro)
                <tbody>
                    <td><img src="/profile-pictures/{{$maestro->path}}" alt="maestro" class="img-circle img-total"></td>
                    <td>{{$maestro->codigo}}</td>
                    <td>{{$maestro->nombre_maestro}}</td>
                    <td>{{$maestro->apellido_maestro}}</td>
                    <td>{{$maestro->correo}}</td>
                    <td>{{$maestro->telefonos()->get()->first()->numero_telefono}}</td>
                    <td>
                    @if (!$maestro->trashed())
                    {!!link_to_route('maestros.edit', $title = 'Editar', $parameters = $maestro->id, $attributes = ['class'=>'btn btn-primary']);!!}
                    {!!link_to_route('maestros.show', $title = 'Información', $parameters = $maestro->id, $attributes = ['class'=>'btn btn-success']);!!}</td>
                    @endif
                </tbody>
                @endforeach
                
            </table>
           
        </div>  
        <div>{!!$teacher->render()!!} </div> 
      </div> 
@stop