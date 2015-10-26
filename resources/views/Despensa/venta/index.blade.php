@extends('layouts.principal')

<?php $message=Session::get('message')?>


@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Venta realizada exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Venta modificada exitosamente.
</div>
@endif

@section('content')
    <div class="container col-xs-12">
    <a href="venta/create" class="btn btn-danger">Realizar Venta</a>
    
        <table class="table table-hover table-responsive">
            <thead>
                <th>id</th>
                <th>idCliente</th>
                <th>Nombre</th>
            </thead>
            @foreach($venta as $venta)
            <tbody>
                <td>{{$venta->idVenta}}</td>
                <td>{{$venta->clientes_id}}</td>
                <td>{!!link_to_route('venta.edit', $title =                       'Editar', $parameters = $venta->id, $attributes=['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop