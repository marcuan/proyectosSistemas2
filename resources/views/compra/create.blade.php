@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'compra.store', 'method'=>'POST'])!!}
        <h3>Compras</h3>
        <div class="container col-xs-12">
            <div class="form-grup">
        		{!!Form::label('Fecha:')!!}
        		{!!Form::date('fecha',$fecha,['class'=>'form-control','placeholder'=>'Ingrese fecha', 'required'])!!}
        	</div><br>
        	<div class="form-grup">
        	<!--	{!!Form::label('Sub Total:')!!}-->
        		{!!Form::hidden('subTotal',0,['class'=>'form-control','placeholder'=>'Ingrese Sub Total', 'required'])!!}
        	</div><br>
        	<div class="form-grup">
        		<!--{!!Form::label('Descuento:')!!}-->
        		{!!Form::hidden('descuento',0,['class'=>'form-control','placeholder'=>'Ingrese Descuento', 'hidden'])!!}
        	</div><br>
            <div class="form-grup">
        <!--        {!!Form::label('Total:')!!}-->
                {!!Form::hidden('total',0,['class'=>'form-control','placeholder'=>'Ingrese Total', 'hidden'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Proveedor:')!!}
                {!!Form::select('proveedores_id', $opcionproveedor,['class'=>'form-control','placeholder'=>'Ingrese Proveedor', 'required'])!!}
            </div>

        	 <table class="table">
            <thead>
		   <th>id</th>
                <th>Nombre</th>
               <th>Cantidad</th>
		       <th>Precio unitario</th>   
			<th>Comprar</th>			  
            </thead>
             @foreach($materiaprima as $key => $dato)
            <tbody>
			<td> {!!Form::hidden('materiaprima_id',$dato->id,['class'=>'form-control','placeholder'=>'Ingrese Total', 'hidden'])!!}</td>
                <td>{{$dato->nombre}}</td>
              <td>{!!Form::number('cantidad[]',0,['class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'])!!}</td>
 <td> {!!Form::number('costo[]',0,['class'=>'form-control','placeholder'=>'Ingrese Costo','required'])!!}</td>
 <td>{!!Form::checkbox('check[]', $key);!!}
                        {!!Form::text('dato['.$key.']', $dato->id, ['class'=>'hidden', 'id'=>'iddato'])!!}</td>		
		</tbody>
            @endforeach
        </table>
		
		
		{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		
			
        </div>
    {!!form::close()!!} 
@stop