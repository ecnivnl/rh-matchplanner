<?php

include("config.php");

require_once("fpdf/fpdf.php");

// $achternaam = html_entity_decode($_GET['achternaam']);
$achternaam = iconv('UTF-8', 'windows-1252', html_entity_decode($_GET['achternaam']));

$pdf=new FPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$page++;
$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(50,10,"Wedstrijduitslag ".$wedstrijd.' - '.$_GET['tijd']." (baan ".$_GET['baan'].")",0,0);
$pdf->Ln(6);
$pdf->SetFont('Helvetica','B',12);
$naam = ltrim($_GET['voorletter']." ".$achternaam);
$pdf->Cell(10,10,$naam,0,0);$pdf->SetFont('Helvetica','',12);
$pdf->Ln(6);
$pdf->Cell(10,10,"KNSA-nummer: ".$_GET['knsa'],0,0);
$pdf->Ln(6);
$pdf->Cell(10,10,"Dicipline: ".$_GET['dicipline'],0,0);
$pdf->Ln(6);$pdf->Ln(6);
$pdf->SetFont('Helvetica','B',12);

$pdf->Cell(10,10,"Uitslag / wedstrijdbriefje",'',12);
$pdf->Ln(6);
$pdf->SetFont('Helvetica','B',12);



$pdf->Cell(50,10,'Schoten links',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Ln(10);
$pdf->Cell(50,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Ln(10);
$pdf->Ln(10);

$pdf->Cell(50,10,'Schoten rechts',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Ln(10);
$pdf->Cell(50,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);
$pdf->Cell(20,10,'',1,0);

$pdf->Ln(10);$pdf->Ln(10);
// $pdf->SetFont('Helvetica','B',12);
// $pdf->Cell(50,10,'Totaalscore',1,0);
// $pdf->SetFont('Helvetica','',12);
// $pdf->Cell(50,10,'',1,0);
// $pdf->Cell(50,10,'  (Totale score, dus bijv. 238)',0,0);
// $pdf->Ln(10);
// $pdf->SetFont('Helvetica','',9);
// $pdf->Cell(50,10,'Indien sprake van diskwalificatie, een kruis plaatsen door de scorevlakken en bij totaalscore DSQ schrijven',0,0);
// $pdf->Ln(10);
// $pdf->Ln(10);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(50,10,'Opmerking(en) van Baancommandant',0,0);
$pdf->Ln(10);$pdf->Ln(10);$pdf->Ln(10);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(50,10,'Handtekening voor akkoord',0,0);
$pdf->Ln(10);

$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(80,25,'Schutter',1,0);

$pdf->Cell(80,25,'',1,0);
$pdf->Ln(25);
$pdf->Cell(50,10,'Verwerkt in MatchMaker',0,0);

$pdf->Ln(10);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(80,25,'Administratie',1,0);
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(80,25,'',1,0);
$pdf->Ln(40);


$pdf->Image('logo_rh.png',10,230,30);
$pdf->Cell(40,12,'',0,0);$pdf->Cell(80,12,$vereniging['naam'],0,0);$pdf->Ln(6);
$pdf->Cell(40,12,'',0,0);$pdf->Cell(80,12,$vereniging['adres'],0,0);$pdf->Ln(6);
$pdf->Cell(40,12,'',0,0);$pdf->Cell(80,12,$vereniging['postcode']." ".$vereniging['plaats'],0,0);$pdf->Ln(6);
$pdf->Cell(40,12,'',0,0);$pdf->Cell(80,12,'KNSA: '.$vereniging['knsa'],0,0);$pdf->Ln(6);
$pdf->Output("Scoreformulier_".$_GET['knsa'].".pdf", 'I');
	
?>