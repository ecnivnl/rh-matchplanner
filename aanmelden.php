<?php

/* Copyright (C) Ecniv Group BV
 * Use by any KNSA-licensed organisation permitted (only)
 * See https://github.com/ecnivnl/rh-matchplanner/ for license 
 * Written by Vince van Domburg (@ecnivnl)
 */
 
 ?>

<html>
<head>
</head>
<body>
<?php

include("config.php");

print "<h1>Aanmelden voor ".$wedstrijd."</h1>";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
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

	if($bezoekers[$knsanummer]['aantal'] < 1)
	{
		print "<b><font style=\"color:red\">Deze bezoeker komt niet voor</font></b><br><br>";
	}
	else
	{
		print "Naam: ".$bezoekers[$knsa]['naam']."<br>";
		$totaalprijs = number_format($bezoekers[$knsanummer]['aantal']*$wedstrijdprijs,2);
		print "Kosten: $totaalprijs<br>";
		print "<a target=\"_blank\" href=\"kwitantie.php?knsa=$knsa\">Kwitantie</a><br>";
		//eventueel aansturen pinautomaat
		
		$i = 0;
		while($i < sizeof($bezoekers[$knsanummer]['diciplines']))
		{
			print "Aanmelden voor dicipline <b>".$bezoekers[$knsanummer]['diciplines'][$i]."</b><br>";
			//eventueel: printen 2 stickers voor op de kaarten (dymo?)
			$i++;
		}
		print "<br><br>";
		$nu = date("Y-m-d H:i:s");
		$current = file_get_contents("checkin.log");
		$current .= $knsanummer.";".$nu."\n";
		file_put_contents("checkin.log", $current);
		
	}
}

print "
	<form action=\"aanmelden.php\" method=\"POST\">
	  KNSA-licentienummer: <input type=\"text\" name=\"knsa\" value=\"\" autofocus><br>
	  <input type=\"submit\" value=\"Aanmelden\">
	</form>
";
$nu = date("Y-m-d H:i:s");
print "Last updated: $nu<br><br><br>
<img width=\"100\" src=\"".$vereniging['logo']."\"><br><br><br><br>
Software by Ecniv Group BV - Vince van Domburg";



?>