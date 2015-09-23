<?php

session_start();
	    if (!isset($_SESSION['SESSION'])) 
	   		require ( "includes/session_init.php");
	   
	    if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: index.php");
			exit;
	    }
include('includes/functions.php');
include('includes/init.php');
set_title('Test title');
//header//
include('includes/header.php');
echo '<br/><br/><br/><br/>';
//page//
include('includes/jobs_desc.php');
//footer//
include('includes/fin.php');
?>