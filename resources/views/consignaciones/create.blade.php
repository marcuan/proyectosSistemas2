@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'consignaciones.store', 'method'=>'POST'])!!}
        <h3>Consignaciones</h3>
	
	<div class="container col-xs-16">
			 
      <div class="col-sm-3">
				{!!Form::label('Codigo de Consignacion:')!!}
				{!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo', 'required'])!!}
	  </div><br/>
		
    <div class="col-md-4 col-md-offset-1">	
                {!!Form::label('Proveedor:')!!}

                {!!Form::select('proveedores_id', $opcionproveedor,['class'=>'form-control','placeholder'=>'Ingrese Proveedor', 'required'])!!}
		
		
            </div><br>
      </div>
		

	<div class="container col-xs-16">
		
		   <div class="col-sm-3">
        		{!!Form::label('Fecha Inicio:')!!}
        		{!!Form::date('fechaInicial',null,['class'=>'form-control','placeholder'=>'Ingrese fecha inicial', 'required'])!!}
        	</div>
			
        	 <div class="col-md-3 col-md-offset-1 ">	
        		{!!Form::label('Fecha Fin:')!!}
        		{!!Form::date('fechaFinal',null,['class'=>'form-control','placeholder'=>'Ingrese fecha final', 'required'])!!}
        	</div><br>
		
	</div>
	
   <div class="container col-xs-12">
	
        	<div class="form-grup">
        		{!!Form::label('Observaciones:')!!}
        		{!!Form::textarea('detalleConsignacion',null,['class'=>'form-control','placeholder'=>'Observaciones', 'required'])!!}
        	</div><br>
          
            <div class="form-btn">
        	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    {!!form::close()!!} 
@stop