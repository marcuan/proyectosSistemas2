@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'venta.store', 'method'=>'POST'])!!}
        <h3>Venta</h3>
        <div class="container col-xs-12">   
        	<div class="form-grup">
        		{!!Form::label('Cliente:')!!}
        		{!!Form::number('clientes_id',null,['class'=>'form-control','placeholder'=>'Ingrese codigo cliente','required'])!!}
        	</div><br>
            <div class="form-btn">
        	   {!!Form::submit('Realizar',['class'=>'btn btn-primary'])!!}
            </div>
    {!!form::close()!!}
    </div>
@stop
