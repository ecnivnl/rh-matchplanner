<?php


function removeTags($text)
{
	$text = str_replace("<td>","",$text);
	$text = str_replace("</td>","",$text);
	return trim($text);
}




?>