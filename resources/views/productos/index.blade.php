@extends('layouts.principal')

<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Producto creado exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Producto editado exitosamente.
</div>
@endif

@section('content')
    
    <div class="container col-xs-12">
    <h3 class="title" selected="selected">Productos</h3>
    <a href="producto/create" class="btn btn-danger">Crear Producto</a>
        {!!Form::open(['rout'=>'producto.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
	
        <div class="form-group">
            {!!Form::select('type',['nombre'=>'Nombre','codigo'=>'Código'],null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::select('active',[0=>'Activos',1=>'Inhabilitados',2=>'Todos'],null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
        </div>
        <button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
    	{!!Form::close()!!}
        <table class="table">
            <thead>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Precio de Venta</th>
                <th>Existencia</th>
                <th>Comision</th>
                <th>Estado</th>
            </thead>
            @foreach($producto as $productos)
            <tbody>
            	<td>{{$productos->codigo}}</td>
                <td>{{$productos->nombreProducto}}</td>
                <td>{{$productos->detalleProducto}}</td>
                <td>{{$productos->precioVenta}}</td>
                <td>{{$productos->existencia}}</td>
                <td>{{$productos->comision}}</td>
                <td>{!!link_to_route('producto.edit', $title = 'Editar', $parameters = $productos->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop