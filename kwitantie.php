<?php

include("config.php");

require_once("fpdf/fpdf.php");

$knsanummer = $_REQUEST['knsa'];
$bezoekers = array();
if ($file = fopen("baanplanner_export.csv", "r"))
{
	while(!feof($file))
	{
		$line = fgets($file);
		$arr = explode(";",$line);

		$regel['knsa'] = trim($arr[16]);
		$knsa = $regel['knsa'];
		$bezoekers[$knsa]['aantal']++;
		$bezoekers[$knsa]['naam']=trim($arr[4])." ".trim($arr[5]);
		$bezoekers[$knsa]['diciplines'][] = trim($arr[20]);
 
	   $i++;
	}
	fclose($file);
}
	
$pdf=new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$page++;
$pdf->Image($vereniging['logo'],165,10,30);
$nu = date("d-m-Y");
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(50,6,''.$vereniging['naam'],0,0);$pdf->Ln(6);
$pdf->Cell(50,6,''.$vereniging['adres'],0,0);$pdf->Ln(6);
$pdf->Cell(50,6,''.$vereniging['postcode']." ".$vereniging['plaats'],0,0);$pdf->Ln(6);
$pdf->Cell(80,6,'KNSA: '.$vereniging['knsa'],0,0);$pdf->Ln(6);$pdf->Ln(6);

$pdf->SetFont('Helvetica','B',14);$pdf->Ln(6);$pdf->Ln(6);
$pdf->Cell(50,6,'Kwitantie '.$bezoekers[$knsanummer]['naam'],0,0);$pdf->Ln(6);
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(50,6,'Datum '.$nu,0,0);$pdf->Ln(6);
$pdf->Ln(6);$pdf->Ln(6);


$i=0;
while($i<sizeof($bezoekers[$knsanummer]['diciplines']))
{
	$pdf->Cell(150,6,"1x wedstrijdbijdrage $wedstrijd ".$bezoekers[$knsanummer]['diciplines'][$i],0,0);
	$pdf->Cell(50,6,"EUR $wedstrijdprijs",0,0);
	$totaalbedrag += $wedstrijdprijs;
	$pdf->Ln(6);
	$i++;
}
$pdf->Ln(6);
$pdf->Ln(6);
$pdf->Cell(50,6,"Totaalbedrag: EUR $totaalbedrag",0,0);$pdf->Ln(6);$pdf->Ln(6);$pdf->Ln(6);$pdf->Ln(6);
$pdf->SetFont('Helvetica','',10);

$pdf->Cell(50,6,"Het inschrijfbureau bevestigt, door ondertekening incl. verenigingsstempel, dat deze bijdrage is voldaan.",0,0);$pdf->Ln(6);



$pdf->Output("Kwitantie_".$_GET['knsa'].".pdf", 'I');
	
?>