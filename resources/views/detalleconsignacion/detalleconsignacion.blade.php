@extends('layouts.principal')

@section('content')
    <div class="container">
        <table class="table table-hover">
<!--       <h1>No. Consignacion: {{$detalle->id}}</h1>-->
	   <h1>Codigo Consignacion: {{$detalle->codigo}}</h1>
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
		
     <a class="btn btn-primary" {!!link_to_route('detalleconsignacion.show', $title = 'Crear Detalle', $parameters = $detalle->id, $attributes = ['class'=>'btn btn-primary']);!!}</a>
         
          	<a href="/consignaciones" class="btn btn-danger">Regresar</a>
	</div>
@stop