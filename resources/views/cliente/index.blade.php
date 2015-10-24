@extends('layouts.principal')


<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Cliente creado.
</div>
@endif

@section('content')
<a href="../public/clientes/create" class="btn btn-danger">Nuevo Cliente</a>
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
            </tbody>
            @endforeach
        </table>
    </div>
@stop