@extends('layouts.principal')

@section('content')
    <!--{!!Form::open(array ('route' => array('detalleventa.store'),'$detalleventa', 'method'=>'POST'))!!}-->
    {!!Form::open(['route'=>'detalleventa.store', 'method'=>'POST'])!!}
  
        <h3>Detalle Venta</h3>
        <div class="container">
            <div class="form-grup">
                {!!Form::label('Temporada:')!!}
                {!!Form::select('temporada_id',$opciontemporada,['class'=>'form-control','placeholder'=>'Temporada ','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Platillo:')!!}
                {!!Form::select('nombre',$opcionesplatillo,['class'=>'form-control','placeholder'=>'Seleccione Platillo ','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Cantidad:')!!}
                {!!Form::number('cantidad',null,['class'=>'form-control','placeholder'=>'Ingrese cantidad', 'required'])!!}
       		  </div>
            <div class="form-grup">
	            {!!Form::label('Total:')!!}
                {!!Form::number('total',null,['class'=>'form-control','placeholder'=>'Total', 'required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('No. Tienda:')!!}
                {!!Form::number('tiendaorestaurante',null,['class'=>'form-control','placeholder'=>'Numero de Tienda', 'required'])!!}
            </div><br>
            {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}

@stop