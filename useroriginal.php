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
include('includes/useroriginal.php');
//footer//



?>
<html>
<body>
<form method="get" id="signin" action="hidden/logout.php">

  logout
  <input type="submit" name="Submit2" value="Submit" />

</form>

</body>
</html>