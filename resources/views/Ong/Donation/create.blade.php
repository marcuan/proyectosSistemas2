@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'donaciones.store', 'method'=>'POST'])!!}
       
        <div class="container col-xs-12">
        <h3 class="title" selected="selected">Donaciones</h3>

            <div class="form-grup">
                {!!Form::label('Monto:')!!}
                {!!Form::number('monto',null,['class'=>'form-control','placeholder'=>'Ingrese Monto de Donación','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::label('Descripción:')!!}
                {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese Descripción de Donación','required'])!!}
            </div><br>
            <div class="form-grup">
                {!!Form::hidden('id_donor',$id)!!}
            </div><br>
            <div class="form-btn">
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
        
             {!!form::close()!!}
     </div>

@stop