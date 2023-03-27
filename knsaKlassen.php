<?php

require_once('config.php');

function removeTags($text)
{
	$text = str_replace("<td>","",$text);
	$text = str_replace("</td>","",$text);
	return trim($text);
	
}

$dargs=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false),"http"=>array('timeout' => 60, 'user_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/3.0.0.1'));

$response = file_get_contents($knsaurl, false, stream_context_create($dargs));

$apx = strpos($response,"table-condensed");
$response = substr($response,$apx);
$apx = strpos($response,"tbody");
$response = substr($response,$apx);
$apx = strpos($response,"<");
$response = substr($response,$apx);
$response = substr($response,0,strpos($response,"footer"));

$arr = explode("\n",$response);

$i = 0;
while($i < sizeof($arr))
{
	if(strpos($arr[$i],'tr') != 0 && strpos($arr[$i],'/tr') == 0 )
	{
		$licentie = str_replace('<td align="right">',"", $arr[$i+1]);
		$licentie = trim(str_replace('</td>',"", $licentie));
		if(true)
		{
			$knsaregister[$licentie]['5s'] = removeTags($arr[$i+2]);
			$knsaregister[$licentie]['KKP'] = removeTags($arr[$i+3]);
			$knsaregister[$licentie]['LPO'] = removeTags($arr[$i+4]);
			$knsaregister[$licentie]['LP'] = removeTags($arr[$i+5]);
			$knsaregister[$licentie]['MKL'] = removeTags($arr[$i+6]);
			$knsaregister[$licentie]['MKZ'] = removeTags($arr[$i+7]);
			$knsaregister[$licentie]['MP'] = removeTags($arr[$i+8]);
			$knsaregister[$licentie]['OSP'] = removeTags($arr[$i+9]);
			$knsaregister[$licentie]['SEPL'] = removeTags($arr[$i+10]);
			$knsaregister[$licentie]['SEPZ'] = removeTags($arr[$i+11]);
			$knsaregister[$licentie]['SPPL'] = removeTags($arr[$i+12]);
			$knsaregister[$licentie]['SPPZ'] = removeTags($arr[$i+13]);
			$knsaregister[$licentie]['STP'] = removeTags($arr[$i+14]);
			$knsaregister[$licentie]['VP'] = removeTags($arr[$i+15]);
		}		
		
	}
	$i++;
}


// print_r($knsaregister);


?>