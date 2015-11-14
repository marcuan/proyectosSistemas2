@extends('layouts.principal')
@section('content')
<h3 class="title" selected="selected">Ventas</h3>
{!! Form::open(['route' => 'venta.create', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}

    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nit del Cliente']) !!}
    </div>
        <button type="submit" class="btn btn-primary">Buscar</button> 
{!! Form::close() !!}

{!! Form::open(['route' => 'venta.create', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Cliente']) !!}
    </div>
        <button type="submit" class="btn btn-primary">Buscar</button> 
{!! Form::close() !!}

    <div class="container-fluid">
        <a href="/clientes/create" class="btn btn-danger">Nuevo Cliente</a>
        <table class="table table-condensed">
            <thead>
            <h3>Clientes Activos</h3>
                <th>Nombre</th>
                <th>Nit</th>
                <!-- <th>Telefono</th> -->
                <th>Dirección</th>
            </thead>
            @foreach($clientes as $cliente)
            <tbody>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->nit}}</td>
                <!-- <td>{{$cliente->telefono}}</td> -->
                <td>{{$cliente->dirección}}</td>
                <td>{!!link_to_route('venta.show', $title = 'Realizar Venta', $parameters = $cliente->id, $attributes =['class'=>'btn btn-primary']);!!}</td>
                <td>{!!link_to_action('Restaurante\DetalleVentaController@CrearVenta', $title = 'Realizar Venta Restaurante', $parameters = $cliente->id, $attributes =['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
        </table>
    </div>
@stop
