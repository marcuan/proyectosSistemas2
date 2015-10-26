@extends('layouts.principal')

@section('content')
    <div class="container">
        <table class="table">
        <h1>No. Compra: {{$detalle->id}}</h1>
            <thead>
                <th>Materia Prima</th>
                <th>Cantidad</th>
                <th>Costo</th>                
            </thead>
            @foreach($detalle->detalles as $DetalleCompra)  
                <tbody>
                    <td>{{$DetalleCompra->materia_prima_id}}</td>
                    <td>{{$DetalleCompra->cantidad}}</td>
                    <td>{{$DetalleCompra->costo}}</td>
                </tbody>
            @endforeach
            <a href="/detallecompra/create" class="btn btn-danger">Crear Detalle</a>
            <a href="/compra" class="btn btn-danger">Regresar</a>
        </table>
    </div>
@stop