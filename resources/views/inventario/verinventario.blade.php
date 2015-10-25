@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado</strong> Se han ingresado nuevos productos
</div>
@endif
@section('content')
 
   <div class="container col-xs-12">
        <table class="table">
            <thead>
				<th>Existencia</th>
                <th>Nombre</th>
				<th>Detalle</th>
                <th>Precio de Venta</th>
				<th>Comision</th>
			 </thead>
             @foreach($inventario as $productos)
            <tbody>
				<td>{{$productos->existencia}}</td>
                <td>{{$productos->nombreProducto}}</td>
                <td>{{$productos->detalleProducto}}</td>
                <td>{{$productos->precioVenta}}</td>
				<td>{{$productos->comision}}</td>
		    </tbody>
            @endforeach
        </table>
    </div>
@stop