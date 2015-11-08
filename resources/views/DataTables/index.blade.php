@extends('layouts.dinamic')

   
           
@section('content')
    <table class="table table-condensed table-hover" id="Productos-table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Telefono</th>
            </tr>
        </thead>
		<!--{{-- */$proveedorComp = RED\Despensa\Producto::all()/* --}}
		@foreach($proveedorComp as $consignaciones)
		
		 <tbody>
			 <tr>
				<td>{{$consignaciones->id}}</td>
                <td>{{$consignaciones->nombreProducto}}</td>
                <td>{{$consignaciones->existencia}}</td>
              </tr>
            </tbody>
		 @endforeach
-->
    </table>
@stop
  
			
		
@push('scripts')

<script>

//$(document).ready(function () {
	$('#Productos-table').DataTable({
		processing: true,
		serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
		 columns: [
            { data: 'id', name: 'id' },
            { data: 'nombreProducto', name: 'nombreProducto' },
            { data: 'existencia', name: 'existencia' },
		        ],
			"initComplete": function () {
		     var api = this.api();
            api.$('td').click( function () {
				alert ("click");
                api.search( this.innerHTML ).draw();
            } );
		},
		"fnDrawCallback": function () {
		     var api = this.api();
            api.$('td').click( function () {
			api.search( this.innerHTML ).draw();
            } );
		}
    });
		
	
//} );	
</script>


@endpush	





