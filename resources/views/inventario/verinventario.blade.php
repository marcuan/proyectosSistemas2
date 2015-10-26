@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado</strong> Se han ingresado nuevos productos
</div>
@endif
@section('content')
 
  <!-- probando Buscar Producto-->

    {!! Form::open(['href' => '../public/inventario', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Producto']) !!}
    </div>
        <button type="submit" class="btn btn-primary">Buscar</button> 
    {!! Form::close() !!}
   

   <!-- fin buscar producto  -->


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