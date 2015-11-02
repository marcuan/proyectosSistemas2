<?php

require('fpdf/fpdf.php');
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{

	$this->SetFont('Arial','B',20);
	$this->Image('images/cabeza-re.jpg' , 55 ,3, 165, 35,'JPG','',0,1,'C');
	$this->Text(20,45,'Lista de Actividades',0,'C', 0);
	$this->Ln(30);
}

}

	$enlace = mysqli_connect("localhost", "root", "", "caferedbd");
	$strConsulta = "SELECT * from activity where date_start = '$fecha'";
	$actividades = mysqli_query($enlace, $strConsulta);
	
	$fila = mysqli_fetch_array($actividades);

	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','',12);
	$d = $fila['date_start'];
	$pdf->Cell(0,6,'Fecha de Inicio: '.$d[8].$d[9].$d[7].$d[5].$d[6].$d[4].$d[0].$d[1].$d[2].$d[3],0,1);
	$pdf->Ln(5);
	
	$pdf->SetWidths(array(15, 30, 30, 100, 35, 30));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(105,105,105);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
				$pdf->SetAligns(array('C','C','C','C','C','C'));
				$pdf->Row(array('No.', 'Nombre', "Direccón", "Descripción", 'Fecha Finalización', 'Capacidad'));
			}
	$strConsulta = "SELECT * from activity where date_start = '$fecha'";
	$actividades = mysqli_query($enlace, $strConsulta);
	$numfilas = mysqli_num_rows($actividades);

	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysqli_fetch_array($actividades);
			$pdf->SetFont('Arial','',10);
			$numlista = $i + 1;
			
			if($i%2 == 1)
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->SetAligns(array('C','L','L','L','C','C'));
				$d = $fila['date_end'];
				$pdf->Row(array($numlista, $fila['name'], $fila['address'], $fila['description'], $d[8].$d[9].$d[7].$d[5].$d[6].$d[4].$d[0].$d[1].$d[2].$d[3], $fila['capacity']));
			}
			else
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->SetAligns(array('C','L','L','L','C','C'));
				$d = $fila['date_end'];
				$pdf->Row(array($numlista, $fila['name'], $fila['address'], $fila['description'], $d[8].$d[9].$d[7].$d[5].$d[6].$d[4].$d[0].$d[1].$d[2].$d[3], $fila['capacity']));
			}
		}

//$pdf->Output();
$pdf->Output('Actividades_'.$d[8].$d[9].$d[7].$d[5].$d[6].$d[4].$d[0].$d[1].$d[2].$d[3].'.pdf', 'D');
?>