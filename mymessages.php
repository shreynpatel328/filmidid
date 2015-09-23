<?php
 error_reporting(0);
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
include('includes/mymessages.php');
//footer//



?>
<html>
<body>


</body>
</html>