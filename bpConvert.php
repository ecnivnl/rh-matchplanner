dag;datum;baan;serie;voorletter;achternaam;vernummer;vernaam;knsa;klasse;;
<?php

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
			$regel['vernaam'] = trim($arr[15]);
			$regel['knsa'] = trim($arr[16]);
			$knsa = $regel['knsa'];

			if(trim($arr[20]) == "KKP")
			{
				// print "KKP - $knsa";
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
			
			
			
			// print_r($regel);
			print "".$regel['dag'].";".$regel['datum'].";".$regel['baan'].";".$regel['serie'].";".$regel['voorletter'].";".$regel['achternaam'].";".$regel['vernummer'].";".$regel['vernaam'].";".$regel['knsa'].";".$regel['klasse'].";;\r\n";
			
		
		

	   }
	   $i++;
    }
    fclose($file);
}   
?> 


