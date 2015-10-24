@extends('layouts.principal')
@section('content')
    {!! Form::model($cliente, ['route'=> ['clientes.update', $cliente ->id], 'method'=>'PUT']) !!}
        <h3>Clientes</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
        		{!!Form::label('Nombre:')!!}
        		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre', 'required'])!!}
        	</div>
        	<div class="form-grup">
        		{!!Form::label('Nit:')!!}
        		{!!Form::text('nit',null,['class'=>'form-control','placeholder'=>'Ingrese Numero Nit', 'required'])!!}
        	</div>
        	<div class="form-grup">
        		{!!Form::label('Telefono:')!!}
        		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese No. Telefono', 'required'])!!}
        	</div>
            <div class="form-grup">
                {!!Form::label('Dirección:')!!}
                {!!Form::text('dirección',null,['class'=>'form-control','placeholder'=>'Ingrese dirección', 'Any'])!!}
            </div>
        <div class="form-btn">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
    </div>
@stop