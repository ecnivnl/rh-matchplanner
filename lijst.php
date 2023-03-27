<?php 


$i = 0;
if ($file = fopen("lijst.csv", "r")) {
	while(!feof($file)) {
        $line = fgets($file);
       $arr = explode(";",$line);
// print_r($arr);	  
	  if($i != 0)
	   {
			
		$arr[4] = str_replace(" ","",$arr[4]);
		$arr[3] = str_replace(" ","",$arr[3]);
		$arr[20] = str_replace(" ","",$arr[20]);
		$arr[5] = ltrim(str_replace("&eacute","e",$arr[5]));
		
		$arr[16] = str_replace(" ","",$arr[16]);
		// print "<a href=\"pdf.php?baan=".$arr[2]."&dicipline=".$arr[20]."&knsa=".$arr[16]."&tijd=".$arr[3]."&achternaam=".$arr[5]."&voorletter=".$arr[4]."\">".$arr[4]." ".$arr[5]." ".$arr[20]."</a><br>";
		print "wget -O ".$arr[16]."-".$arr[20].".pdf \"https://ecniv.dev/robinhood/pdf.php?baan=".$arr[2]."&dicipline=".$arr[20]."&knsa=".$arr[16]."&tijd=".$arr[3]."&achternaam=".$arr[5]."&voorletter=".$arr[4]."\"\r\n";

	   }
	   $i++;
    }
    fclose($file);
}   
?> 
