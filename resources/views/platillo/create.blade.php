@extends('layouts.principal')

@section('content')
    {!!Form::open(['route'=>'platillo.store', 'method'=>'POST'])!!}
        <h3>Platillo</h3>
       <div class="container">
            <div class="form-grup">
                {!!Form::label('Temporada:')!!}
                {!!Form::select('temporada_id',$opciontemporada,['class'=>'form-control','placeholder'=>'Ingrese Temporada ','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('')!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre de platillo ','required'])!!}
            </div>
            <div class="form-grup">
                {!!Form::label('Precio:')!!}
                {!!Form::number('precio',null,['class'=>'form-control','placeholder'=>'Ingrese Precio','required'])!!}
            </div>
        
            <div class="form-grup">
                {!!Form::label('Descripcion:')!!}
                {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese Una Descripcion','required','step' => 'any'])!!}
            </div>
      
            
            {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
         </div>
    {!!form::close()!!}

@stop
