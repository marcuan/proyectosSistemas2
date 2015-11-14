@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>¡Operación Exitosa!</strong> Detalle Venta creado.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>¡Operación Exitosa!</strong> Detalle Venta Editado.
</div>
@endif

@section('content')


 <div class="container col-xs-12">
        <table class="table table-hover table-responsive">
            <thead>
                <th>No. Venta</th>
                <h3>Datos de Venta</h3>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Nit</th>
                <th>Dirección</th>
            </thead>            
            {{-- */$clienteComp = RED\Restaurante\Cliente::find($venta->clientes_id)/* --}}
            <tbody>
                <td>{{$venta->id}}</td>
                <td>{{$venta->fechaVenta}}</td>
                <td>{{$clienteComp->nombre}}</td>
                <td>{{$clienteComp->nit}}</td>
                <td>{{$clienteComp->dirección}}</td>
            </tbody>
        </table>
    </div>

   <a href="../detalleventa/create" class="btn btn-danger">Nueva Venta</a>
   <a href="../venta" class="btn btn-danger">Terminar</a>        

    <div class="container">
        <table class="table">
            <thead>
              <h3>Ventas realizadas al cliente</h3>
              <th>Id Platillo</th>
              <th>Nombre Platillo</th>
              <th>Precio (Q)</th>
              <th>Cantidad</th>
              <th>Sub total (Q)</th>
                <!--<th>No. tienda</th>-->
            </thead>
            <!--@foreach($DetalleVenta as $DetalleVenta)-->
             {{-- */$platillo = RED\Restaurante\Platillo::find($DetalleVenta->platillo_id)/* --}}
            <tbody>
              <td>{{$platillo->id}}</td>
              <td>{{$platillo->nombre}}</td>
              <td>{{$platillo->precio}}</td>
              <td>{{$DetalleVenta->cantidad}}</td>
              <td>{{$DetalleVenta->total}}</td>
                <!--<td>{{$DetalleVenta->tiendaorestaurante}}</td>-->
            </tbody>
            @endforeach
        </table>
    </div>


@stop