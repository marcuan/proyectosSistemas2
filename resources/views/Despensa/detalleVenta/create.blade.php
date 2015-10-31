@extends('layouts.principal')
@section('content')
    <div class="container col-xs-12">
        <table class="table table-hover table-responsive">
            <thead>
                <th>No. Venta</th>
                <th>Cliente</th>
            </thead>
            @foreach($venta as $venta)
            <tbody>
                <td>{{$venta->id}}</td>
                <td>{{$venta->clientes_id}}</td>
            </tbody>
            @endforeach
        </table>
    </div>

    <div class="container-fluid">
        <table class="table table-condensed">
            <thead>
            <h3>Detalle de Venta</h3>
                <th>Nombre</th>
                <th>Nit</th>
                <!-- <th>Telefono</th> -->
                <th>Dirección</th>
            </thead>
        </table>
    </div>
@stop