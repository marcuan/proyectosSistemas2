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
	$fpdf->SetFont('Arial','b',16);      
	// aca va la imagen 

$fpdf->Image('images/cabeza-re.jpg' , 18 ,3, 165, 35,'JPG','',0,1,'C');     

$fpdf->Cell(170,18,date('d/m/Y'),0,1,'R');
$fpdf->Cell(170,2,date('H:m:s'),0,1,'R');
   	
$fpdf->Cell(185,20,'Lista Total de Cursos',0,1,'C');




// conexion base de datos
 
$enlace = mysqli_connect("localhost", "root", "", "caferedbd");
$frec= mysqli_query($enlace,"SELECT * FROM curso");

//formato de la tabla
$fpdf->Ln(5);

$fpdf->SetFont('Arial','B',10);
$fpdf->SetFillColor(67,187,70); // fondo color verde 

// titulos 

	$fpdf->Cell(15,5,'Codigo',0,0,'C',True);
	$fpdf->Cell(25,5,'Nombre',0,0,'C',True);
	$fpdf->Cell(20,5,'Fecha ',0,0,'C',True);
	$fpdf->Cell(10,5,'Num.',0,0,'C',True);
	$fpdf->Cell(10,5,'Max.',0,0,'C',True);
	$fpdf->Cell(110,5,'Descripcion ',0,1,'C',True);
	$fpdf->Cell(15,5,'',0,0,'C',True);
	$fpdf->Cell(25,5,'Curso',0,0,'C',True);
	$fpdf->Cell(20,5,'Inicio',0,0,'C',True);
	$fpdf->Cell(10,5,'Estu.',0,0,'C',True);
	$fpdf->Cell(10,5,'Estu.',0,0,'C',True);
	$fpdf->Cell(110,5,' Curso',0,1,'C',True);
	


// tipo de color y letra adentro de la consulta 
$fpdf->SetFont('Arial','',9);

while ($frow = mysqli_fetch_row($frec))
{
	// las columnas que quiere que aparezca 

	$fpdf->Cell(15,5,$frow[1],1,0,'C');
	$fpdf->Cell(25,5,$frow[2],1,0,'C');
	$fpdf->Cell(20,5,$frow[4],1,0,'C');
	$fpdf->Cell(10,5,$frow[7],1,0,'C');
	$fpdf->Cell(10,5,$frow[6],1,0,'C');
	$fpdf->Cell(110,5,$frow[3],1,1,'C');
}


 $fpdf->Output('Reporte_Cursos','D'); // solo funciona para descargar 
?>