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
    <a href="producto/create" class="btn btn-danger">Crear Producto</a>
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Precio de Venta</th>
                <th>Existencia</th>
                <th>Comision</th>
            </thead>
            @foreach($producto as $productos)
            <tbody>
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