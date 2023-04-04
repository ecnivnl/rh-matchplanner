<?php

/* Copyright (C) Ecniv Group BV
 * Use by any KNSA-licensed organisation permitted (only)
 * See https://github.com/ecnivnl/rh-matchplanner/ for license 
 * Written by Vince van Domburg (@ecnivnl)
 */
 
 ?>
dag;datum;baan;serie;voorletter;achternaam;vernummer;vernaam;knsa;klasse;;
<?php
require_once("functions.php");
require_once("knsaKlassen.php");
$i = 0;
if ($file = fopen("baanplanner_export.csv", "r")) {
	while(!feof($file)) {
		$line = fgets($file);
		$arr = explode(";",$line);

		if($i != 0)
		{
			// print_r($arr);	  
			$regel['dag'] = trim($arr[0]);
			$regel['datum'] = trim($arr[1]);
			$regel['baan'] = trim($arr[2]);
			$regel['serie'] = trim($arr[3]);
			$regel['voorletter'] = trim($arr[4]);
			$regel['achternaam'] = trim($arr[5]);
			$regel['vernummer'] = trim($arr[14]);
			$regel['vernaam'] = str_replace("  "," ",trim($arr[15]));
			$regel['knsa'] = trim($arr[16]);
			$knsa = $regel['knsa'];

			if(trim($arr[20]) == "KKP")
			{
				if (isset($knsaregister[$knsa]['SEPL']))
				{
					$regel['klasse'] = $knsaregister[$knsa]['SEPL'];
				}
				
			}
			else if(trim($arr[20]) == "GKP")
			{
				if (isset($knsaregister[$knsa]['SEPZ']))
				{
					$regel['klasse'] = $knsaregister[$knsa]['SEPZ'];
				}
			}
			else
			{
				print $arr[20];
			}
			
			print "".$regel['dag'].";".$regel['datum'].";".$regel['baan'].";".$regel['serie'].";".$regel['voorletter'].";".$regel['achternaam'].";".$regel['vernummer'].";".$regel['vernaam'].";".$regel['knsa'].";".$regel['klasse'].";;\r\n";
		}
	$i++;
	}
    fclose($file);
}   
?> 


