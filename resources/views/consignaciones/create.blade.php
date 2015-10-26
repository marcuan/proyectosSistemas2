@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'consignaciones.store', 'method'=>'POST'])!!}
        <h3>Consignaciones</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
        		{!!Form::label('Fecha Inicio:')!!}
        		{!!Form::date('fechaInicial',null,['class'=>'form-control','placeholder'=>'Ingrese fecha inicial', 'required'])!!}
        	</div><br>
        	<div class="form-grup">
        		{!!Form::label('Fecha Fin:')!!}
        		{!!Form::date('fechaFinal',null,['class'=>'form-control','placeholder'=>'Ingrese fecha final', 'required'])!!}
        	</div><br>
        	<div class="form-grup">
        		{!!Form::label('Observaciones:')!!}
        		{!!Form::text('detalleConsignacion',null,['class'=>'form-control','placeholder'=>'Observaciones', 'required'])!!}
        	</div><br>
            <div class="form-grup">
                {!!Form::label('Proveedor:')!!}

                {!!Form::select('proveedores_id', $opcionproveedor,['class'=>'form-control','placeholder'=>'Ingrese Proveedor', 'required'])!!}
            </div><br>
            <div class="form-btn">
        	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    {!!form::close()!!} 
@stop