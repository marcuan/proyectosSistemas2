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
        <table class="panel panel-info">
        <div class="panel-heading">
                <h4><strong>No. Venta: {{$venta->id}}</strong> </h4>
        </div>

        <div class="panel-body">
                    {{-- */$clienteComp = RED\Restaurante\Cliente::find($venta->clientes_id)/* --}}
                    <h5><strong>Fecha:</strong> {{$venta->fechaVenta}}</h5>
                    <h5><strong>Cliente:</strong> {{$clienteComp->nombre}}</h5>
                    <h5><strong>Nit:</strong> {{$clienteComp->nit}}</h5>
                    <h5><strong>Dirección:</strong> {{$clienteComp->dirección}}</h5> 
                    <h5><strong>Total (Q):</strong> {{$venta->total}}</h5>
        </div>
        </table>
</div>

   <a href="../detalleventa/create" class="btn btn-primary">Nueva Venta</a>
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