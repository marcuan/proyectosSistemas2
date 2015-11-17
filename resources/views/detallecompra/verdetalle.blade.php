@extends('layouts.principal')

@section('content')
    <div class="container col-xs-12">
        
        <table class="table">
            <thead>
                <th>Materia Prima</th>
                <th>Cantidad</th>
                <th>Costo (Q)</th>                
            </thead>
            @foreach($detalle->detalles as $DetalleCompra)  
                <tbody>
                    <td>{{$DetalleCompra->materia_prima->nombre}}</td>
                    <td>{{$DetalleCompra->cantidad}}</td>
                    <td>{{$DetalleCompra->costo}}</td>
                </tbody>
            @endforeach

            <div class="panel panel-info" >
                <div class="panel-heading"><h4><strong>No. Compra: {{$detalle->id}}</strong> </h4></div>
                <div class="panel-body">
                    <h5><strong>Fecha:</strong> {{$detalle->fecha}}</h5>
                    <h5><strong>Proveedor:</strong> {{$detalle->proveedores->nombre}}</h5>
                    <!--<h5><strong>Sub Total (Q):</strong> {{$detalle->subTotal}}</h5>
                    <h5><strong>Descuento:</strong> {{$detalle->descuento}}</h5> -->
                    <h5><strong>Total (Q):</strong> {{$detalle->total}}</h5>
                </div>
            </div>		    
            <!--<a class="btn btn-primary" {!!link_to_route('detallecompra.show', $title = 'Crear Detalles', $parameters = $detalle->id, $attributes = ['class'=>'btn btn-primary']);!!}</a>-->
            <a href="/compra" class="btn btn-danger">Regresar</a>
        </table>
    </div>
@stop