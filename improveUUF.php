<?php

/* Copyright (C) Ecniv Group BV
 * Use by any KNSA-licensed organisation permitted (only)
 * See https://github.com/ecnivnl/rh-matchplanner/ for license 
 * Written by Vince van Domburg (@ecnivnl)
 */

require_once("functions.php");
require_once("knsaKlassen.php");
require_once("baanplannerCategorie.php");

 ?>Wedstrijduitslagen-formulier ;
Naam organiserende vereniging:;;<?php print $vereniging['naam'];?>;;;;Aangeleverd door (naam):;<?php print $vereniging['contact'];?>;
Verenigingscode:;;<?php print $vereniging['knsa'];?>;;;;Licentienummer:;<?php print $vereniging['contactKnsa'];?>;
Soort/naam wedstrijd:;;<?php print $wedstrijd;?>;;;;Telefoonnummer:;<?php print $vereniging['contactTel'];?>;
Datum van wedstrijd:;;<?php print $wedstrijddatum ?>;;;;E-mailadres:;<?php print $vereniging['contactEmail'];?>;
Plaats van wedstrijd:;;<?php print $vereniging['plaats'];?>;;;;Akkoord DTC/LTC:;;
;;;
Positie;Discipline;Categorie;Klasse;Licentie;Achternaam;Verenigingscode;Verenigingsnaam;S1;S2;S3;S4;S5;S6;Innerten;Totaal serie;Totaal finale;Totaal serie + finale;
<?php
$koptekst = false;

$i = 0;
if ($file = fopen("UUF.csv", "r")) {
	while(!feof($file)) {
		$line = fgets($file);
		$arr = explode(";",$line);

		if($koptekst == false)
		{
			if($arr[0] == "Positie")
			{
				$koptekst = true;
			}
		}
		else
		{
			// print_r($arr);
			if($arr[0] != "")
			{
				//$arr[2] = Categorie
				//$arr[3] = Klasse
				if(trim($arr[1]) == "SPKKP")
				{
					// print "KKP - $knsa";
					// print_r($knsaregister[$arr[4]]);
					if (isset($knsaregister[$arr[4]]['SEPL']) && $knsaregister[$arr[4]]['SEPL'] != " ")
					{
						if(strlen($knsaregister[$arr[4]]['SEPL']) == 2)
						{
							
							$arr[2] = "Veteranen";
							$arr[3] = str_replace("V","",$knsaregister[$arr[4]]['SEPL']);
						}
						else
						{
							$arr[2] = "Senioren";
							$arr[3] = str_replace("V","",$knsaregister[$arr[4]]['SEPL']);
						}
					}
					else if(isset($knsaCat[$arr[4]]))
					{
						$arr[2] = $knsaCat[$arr[4]];
					}
					else
					{
						$arr[2] = "Senioren";
					}
					
				}
				else if(trim($arr[1]) == "SPGKP")
				{
					if (isset($knsaregister[$arr[4]]['SEPZ']))
					{
						if(strlen($knsaregister[$arr[4]]['SEPZ']) == 2)
						{
							$arr[2] = "Veteranen";
							$arr[3] = str_replace("V","",$knsaregister[$arr[4]]['SEPZ']);
						}
						else
						{
							$arr[3] = str_replace("V","",$knsaregister[$arr[4]]['SEPZ']);
							$arr[2] = "Senioren";

						}
					}
					else if(isset($knsaCat[$arr[4]]))
					{
						$arr[2] = $knsaCat[$arr[4]];
					}
					else
					{
						$arr[2] = "Senioren";
					}
				}
				else
				{
					
				}
				$arr[3] = strtoupper($arr[3]);
				if($arr[3] == ""){$arr[3] = "H";}
				print "".$arr[0].";".$arr[1].";".$arr[2].";".$arr[3].";".$arr[4].";".$arr[5].";".$arr[6].";".$arr[7].";".$arr[8].";".$arr[9].";".$arr[10].";".$arr[10].";".$arr[12].";".$arr[13].";".$arr[14].";".$arr[15].";".$arr[16].";".$arr[17].";\r\n";
			}
		}
	$i++;
	}
    fclose($file);
}   
?> 