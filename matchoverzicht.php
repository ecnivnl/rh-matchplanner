<?php

/* Copyright (C) Ecniv Group BV
 * Use by any KNSA-licensed organisation permitted (only)
 * See https://github.com/ecnivnl/rh-matchplanner/ for license 
 * Written by Vince van Domburg (@ecnivnl)
 */
 
 ?>

<html>
<head>
	<meta http-equiv="Refresh" content="30">
</head>
<body>
<?php
require_once("knsaKlassen.php");
include('config.php');

print "<h1>Matchoverzicht</h1>";
print "
<table style=\"border: 1px solid black;\">
<tr>
";
if($multiday)
{
	print "
	<td width=\"10%\"><b>Dag</b></td>
	<td width=\"10%\"><b>Datum</b></td>
	";
}
print "
<td width=\"10%\"><b>Serie</b></td>
<td width=\"5%\"><b>Baan</b></td>
<td width=\"10%\"><b>Naam</b></td>
<td width=\"10%\"><b>KNSA-nummer</b></td>
<td width=\"10%\"><b>Aanwezig</b></td>
</tr>

";


if ($file = fopen("checkin.log", "r"))
{
	while(!feof($file))
	{
        $line = fgets($file);
       if($line != "\n")
	   {
		   $arr = explode(";",$line);
		   $aanwezig[] = $arr[0];
	   }
	}
}

// print_r($aanwezig);


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
			$regel['vernaam'] = trim($arr[15]);
			$regel['knsa'] = trim($arr[16]);
			$knsa = $regel['knsa'];
			if(in_array($knsa,$aanwezig))
			{
				$aw = "ja";
				$color = "#d9ffcc";
			}
			else
			{
				$aw = "nee";
				$color = "#ffcc99";
			}

			if(trim($arr[20]) == "KKP")
			{
				$regel['klasse'] = $knsaregister[$knsa]['SEPL'];
				
			}
			else if(trim($arr[20]) == "GKP")
			{
				// print "GKP";
				$regel['klasse'] = $knsaregister[$knsa]['SEPZ'];
			}
			else
			{
				print $arr[20];
			}
			print "<tr>
						";
			if($multiday)
			{
				print "
				<td bgcolor=\"$color\" style=\"border: 1px solid black;\">".$regel['dag']."</td>
				<td style=\"border: 1px solid black;\">".$regel['datum']."</td>";
			}
			
			print "
			<td bgcolor=\"$color\" style=\"border: 1px solid black;\">".$regel['serie']."</td>
			<td bgcolor=\"$color\" style=\"border: 1px solid black;\">".$regel['baan']."</td>
			<td bgcolor=\"$color\" style=\"border: 1px solid black;\">".$regel['voorletter']." ".$regel['achternaam']."</td>
			<td bgcolor=\"$color\" style=\"border: 1px solid black;\">".$regel['knsa']."</td>
			<td bgcolor=\"$color\"  style=\"border: 1px solid black;\">".$aw."</td>
			
			
			</tr>
			";
	   }
	   $i++;
    }
    fclose($file);
	print "</table><br><br>";
}   
$nu = date("Y-m-d H:i:s");
print "Last updated: $nu<br><br><br>
<img width=\"100\" src=\"".$vereniging['logo']."\"><br><br><br><br>
Software by Ecniv Group BV - Vince van Domburg";

?> 


