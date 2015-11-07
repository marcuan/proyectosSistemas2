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
    <a href="/detallecompra/create" class="btn btn-danger">Crear DetalleCompra</a>
    <div class="container">
        <table class="table">
            <thead>
                <th>Producto</th>
                <th>Id consignacion</th>
               
            </thead>
         @foreach($DetalleConsignacion as $DetalleConsignacions)
		
			{{-- */$productoComp = RED\Despensa\Producto::find($DetalleConsignacions->productoid)/* --}}
            <tbody>
				<td>{{$productoComp->nombreProducto}}</td>
                <td>{{$DetalleConsignacions->productoid}}</td>
                <td>{{$DetalleConsignacions->compras_id}}</td>
                <td>{!!link_to_route('detalleconsignacion.edit', $title = 'Editar', $parameters = $DetalleCompra->id, $attributes = ['class'=>'btn btn-primary']);!!}
            </tbody>
            @endforeach
        </table>
    </div>
@stop