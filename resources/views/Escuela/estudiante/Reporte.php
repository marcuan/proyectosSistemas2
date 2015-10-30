<?php
require "fpdf/fpdf.php" ;

class PDF extends FPDF 
{

}
// declaracion de la hoja 

		$fpdf = new Fpdf();
         $fpdf ->AddPage ();
         

// datos de titulo 
    $fpdf->SetTextColor(0x00,0x00,0x00);
	$fpdf->SetFont('Arial','b',14);      
	// aca va la imagen 

$fpdf->Image('images/foto-info.jpg' , 10 ,5, 200 , 45,'JPG','',0,1,'C');     
   	
$fpdf->Cell(180, 25,'Reporte Estudiantes',0,1,'C');
$fpdf->Cell(180,5,date('d/m/Y'),0,1,'C');
$fpdf->Cell(180,5,date('H:m:s'),0,1,'C');



//formato de la tabla
$fpdf->Ln(10);
$fpdf->SetTextColor(0x00,0x00,0x00);
$fpdf->SetFont('Arial','',9);

// conexion base de datos
 
$enlace = mysqli_connect("localhost", "root", "", "caferedbd");
$frec= mysqli_query($enlace,"SELECT * FROM estudiante");

	$fpdf->Cell(15,5,'codigo',1,0,'C');
	$fpdf->Cell(16,5,'Nombre',1,0,'C');
	$fpdf->Cell(20,5,'Apellido',1,0,'C');
	$fpdf->Cell(50,5,'Correo',1,0,'C');
	$fpdf->Cell(90,5,'Direccion',1,1,'C');
	
while ($frow = mysqli_fetch_row($frec))
{
	// las columnas que quiere que aparezca 
	//$fpdf->Cell(15,5,'$frow',1,1);
	$fpdf->Cell(15,5,$frow[1],1,0,'C');
	$fpdf->Cell(16,5,$frow[2],1,0,'C');
	$fpdf->Cell(20,5,$frow[3],1,0,'C');
	$fpdf->Cell(50,5,$frow[6],1,0,'C');
	$fpdf->Cell(90,5,$frow[5],1,1,'C');
}


 $fpdf->Output('Reporte','D'); // solo funciona para descargar 
?>