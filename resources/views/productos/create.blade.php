@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'producto.store', 'method'=>'POST'])!!}
        <h3 class="title" selected="selected">Productos</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Nombre del Producto:')!!}
                {!!Form::text('nombreProducto',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de su producto','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Detalle:')!!}
                {!!Form::textarea('detalleProducto',null,['class'=>'form-control','placeholder'=>'Ingrese Detalle de su producto','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Precio de Venta:')!!}
                {!!Form::text('precioVenta',null,['class'=>'form-control','placeholder'=>'Ingrese el precio','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Existencia:')!!}
                {!!Form::number('existencia',null,['class'=>'form-control','placeholder'=>'Ingrese la existencia del producto','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Comision en Quetzales:')!!}
                {!!Form::text('comision',null,['class'=>'form-control','placeholder'=>'Ingrese comision del producto','required'])!!}
            </div>
            <div class="form-btn">
                {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
        {!!form::close()!!}
    </div>
@stop
