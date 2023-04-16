<?php

/* Copyright (C) Ecniv Group BV
 * Use by any KNSA-licensed organisation permitted (only)
 * See https://github.com/ecnivnl/rh-matchplanner/ for license 
 * Written by Evert van Harten (@evharten)
 */

require_once("functions.php");

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

print_r($classArray['SPKKP']);
?>