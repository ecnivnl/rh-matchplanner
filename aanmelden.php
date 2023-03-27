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
		
		$i = 0;
		while($i < sizeof($bezoekers[$knsanummer]['diciplines']))
		{
			print "Aanmelden voor dicipline <b>".$bezoekers[$knsanummer]['diciplines'][$i]."</b><br>";
			$i++;
		}
		print "<br><br>";
	}
}


		print "
		
		<form action=\"aanmelden.php\" method=\"POST\">
		  KNSA-licentienummer: <input type=\"text\" name=\"knsa\" value=\"\" autofocus><br>
		  <input type=\"submit\" value=\"Aanmelden\">
		</form>
		
		<img width=\"100\" src=\"".$vereniging['logo']."\">
		";



?>