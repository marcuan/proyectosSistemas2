@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'create')
<div class="alert alert-success alert-dismissible" role="alert">
  <strong>Detalle Creado Exitosamente</strong>pefecto
</div>
@endif
@section('content')
{!!Form::open(array ('route' => array('detalleconsignacion.store'),'$consignacion', 'method'=>'POST'))!!}
  	
		<h3 class="title" selected="selected">DetalleConsignacion</h3>
        <div class="form-grup ">
            
		<div class="form-grup ">
             
       {!!Form::label('No. Consignacion:')!!}
	   {!!Form::text('consignacion_id',$consignacion,['class'=>'form-control','placeholder'=>'No.','readonly'])!!}
	   {{-- */$consigcomp = RED\Despensa\Consignacion::find($consignacion)/* --}}
	  	{!!Form::label('Codigo de Consignación:')!!} <td>{{$consigcomp->codigo}}</td>
        </div>
			<h4>Nuevo Detalle</h4>
		</div><br/>

		
			 {!! Form::label('Seleccione un Producto: ')!!}
		 
		     {!! Form::select('producto_id',$opcionproducto);!!}
		
	   <div class="form-grup"> 
			 <div class="form-grup">
	         {!!Form::label('Cantidad:')!!}
			 {!!Form::number('cantidad',null,['class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'])!!}
           </div><br/>
            <div class="form-grup">
              {!!Form::label('Precio unitario:')!!}
              {!!Form::number('precio',null,['class'=>'form-control','placeholder'=>'Ingrese Precio','required'])!!}
            </div>
         </div><br/>
		      {!!Form::submit('Guardar y Regresar',['class'=>'btn btn-primary'])!!}
{!!form::close()!!}


@stop

<!-- mostrar productos en tabla    -->
	 
@stop

