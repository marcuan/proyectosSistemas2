@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'compra.store', 'method'=>'POST'])!!}
        <h3>Compras</h3>
        <div class="container">
            <div class="form-grup">
        		{!!Form::label('Fecha:')!!}
        		{!!Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Ingrese fecha', 'required'])!!}
        	</div>
        	<div class="form-grup">
        		{!!Form::label('Sub Total:')!!}
        		{!!Form::text('subTotal',null,['class'=>'form-control','placeholder'=>'Ingrese Sub Total', 'required'])!!}
        	</div>
        	<div class="form-grup">
        		{!!Form::label('Descuento:')!!}
        		{!!Form::text('descuento',null,['class'=>'form-control','placeholder'=>'Ingrese Descuento', 'required'])!!}
        	</div>
            <div class="form-grup">
                {!!Form::label('Total:')!!}
                {!!Form::text('total',null,['class'=>'form-control','placeholder'=>'Ingrese Total', 'required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Proveedor:')!!}
                {!!Form::text('proveedores_id',null,['class'=>'form-control','placeholder'=>'Ingrese Proveedor', 'required'])!!}
            </div>
        	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!} 
@stop