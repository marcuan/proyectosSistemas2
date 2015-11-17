@extends('layouts.principal')

<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Compra creada exitosamente.
</div>
@endif

@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>En horabuena!</strong> Compra editada exitosamente.
</div>
@endif

@section('content')

    <a href="../compra/create" class="btn btn-danger">Crear Compra</a>
     {!! Form::open(['href' => '../public/compra', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}

    <div class="form-group">
        {!!Form::Date('fecha',null,['class'=>'form-control','placeholder'=>'Ingrese o Seleccione Fecha'])!!}
                <button type="submit" class="btn btn-default glyphicon glyphicon-search"></button> 
    </div>

{!! Form::close() !!}
{!! Form::open(['href' => '../public/compra', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('type',null,['class' => 'form-control', 'placeholder' => 'Numero de Compra']) !!}
    <button type="submit" class="btn btn-default glyphicon glyphicon-search"></button> 
    </div>

{!! Form::close() !!}
    <div class="container col-xs-12">

        <table class="table">
            <thead>
                <th>No. Compra</th>
                <th>Fecha</th>
                <!--<th>Sub Total (Q)</th>
                <th>Descuento</th>-->
                <th>Total (Q)</th>
                <th>Proveedor</th>
            </thead>
            @foreach($compras as $compra)
                <tbody>
                    <td>{{$compra->id}}</td>
                    <td>{{$compra->fecha}}</td>
                    <!--<td>{{$compra->subTotal}}</td>
                    <td>{{$compra->descuento}}</td>-->
                    <td>{{$compra->total}}</td>
                    <td>{{$compra->proveedores->nombre}}</td>
                    <td>{!!link_to_action('Restaurante\ComprasController@verdetallecompra', $title = 'Ver Detalles', $parameters = $compra->id, $attributes = ['class'=>'btn btn-primary']);!!}
                    {!!link_to_route('compra.edit', $title = 'Editar', $parameters = $compra->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>

                    
                </tbody>
            @endforeach
		  {!!$compras->render()!!}
        </table>
	   {!!$compras->render()!!}
    </div>
   
@stop