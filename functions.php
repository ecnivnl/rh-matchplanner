<?php


function removeTags($text)
{
	$text = str_replace("<td>","",$text);
	$text = str_replace("</td>","",$text);
	$text = str_replace(" ","",$text);
	$text = ltrim($text);
	$text = rtrim($text);
	
	if($text == "A" || $text == "B" || $text == "C" || $text == "H" || $text == "Va" || $text == "Vb" || $text == "Vc" || $text == "Vh" )
	{	
		return $text;
	}
	else
	{
		return "H";
	}
}


?>