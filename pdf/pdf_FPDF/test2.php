<?php
	require('fpdf16/fpdf.php');
	
	class PDF extends FPDF{
		function Header(){
			$this->Image('fpdf.jpg',10,10,114,84,'jpg','http://www.fpdf.org/');
			$this->SetFont('Helvetica','B',15);
			$this->SetXY(10,10);
			$this->SetDrawColor(50,60,100);
			$this->Cell(114,10,'This is a header',1,0,'C');
		}
		function Footer(){
			$this->SetXY(100,-15);
			$this->SetFont('Helvetica','I',10);
			$this->Write (5, 'This is a footer');
		}
	}
	
	$pdf = new PDF();
	$pdf->AddPage();
	$pdf->AddPage();
	$pdf->Output('test2.pdf','I');

?>