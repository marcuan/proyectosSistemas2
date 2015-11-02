@extends('layouts.principal')
@section('content')
	<?php
		$enlace = mysqli_connect("localhost", "root", "", "caferedbd");
		$strConsulta = "SELECT date_start, COUNT(*) FROM activity GROUP BY date_start";
		$donantes = mysqli_query($enlace, $strConsulta);
		$numfilas = mysqli_num_rows($donantes);

		echo '<table cellpadding="0" cellspacing="0" width="100%">';
		echo '<thead><tr><td>No.</td><td>Fecha de Inicio</td><td>Cantidad de Actividades</td><td>Descripción de Actividades</td></tr></thead>';
		for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysqli_fetch_array($donantes);
			$numlista = $i + 1;
			$d = $fila['date_start'];
			echo '<tr><td>'.$numlista.'</td>';
			echo '<td>'.$d[8].$d[9].$d[7].$d[5].$d[6].$d[4].$d[0].$d[1].$d[2].$d[3].'</td>';
			echo '<td>'.$fila['COUNT(*)'].'</td>';
			echo '<td><a href="DescripcionActividades/'.$fila['date_start'].'">Guardar</a></td></tr>';
		}
		echo "</table>";
	?>
@stop
