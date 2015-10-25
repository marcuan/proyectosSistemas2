@extends('layouts.principal')


<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Operación Exitosa!</strong> Cliente creado.
</div>
@endif


@if($message == 'edit')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Operación Exitosa!</strong> Cliente Modificado/Actualizado.
</div>
@endif



@section('content')
<!--
Vista -> Cuadro para buscar clientes
-->
{!! Form::open(['href' => '../public/clientes', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del cliente']) !!}
    </div>
        <button type="submit" class="btn btn-primary">Buscar</button> 
{!! Form::close() !!}

<a href="/clientes/create" class="btn btn-danger">Nuevo Cliente</a>
    <div class="container">
        <table class="table">
            <thead>
            <h3>Clientes</h3>
                <th>Nombre</th>
                <th>Nit</th>
                <th>Telefono</th>
                <th>Dirección</th>
            </thead>
            @foreach($customer as $cliente)
            <tbody>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->nit}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->dirección}}</td>
                <td>{!!link_to_route('clientes.edit', $title = 'Editar', $parameters = $cliente->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop