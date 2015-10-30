@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado. </strong> Donación creada exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Editado. </strong> Donación editada exitosamente.
</div>
@endif

@section('content')
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Donaciones</h3>
    <a href="/donaciones/create" class="btn btn-danger">Crear Donación</a> 
    {!!Form::open(['rout'=>'Donaciones.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
        <div class="form-group">
            {!!Form::select('type',['donacion'=>'Donación','codigo'=>'Código'],null,['class'=>'form-control'])!!}
        </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
    {!!Form::close()!!}
    <div></div>
        <table class="table">
            <thead>
                <th>Monto</th>
                <th>Descripcion</th>
                </thead>
            @foreach($donation as $Donacion)
            <tbody>
                <td>{{$Donacion->monto}}</td>
                <td>{{$Donacion->descripcion}}</td>
                <td>{!!link_to_route('donaciones.edit', $title = 'Editar', $parameters = $Donacion->id, $attributes = ['class'=>'btn btn-primary']);!!}
            </tbody>
            @endforeach
            {!!$donation->render()!!}
        </table>
            {!!$donation->render()!!}        
    </div>
@stop