@extends('layouts.master')
@section('content')
    {!!Form::open(['route'=>'proveedor.store', 'method'=>'POST'])!!}
        <h3>Proveedores</h3>
        <div class="container">
      
        	<div class="form-grup">
        		{!!Form::label('Nombre:')!!}
        		{!!Form::text('nombre_proveedor',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre del proveedor', 'required'])!!}
        	</div>
      
        	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
  
@stop