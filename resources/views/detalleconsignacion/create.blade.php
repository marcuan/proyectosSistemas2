@extends('layouts.principal')


@section('content')
    {!!Form::open(array ('route' => array('detalleconsignacion.store'),'$consignacion', 'method'=>'POST'))!!}
  
        <h3>DetalleConsignacion</h3>
        <div class="form-grup ">
            
		<div class="form-grup ">
             
                {!!Form::label('No. Consignacion:')!!}
                {!!Form::label('consignacion_id',$consignacion,['class'=>'form-control','placeholder'=>'No.','required'])!!}
       		  </div>
		</div><br/>
			<div class="form-grup col-md-offset-2 ">
                {!!Form::label('Seleccione un Producto:')!!}
                {!! Form::select('producto_id', $opcionproducto) !!}
            </div><br/>
	   <div class="form-grup"> 
			 <div class="form-grup">
	                {!!Form::label('Cantidad:')!!}
                {!!Form::text('cantidad',null,['class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'])!!}
           </div><br/>
            <div class="form-grup">
              {!!Form::label('Precio unitario:')!!}
                {!!Form::text('precio',0,['class'=>'form-control','placeholder'=>'Ingrese Precio','required'])!!}
            </div>
         </div><br/>

            {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
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

@stop
