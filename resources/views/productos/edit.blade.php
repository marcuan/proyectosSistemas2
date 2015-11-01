@extends('layouts.principal')
@section('content')
        
    {!!Form::model($productos,['route'=>['producto.update', $productos->id], 'method'=>'PUT'])!!}
        <h3>Productos</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
                {!!Form::label('Codigo:')!!}
                {!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Ingrese Codigo ','readonly'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombreProducto',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de su producto','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Detalle:')!!}
                {!!Form::text('detalleProducto',null,['class'=>'form-control','placeholder'=>'Ingrese Detalle de su producto','required'])!!}
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
            <div class="form-grup">
                {!!Form::label('Estado:')!!}
                {!!Form::select('estado',array('0'=>'Activo','1'=>'Inactivo'),null,['class'=>'form-control'])!!}
            </div>
            <div class="form-btn">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
    </div>
@stop