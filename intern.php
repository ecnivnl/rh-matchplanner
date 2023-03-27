<?php 

include('config.php');

if($_GET['type'] == "download")
		{
			print "<PRE>";
		}
		
$i = 0;
if ($file = fopen("intern.csv", "r")) {
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
		if($_GET['type'] == "download")
		{
			print "wget -O ".$arr[2]."-".$arr[3].".pdf \"$downloadurl/pdf.php?baan=&dicipline=".$arr[3]."&knsa=".$arr[2]."&tijd=".$arr[3]."&achternaam=".$arr[1]."&voorletter=\";\r\n";
		}
		else
		{
			print "<a href=\"pdf.php?baan=&dicipline=".$arr[3]."&knsa=".$arr[2]."&tijd=".$arr[3]."&achternaam=".$arr[1]."&voorletter=\"\">".$arr[2]." ".$arr[5]." ".$arr[20]."</a><br>";

		}

		// 
	   }
	   $i++;
    }
    fclose($file);
}   
?> 
