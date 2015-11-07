@extends('layouts.principal')
@section('content')
    <div class="container col-xs-12">
        <table class="table table-hover table-responsive">
            <thead>
                <th>No. Venta</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Nit</th>
            </thead>
            {{-- */$clienteComp = RED\Restaurante\Cliente::find($venta->clientes_id)/* --}}
            <tbody>
                <td>{{$venta->id}}</td>
                <td>{{$venta->fechaVenta}}</td>
                <td>{{$clienteComp->nombre}}</td>
                <td>{{$clienteComp->nit}}</td>
            </tbody>
        </table>
    </div>

    <div class="container-fluid">
        <table class="table table-condensed">
            <thead>
            <h3>Detalle de Venta</h3>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </thead>
        </table>
    </div>
@stop