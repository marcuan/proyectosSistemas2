@extends('layouts.principal')
@section('content')
    {!!Form::model($venta,['route'=>['venta.update', $venta->id], 'method'=>'PUT'])!!}
        <h3>Ventas</h3>
        <div class="container col-xs-10">
            <div class="form-grup">
                
                {{-- */$clienteComp = RED\Restaurante\Cliente::find($venta->clientes_id)/* --}}     
                
                <div class="form-group">
                    {!!Form::label('Numero de Venta:')!!}
                    {!!Form::text('numeroVenta',$venta->id,['class'=>'form-control'])!!}
                </div>
                
                
                <div class="form-group">
                    {!!Form::label('Cliente:')!!}
                    {!!Form::text('nombreCliente',$clienteComp->nombre,['class'=>'form-control'])!!}
                    
                    {!!Form::label('Dirección:')!!}
                    {!!Form::text('nombreCliente',$clienteComp->dirección,['class'=>'form-control'])!!}
                </div>
                
                <div class="form-group">
                      {!!Form::label('Sub-Total de Venta:')!!}
                    {!!Form::text('numeroVenta',$venta->subtotal,['class'=>'form-control'])!!}
                    
                    {!!Form::label('Total de Venta:')!!}
                    {!!Form::text('numeroVenta',$venta->total,['class'=>'form-control'])!!}
                    
                    {!!Form::label('Anulado:')!!}
                    {!!Form::text('anulado',$venta->anulado,['class'=>'form-control','placeholder'=>'Anular Venta','required'])!!}
                </div><br>
                
                
            </div><br>
        <div class="form-btn">
            {!!Form::submit('Anular Venta',['class'=>'btn btn-primary'])!!}
        </div>
    {!!form::close()!!}
    </div>
@stop

