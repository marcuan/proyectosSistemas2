@extends('layouts.principal')


@section('content')
   
{!!Form::open(array ('route' => array('detalleconsignacion.store'),'$consignacion', 'method'=>'POST'))!!}
  
        <h3>DetalleConsignacion</h3>
        <div class="form-grup ">
            
		<div class="form-grup ">
             
       {!!Form::label('No. Consignacion:')!!}
	   {!!Form::text('consignacion_id',$consignacion,['class'=>'form-control','placeholder'=>'No.','readonly'])!!}
			
       		  </div>
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
<!--<div class="form-grup col-md-offset-2 ">-->
                {!!Form::label('Seleccione un Producto:')!!}
                {!! Form::select('producto_id', $opcionproducto) !!}
<!--            </div><br/>-->
<!--            {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}-->
			<a href="/detalleconsignacion/create" class="btn btn-primary">Guardar</a>
			<a href="/consignaciones" class="btn btn-danger">Terminar</a>


 <!--{!!Form::open(array ('route' => array('detalleconsignacion.store'),'$consignacion', 'method'=>'POST'))!!}-->

<!-- LLenando Tabla con el detalle de la consignacion   -->

	 
  {!!form::close()!!}
@stop
