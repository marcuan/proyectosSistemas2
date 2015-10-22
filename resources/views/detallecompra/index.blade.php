@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> DetalleCompra creado exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> DetalleCompra editado exitosamente.
</div>
@endif

@section('content')
    <a href="/proyectosSistemas2/public/detallecompra/create" class="btn btn-danger">Crear DetalleCompra</a>
    <div class="container">
        <table class="table">
            <thead>
                <th>Materia prima</th>
                <th>Id compra</th>
                <th>Cantidad</th>
                <th>Costo</th>
            </thead>
            @foreach($DetalleCompra as $DetalleCompra)
            <tbody>
                <td>{{$DetalleCompra->materia_prima_id}}</td>
                <td>{{$DetalleCompra->compras_id}}</td>
                <td>{{$DetalleCompra->cantidad}}</td>
                <td>{{$DetalleCompra->costo}}</td>
                <td>{!!link_to_route('detallecompra.edit', $title = 'Editar', $parameters = $DetalleCompra->id, $attributes = ['class'=>'btn btn-primary']);!!}
            </tbody>
            @endforeach
        </table>
    </div>
@stop