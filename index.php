<?php
 
session_start();
	    if (!isset($_SESSION['SESSION'])) 
	   		require ( "includes/session_init.php");
	   

include('includes/functions.php');
include('includes/init.php');
set_title('Test title');
//header//
include('includes/header.php');
echo '<br/><br/><br/><br/><br/>';
//page//
include('includes/main.php');

?>
