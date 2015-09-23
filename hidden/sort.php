<?php

 			session_start();
		
		if (!isset($_SESSION['SESSION'])) 
			require ( "../include/session_init.php");

		while(list($key,$value)=each($_REQUEST))
			$_SESSION['s'][$key]=$value;
		
		header("Location: ../<>.php");
		exit;
		
?>