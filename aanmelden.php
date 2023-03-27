<?php
include("config.php");

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
			if(trim($arr[20]) == "KKP")
			{
				$bezoeker[$knsa]['KKP'] = 1;
			}
			else if(trim($arr[20]) == "GKP")
			{
				$bezoeker[$knsa]['GKP'] = 1;
			}
				
		 
		   $i++;
		}
		fclose($file);
	}

	if($bezoekers[$knsanummer]['aantal'] < 1)
	{
		print "deze bezoeker komt niet voor";
	}
	else
	{
		$totaalprijs = $bezoekers[$knsanummer]['aantal']*$wedstrijdprijs;
		print "Kosten: $totaalprijs<br>
		Aanmelden binnen Matchmaker<br>
		
		
		";
	}
}


		print "
		<html>
		<head>
		</head>
		<body>
		<form action=\"aanmelden.php\" method=\"POST\">
		  KNSA-licentienummer: <input type=\"text\" name=\"knsa\" value=\"\" autofocus><br>
		  <input type=\"submit\" value=\"Submit\">
		</form>
		";



?>