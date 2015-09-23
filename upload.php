<?php

session_start();
	    if (!isset($_SESSION['SESSION'])) 
	   		require ( "includes/session_init.php");
	   
	 //   if ($_SESSION['LOGGEDIN'] != true)
	//	{
///			header("Location: index.php");
	//		exit;
	  //  }
include('includes/functions.php');
include('includes/init.php');
?>
<link href="styles/jquery-ui-1.9.2.custom.css" rel="stylesheet">
<script type= "text/javascript" src = "scripts/countries.js"></script>
<?php
set_title('Test title');
//header//
include('includes/header.php');
echo '<br/><br/><br/><br/><br/>';
//page//
include('includes/upload.php');
//footer//

?>
