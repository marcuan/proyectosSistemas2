@extends('layouts.principal')
<?php $message=Session::get('message')?>
@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Operación Exitosa!</strong> Cliente creado.
</div>
@endif
@section('content')
<div class="container col-xs-12">
    <h3 class="title" selected="selected">Generar Venta</h3>
    {!! Form::open(['route' => 'venta.create', 'method' => 'GET', 'class' => 'navbar-form navbar-default pull-right' , 'role' => 'search']) !!}
    <div align="center">
        <br>
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nit Cliente', 'autofocus', 'style'=>'text-align:center']) !!}
        <br>
        <br>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Buscar Cliente</button>
        <br>
    </div>
    {!! Form::close() !!}
    <div class="container-fluid">
        <table class="table table-condensed">
            <thead>
            <h3>Clientes Existentes</h3>
                <th>Nombre</th>
                <th>Nit</th>
                <th>Dirección</th>
            </thead>
            @foreach($clientes as $cliente)
            <tbody>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->nit}}</td>
                <td>{{$cliente->dirección}}</td>
                <td>{!!link_to_route('venta.show', $title = 'Realizar Venta', $parameters = $cliente->id, $attributes = ['class'=>'btn btn-success']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
    <a href="/clientes/create" c class="btn btn-danger btn-block btn-lg">Nuevo Cliente</a>
</div>
@stop