@extends('layouts.principal')
@section('content')
    {!!Form::open(['route'=>'clientes.update', 'method'=>'POST'])!!}
        <h3>Clientes</h3>
        
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
    {!!form::close()!!}

@stop