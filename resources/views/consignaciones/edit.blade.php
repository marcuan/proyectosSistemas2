@extends('layouts.principal')
@section('content')
    {!!Form::model($consignaciones,['route'=>['consignaciones.update', $consignaciones->id], 'method'=>'PUT'])!!}
        <h3>Consignaciones</h3>
		<div class="col-sm-3">
				{!!Form::label('Codigo de Consignacion:')!!}
				{!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo', 'required'])!!}
	     </div>
        <div class="container col-xs-12">
			
		
            <div class="form-grup">
                {!!Form::label('Fecha Inicio:')!!}
                {!!Form::date('fechaInicial',null,['class'=>'form-control','placeholder'=>'Ingrese fecha inicio', 'required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Fecha Final:')!!}
                {!!Form::date('fechaFinal',null,['class'=>'form-control','placeholder'=>'Ingrese fecha final', 'required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Observaciones:')!!}
                {!!Form::text('detalleConsignacion',null,['class'=>'form-control','placeholder'=>'Observaciones', 'required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Proveedor:')!!}
                {!!Form::text('proveedores_id',null,['class'=>'form-control','placeholder'=>'Ingrese Proveedor', 'required'])!!}
            </div><br>
        <div class="form-btn">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
			<div class="container">
	 
			<table class="table">
			<h3>DetalleConsignacion</h3>
           	 <div class="container">
			<thead>
				<th>Producto</th>
                <th>Cantidad</th>
                <th>Precio U</th>
                
            </thead>
		</div>
			
    </div>
			
			
    {!!form::close()!!}
    </div>
@stop