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
    <a href="/proyectosSistemas2/public/compra/create" class="btn btn-danger">Crear Compra</a>
    <div class="container col-xs-12">
        <table class="table">
            <thead>
                <th>Fecha</th>
                <th>Sub Total</th>
                <th>Descuento</th>
                <th>Total</th>
                <th>Proveedor</th>
            </thead>

            @foreach($compra as $compras)
            <tbody>
                <td>{{$compras->fecha}}</td>
                <td>{{$compras->subTotal}}</td>
                <td>{{$compras->descuento}}</td>
                <td>{{$compras->total}}</td>
                <td>{{$compras->proveedores_id}}</td>
                <td>{!!link_to_route('compra.edit', $title = 'Editar', $parameters = $compras->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach



        </table>
    </div>
@stop