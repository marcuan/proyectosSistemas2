@extends('layouts.principal')

@section('content')
    <div class="container">
        <table class="table">
       <h1>No. Consignacion: {{$detalle->id}}</h1>
            <thead>
				<th>Cantidad</th>
                <th>Producto </th>
                <th>Costo Unitario</th>                
            </thead>
         @foreach($detalle->detalles as $DetalleConsignacion)  
			
{{-- */$productoComp = RED\Despensa\Producto::find($DetalleConsignacion->producto_id)/* --}}
                <tbody>
					<td>{{$DetalleConsignacion->cantidad}}</td>
					<td>{{$productoComp->nombreProducto}}</td>
                    <td>{{$DetalleConsignacion->precio}}</td>
                </tbody>
            @endforeach
            <a href="/detalleconsignacion/create" class="btn btn-primary">Crear otro Detalle</a>
          	<a href="/consignaciones" class="btn btn-danger">Regresar</a>
	</div>
@stop