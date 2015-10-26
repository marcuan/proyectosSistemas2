@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'producto.store', 'method'=>'POST'])!!}
        <h3>Productos</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombreProducto',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de su producto','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Detalle:')!!}
                {!!Form::number('detalleProducto',null,['class'=>'form-control','placeholder'=>'Ingrese Detalle de su producto','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Precio:')!!}
                {!!Form::text('precioVenta',null,['class'=>'form-control','placeholder'=>'Ingrese el precio','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Existencia:')!!}
                {!!Form::text('existencia',null,['class'=>'form-control','placeholder'=>'Ingrese la existencia del producto','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Comision:')!!}
                {!!Form::text('comision',null,['class'=>'form-control','placeholder'=>'Ingrese comision del producto','required'])!!}
            </div>
            
        
    {!!form::close()!!}
    </div>

@stop
