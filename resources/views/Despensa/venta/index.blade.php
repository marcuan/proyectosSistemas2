@extends('layouts.principal')

<?php $message=Session::get('message')?>


@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Venta realizada exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Venta modificada exitosamente.
</div>
@endif

@section('content')

<!----------------------------------------------------------------
Vista -> Cuadro para filtrar ventas
----------------------------------------------------------------->


{!! Form::open(['href' => '../public/venta', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('type',null,['class' => 'form-control', 'placeholder' => 'Numero de Venta']) !!}
    <button type="submit" class="btn btn-primary">Buscar</button> 
    </div>

{!! Form::close() !!}


<!----------------------------------------------------------------
Vista -> Cuadro para filtrar ventas por fecha
----------------------------------------------------------------->

{!! Form::open(['href' => '../public/venta', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}

    <div class="form-group">
        {!!Form::Date('fecha',null,['class'=>'form-control','placeholder'=>'Ingrese o Seleccione Fecha','required'])!!}
                <button type="submit" class="btn btn-primary">Buscar</button> 
    </div>
{!! Form::close() !!}


<!----------------------------------------------------------------
CODIGO PARA LISTAR LAS VENTAS EN LA VENTANA
----------------------------------------------------------------->
    <div class="container col-xs-12">
    <a href="venta/create" class="btn btn-danger">Realizar Venta</a>
    
        <table class="table table-hover table-responsive">
            <thead>
                <th>No. Venta</th>
                <th>Fecha de Venta</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Nit</th>
                <th>Total</th>
                <th>Anulación</th>
            </thead>
            @foreach($venta as $venta)
            {{-- */$clienteComp = RED\Restaurante\Cliente::find($venta->clientes_id)/* --}}
            <tbody>
                <td>{{$venta->id}}</td>
                <td>{{$venta->fechaVenta}}</td>
                <td>{{$clienteComp->nombre}}</td>
                <td>{{$clienteComp->dirección}}</td>
                <td>{{$clienteComp->nit}}</td>
                <td>{{$venta->total}}</td>
                <td>{!!link_to_route('venta.edit', $title =                       'Anular', $parameters = $venta->id,      $attributes=['class'=>'btn btn-primary']);!!}</td>
            </tbody>
            @endforeach
            
        </table>
    </div>
@stop