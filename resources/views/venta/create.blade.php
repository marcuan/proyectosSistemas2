@extends ('layouts/master')
@section ('title')
    <title> view venta</title>
@stop
@section ('sidebar')
    <h1>lista de ventas del dia</h1>
@foreach ($ventas as $ventas)
    <article>
        <h2>{{$ventas->clientes_id}}</h2>
    </article>
@endforeach
@stop
