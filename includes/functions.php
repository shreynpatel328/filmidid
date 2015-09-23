<?php

function set_title($str)
{
 echo "<title>".$str."</title></head><body>";	
}

function user_login()
{
	$e=$_POST['u'];
	$p=$_POST['p'];
	
	
	echo $e.$p;
}
?>