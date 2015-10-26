@extends('layouts.principal')

<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Compra creada exitosamente.
</div>
@endif

@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Compra editada exitosamente.
</div>
@endif

@section('content')

    <a href="compra/create" class="btn btn-danger">Crear Compra</a>
    <div class="container">

        <table class="table">
            <thead>
                <th>Fecha</th>
                <th>Sub Total</th>
                <th>Descuento</th>
                <th>Total</th>
                <th>Proveedor</th>
            </thead>
            @foreach($compra as $compra)
                <tbody>
                    <td>{{$compra->fecha}}</td>
                    <td>{{$compra->subTotal}}</td>
                    <td>{{$compra->descuento}}</td>
                    <td>{{$compra->total}}</td>
                    <td>{{$compra->proveedores_id}}</td>
                    <td>{!!link_to_route('compra.show', $title = 'Ver Detalles', $parameters = $compra->id, $attributes = ['class'=>'btn btn-primary']);!!}
                    {!!link_to_route('compra.edit', $title = 'Editar', $parameters = $compra->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
                </tbody>
            @endforeach
        </table>
    </div>
@stop