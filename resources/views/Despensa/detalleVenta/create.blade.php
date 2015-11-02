@extends('layouts.principal')
@section('content')
    <div class="container col-xs-12">
        <table class="table table-hover table-responsive">
            <thead>
                <h3>Datos de Venta</h3>
                <th>No. Venta</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Nit</th>
                <th>Dirección</th>
            </thead>
            {{-- */$clienteComp = RED\Restaurante\Cliente::find($venta->clientes_id)/* --}}
            <tbody>
                <td>{{$venta->id}}</td>
                <td>{{$venta->fechaVenta}}</td>
                <td>{{$clienteComp->nombre}}</td>
                <td>{{$clienteComp->nit}}</td>
                <td>{{$clienteComp->dirección}}</td>
            </tbody>
        </table>
    </div>

    <div class="container-fluid">
        <table class="table">
            <thead>
                <h3>Seleccion de Productos</h3>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Comprar</th>
                <th>Cantidad</th>
            </thead>
            {{-- */$producto = RED\Despensa\Producto::All()/* --}}
            @foreach($producto as $productos)
            <tbody>
            	<td>{{$productos->id}}</td>
                <input type="hidden" value="{{$productos->id}}" name="idpro[]">
                <td>{{$productos->nombreProducto}}</td>
                <td>{{$productos->precioVenta}}</td>
                <td>{{$productos->existencia}}</td>
                <td>{!!Form::checkbox('check', $productos->id);!!}</td>
                <td><input type="numeric" value="0" name="cant[]" min = "0" placeholder = "Ingrese Cantidad"></td> 
            </tbody>
            @endforeach
        </table>
        <a href="" class="btn btn-warning">Cargar Productos</a>
    </div>

{!!Form::open(['route'=>'detalleventa.store', 'method'=>'POST'])!!}
{!!Form::hidden('tiendaorestaurante',1,['class'=>'form-control','required'])!!}
{!!Form::hidden('venta_id',$venta->id,['class'=>'form-control','required'])!!}
{!!Form::hidden('platillo_id',1,['class'=>'form-control','required'])!!}
{!!Form::hidden('producto_id',$productos->id,['class'=>'form-control','required'])!!}
{!!Form::hidden('total',$productos->precioVenta*1,['class'=>'form-control','required'])!!}
{!!Form::hidden('cantidad',0,['class'=>'form-control','required'])!!}
    <div class="container-fluid">
        <table class="table table-condensed">
            <thead>
            <h3>Detalle de Venta</h3>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </thead>
             <tbody>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tbody>
        </table>
        <div class="form-btn">
            {!!Form::submit('Cargar Productos',['class'=>'btn btn-warning'])!!}
        </div>
        {!!form::close()!!}
    </div>
@stop