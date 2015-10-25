@extends('layouts.principal')


@section('content')
    {!!Form::open(array ('route' => array('detallecompra.store'),'$compra', 'method'=>'POST'))!!}
  
        <h3>DetalleCompras</h3>
        <div class="container">
            <div class="form-grup">
                {!!Form::label('Materia prima:')!!}
                {!! Form::select('materia_prima_id', $opcionmateria) !!}
            </div>
            <div class="form-grup">
                {!!Form::label('Compra:')!!}
                {!!Form::text('compras_id',$compra,['class'=>'form-control','placeholder'=>'Ingrese No. de Compra','required'])!!}
       		  </div>
            <div class="form-grup">
	                {!!Form::label('Cantidad:')!!}
                {!!Form::text('cantidad',null,['class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Costo:')!!}
                {!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'Ingrese Costo','required'])!!}
            </div>
            {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}

@stop
