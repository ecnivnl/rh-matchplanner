<?php

/* Copyright (C) Ecniv Group BV
 * Use by any KNSA-licensed organisation permitted (only)
 * See https://github.com/ecnivnl/rh-matchplanner/ for license 
 * Written by Vince van Domburg (@ecnivnl)
 */
 
 
 // Todo: ook dicipline
 ?>
 
<html>
<head>
	<meta http-equiv="Refresh" content="10">
</head>
<body><PRE>
<?php
include('config.php');



if ($file = fopen("checkin.log", "r"))
{
	while(!feof($file))
	{
        $line = fgets($file);
       if($line != "\n")
	   {
		   $aanwezig[] = trim($line);
	   }
	}
}
$i = 0;
$j = sizeof($aanwezig)-1;
while($i < sizeof($aanwezig))
{
	if($aanwezig[$j] != "")
	{
		print $aanwezig[$j]."\r\n";
	}
	$i++;$j--;
}


?> 


