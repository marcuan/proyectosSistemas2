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
	$this->Text(20,45,'Historial de Donaciones',0,'C', 0);
	$this->Ln(30);
}

}

	$enlace = mysqli_connect("localhost", "root", "", "caferedbd");
	$strConsulta = "SELECT * from donor where id = '$id'";
	
	$donantes = mysqli_query($enlace, $strConsulta);
	
	$fila = mysqli_fetch_array($donantes);

	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(10);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'Clave: '.$fila['id_donor'],0,1);
	$pdf->Cell(0,6,'Nombre: '.$fila['donor_name'].' '.$fila['donor_lastname'],0,1);
	$pdf->Cell(0,6,'Direccion: '.$fila['adress'],0,1); 
	$pdf->Cell(0,6,'e-mail: '.$fila['e_mail'],0,1);
	$nombre = $fila['donor_name'].'_'.$fila['donor_lastname'];
	
	$pdf->Ln(5);
	
	$pdf->SetWidths(array(15, 30, 190));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(105,105,105);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
				$pdf->SetAligns(array('C','C','C'));
				$pdf->Row(array('No.', 'Monto', 'Descripción'));
			}

	$strConsulta = "SELECT donation.monto, donation.descripcion FROM donation 
	Inner Join donor ON donation.id_donor = donor.id 
	WHERE donor.id = '$id'";
	
	$historial = mysqli_query($enlace, $strConsulta);
	$numfilas = mysqli_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysqli_fetch_array($historial);
			$pdf->SetFont('Arial','',10);
			$numlista = $i + 1;
			
			if($i%2 == 1)
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->SetAligns(array('C','R','L'));
				$pdf->Row(array($numlista, $fila['monto'], $fila['descripcion']));
			}
			else
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->SetAligns(array('C','R','L'));
				$pdf->Row(array($numlista, $fila['monto'], $fila['descripcion']));
			}
		}

//$pdf->Output();
$pdf->Output('Historial_Donaciones_'.$nombre.'.pdf', 'D');
?>
