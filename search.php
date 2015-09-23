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
?>
<script src="scripts/jquery-ui.js"></script>
<link href="styles/jquery-ui-1.9.2.custom.css" rel="stylesheet">
<?php
set_title('Test title');
//header//
include('includes/header.php');
echo '<br/><br/><br/>';
//page//
$u='';
$u=$_GET['url'];
if($u=='film')
{
include('includes/search_film.php');
}
elseif($u=='job')
{
include('includes/search_job.php');
}
elseif($u=='forum')
{
include('includes/search_forum.php');
}

?>
