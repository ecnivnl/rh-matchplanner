<?php

/* Copyright (C) Ecniv Group BV
 * Use by any KNSA-licensed organisation permitted (only)
 * See https://github.com/ecnivnl/rh-matchplanner/ for license 
 * Written by Vince van Domburg (@ecnivnl)
 */
 

error_reporting(0);
$knsaCat = array();
$i = 0;
if ($file = fopen("baanplanner_export.csv", "r")) {
	while(!feof($file)) {
		$line = fgets($file);
		$arr = explode(";",$line);
		$arr[7] = trim($arr[7]);
		if($i != 0 && $arr[7] != "0000-00-00")
		{
			// $knsaCat[ltrim($arr[16])] = $arr[7];
			if($arr[7] > "1968-03-26")
			{
				$knsaCat[ltrim($arr[16])] = "Senioren";
			}
			else
			{
				$knsaCat[ltrim($arr[16])] = "Veteranen";
			}
			


		}
	$i++;
	}
    fclose($file);
}   
// print_r($knsaCat);
?>