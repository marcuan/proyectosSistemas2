@extends('layouts.principal')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>Proveedores</p>
@endsection

@section('content')
    <p>Compras a Proveedores</p>
     <!-- Mostrar compras en una tabla-->
	
	 <table border="1">
    <tr>
      <th>Fecha</th>
      <th>Sub total</th>
      <th>Descuento</th>
	 <th>Total</th>
    </tr>
          @foreach($proveedore->compras as $compras)
	 <tr>
		<td>{{$compras->fecha}} </td>
		<td>{{$compras->subTotal}} </td>
		<td>{{$compras->descuento }}</td>
		<td>{{$compras->total}} </td>
      </tr>

          @endforeach
		</table>
        </ul>
@endsection