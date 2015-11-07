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
                    <td>{{$DetalleCompra->materia_prima->nombre}}</td>
                    <td>{{$DetalleCompra->cantidad}}</td>
                    <td>{{$DetalleCompra->costo}}</td>
                </tbody>
            @endforeach
		    <h1>Total: {{$detalle->total}}</h1>
            <a class="btn btn-danger" {!!link_to_route('detallecompra.show', $title = 'Crear Detalles', $parameters = $detalle->id, $attributes = ['class'=>'btn btn-primary']);!!}</a>
            <a href="/compra" class="btn btn-danger">Regresar</a>
        </table>
    </div>
@stop