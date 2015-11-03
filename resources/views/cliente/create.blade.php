@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'clientes.store', 'method'=>'POST'])!!}
      <h3 class="title" selected="selected">Clientes</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
        		{!!Form::label('Nombre:')!!}
        		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre', 'required'])!!}
        	</div>
        	<div class="form-grup">
        		{!!Form::label('Nit:')!!}
        		{!!Form::text('nit','C/F',['class'=>'form-control','placeholder'=>'Ingrese Numero Nit', 'required'])!!}
        	</div>
        	<div class="form-grup">
        		{!!Form::label('Telefono:')!!}
        		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese No. Telefono'])!!}
        	</div>
            <div class="form-grup">
                {!!Form::label('Dirección:')!!}
                {!!Form::text('dirección','CIUDAD',['class'=>'form-control','placeholder'=>'Ingrese dirección', 'required'])!!}
            </div>
        	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!} 
@stop