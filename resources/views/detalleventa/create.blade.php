@extends('layouts.principal')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--{!!Form::open(array ('route' => array('detalleventa.store'),'$detalleventa', 'method'=>'POST'))!!}-->
    {!!Form::open(array ('route' => array('detalleventa.store'),'$detalleventa', 'method'=>'POST'))!!}
    
        <h3>Detalle Venta</h3>
        <div class="container col-xs-12">

            <div class="form-grup">
                {!!Form::label('Platillos:')!!}
                <select  class="form-control" id="platillo_id" name="platillo_id" data-url="{{ url('api/dropdown')}}">
                    <option value="0" selected disabled="">Seleccione Platillo</option>
                        @foreach ($opcionplatillo as $opcionplatillo)
                            <option value="{{$opcionplatillo->id}}" >{{$opcionplatillo->nombre}}</option>
                        @endforeach
                </select>
                <select  disabled class="form-control" id="subprecio" name="subprecio" >
                    <option value="0" selected disabled="">Precio</option>
                </select>

            </div>

<!-- Comienza la vista de cantidad-->

<div class="form-grup">
    <!--{!!Form::label('Precio:')!!}-->
    {!!Form::hidden('precio',$precio,['class'=>'form-control','placeholder'=>'Ingrese cantidad', 'required'])!!}
</div>
<div class="form-grup">
    {!!Form::label('Cantidad:')!!}
    {!!Form::number('cantidad',0,['class'=>'form-control','placeholder'=>'Ingrese cantidad', 'required'])!!}
</div>
<div class="form-grup">
<!--{!!Form::label('Total:')!!}-->
    {!!Form::hidden('total', $precio,['class'=>'form-control','placeholder'=>'Total', 'null'])!!}
</div>
<div class="form-grup">
<!--{!!Form::label('Tienda o Restaurante:')!!}-->
    {!!Form::hidden('tiendaorestaurante', 1,['class'=>'form-control','placeholder'=>'Numero de Tienda', 'required'])!!}
</div>
<div class="form-grup">
<!--{!!Form::label('Id Venta:')!!}-->
    {!!Form::hidden('venta_id',$idsales,['class'=>'form-control','placeholder'=>'ID venta', 'required'])!!}
</div>
<div class="form-grup">
<!--{!!Form::label('Id Producto:')!!}-->
    {!!Form::hidden('producto_id', 1,['class'=>'form-control','placeholder'=>'Total', 'required'])!!}
</div><br>
    

    {!!form::close()!!}

<table class="table">
<thead>
    <th>Id platillo</th>
    <th>Nombre Platillo</th>
    <th>Precio</th>
    <th>Cantidad</th>   
    <th>Vender</th>              
</thead>
<!--@foreach($platillosrest as $key => $dato)
<tbody>
    <td> {!!Form::number('platillos_id',$dato->id,['class'=>'form-control','placeholder'=>'Ingrese Total', 'hidden'])!!}</td>
    <td>{{ $dato->nombre }}</td>
    <td>{!!Form::number('precio[]', $dato->precio ,['class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'])!!}</td>
    <td>{!!Form::number('cantidad[]',0,['class'=>'form-control','placeholder'=>'Ingrese Cantidad','required'])!!}</td>
    <td>{!!Form::checkbox('check[]', $key);!!}
    {!!Form::text('dato['.$key.']', $dato->id, ['class'=>'hidden', 'id'=>'iddato'])!!}</td>     
</tbody>
@endforeach
-->
</table>
{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
{!!form::close()!!}
    </div>
</div>

<script type="text/javascript">
        
        // Autopopulate Subcategories Select Drop down
        $('#platillo_id').change(function(){
          $.get($(this).data('url'), 
              { platilloselect: $(this).val() }, 
              function(data) {
                  var subcat = $('#subprecio');
                  subcat.empty();
                  $.each(data, function(index, element) {
                      subcat.append("<option value='"+ element.id +"'>" + element.precio + "</option>");
                  });
              });
        });

    </script>
@stop