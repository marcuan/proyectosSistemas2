@extends('layouts.principal')

@section('content')
    <div class="container">
        <table class="table">
       <h1>No. Consignacion: {{$detalle->id}}</h1>
            <thead>
                <th>Seleccione el Producto: </th>
                <th>Cantidad</th>
                <th>Costo Unitario</th>                
            </thead>
         @foreach($detalle->detalles as $DetalleConsignacion)  
                <tbody>
                    <td>{{$DetalleConsignacion->producto_id}}</td>
                    <td>{{$DetalleConsignacion->existencia}}</td>
                    <td>{{$DetalleConsignacion->precioVenta}}</td>
                </tbody>
            @endforeach
            <a href="/detalleconsignacion/create" class="btn btn-danger">Crear otro Detalle</a>
            <a href="/consignacion" class="btn btn-danger">Regresar</a>
	</div>
	<div class="container">
			<table class="table">
            <thead>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio U</th>
                
            </thead>
        </table>
    </div>
@stop