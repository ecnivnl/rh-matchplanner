<?php

/* Copyright (C) Ecniv Group BV
 * Use by any KNSA-licensed organisation permitted (only)
 * See https://github.com/ecnivnl/rh-matchplanner/ for license 
 * Written by Evert van Harten (@evharten)
 */

require_once("functions.php");
include("config.php");

$classArray = array();


$fp = fopen("impUUF.csv", "r");
while (!feof($fp))
{
	$csvLine = fgetcsv($fp, null, ";");
	if (count($csvLine) > 3 && $csvLine[0] > 0)
	{
		$id = $csvLine[0];
		$discipline = strtoupper($csvLine[1]);
		$category = $csvLine[2];
		$class = $csvLine[3];
		$licentie = $csvLine[4];
		$name = $csvLine[5];
		$vCode = $csvLine[6];
		$vName = $csvLine[7];
		$sess1 = $csvLine[8];
		$sess2 = $csvLine[9];
		$sess3 = $csvLine[10];
		$sess4 = $csvLine[11];
		$sess5 = $csvLine[12];
		$sess6 = $csvLine[13];
		$innert = $csvLine[14];
		$totalsess = $csvLine[15];
		$totalfinal = $csvLine[16];
		$totalcomp = $csvLine[17];
		
		$classArray[$discipline][$category][$class][$totalcomp] = array($licentie, $name, $vCode, $vName, $sess1, $sess2, $sess3, $sess4, $sess5, $sess6, $innert, $totalsess, $totalfinal, $totalcomp);
	}
}
fclose($fp);

require_once("fpdf/fpdf.php");

$pdf=new FPDF('P','mm','A4');
$pdf->AliasNbPages();

foreach ($classArray AS $discipline => $discData)
{
	foreach ($discData AS $category => $catData)
	{
		foreach ($catData AS $class => $classData)
		{
			$pdf->AddPage();
			$page++;
			$pdf->SetFont('Helvetica','B',14);
			$pdf->Cell(0,12,$vereniging['naam'],0,0);$pdf->Ln(6);
			$pdf->Cell(0,12,$vereniging['adres'],0,0);$pdf->Ln(6);
			$pdf->Cell(0,12,$vereniging['postcode']." ".$vereniging['plaats'],0,0);$pdf->Ln(6);
			$pdf->Cell(0,12,'KNSA: '.$vereniging['knsa'],0,0);
			$pdf->Ln(15);
			
			$pdf->SetFont('Helvetica','B',14);
			$pdf->Cell(50,10,"Wedstrijduitslag $wedstrijd - $discipline - $category - $class Klasse",0,0);
			$pdf->Ln(20);
			$pdf->SetFont('Helvetica','B',10);
			$pdf->Cell(20, 10, "Positie", 1, 0);
			$pdf->Cell(80, 10, "Naam", 1, 0);
			$pdf->Cell(30, 10, "Licentie", 1, 0);
			$pdf->Cell(0, 10, "Score", 1, 1);
			
			$pos = 1;
			foreach ($classData AS $score => $deelnemerData)
			{
				$pdf->Cell(20, 10, $pos, 1, 0);
				$pdf->Cell(80, 10, $deelnemerData[1], 1, 0);
				$pdf->Cell(30, 10, $deelnemerData[0], 1, 0);
				$pdf->Cell(0, 10, $deelnemerData[11], 1, 1);
				$pos++;
			}
			
			
			
			
			
		}
	}
}

$pdf->Output("Wedstrijduitslagen.pdf", 'I');
?>