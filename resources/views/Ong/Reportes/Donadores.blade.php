@extends('layouts.principal')
@section('content')
	<?php
		$enlace = mysqli_connect("localhost", "root", "", "caferedbd");
		$strConsulta = "SELECT * from donor where active = true";
		$donantes = mysqli_query($enlace, $strConsulta);
		$numfilas = mysqli_num_rows($donantes);

		echo '<table cellpadding="0" cellspacing="0" width="100%">';
		echo '<thead><tr><td>Id</td><td>Clave</td><td>Nombre</td><td>E-Mail</td><td>Historial de Donaciones</td></tr></thead>';
		for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysqli_fetch_array($donantes);
			echo '<td>'.$fila['id'].'</td>';
			echo '<td>'.$fila['id_donor'].'</td>';
			echo '<td>'.$fila['donor_name'].' '.$fila['donor_lastname'].'</td>';
			echo '<td>'.$fila['e_mail'].'</td>';
			echo '<td><a href="Historial/' .$fila['id'].'">Guardar</a></td></tr>';
		}
		echo "</table>";
	?>
@stop
