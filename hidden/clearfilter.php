<?php

 		session_start();
		
		if (!isset($_SESSION['SESSION'])) 
			require ( "../../include/session_init.php");

			$_SESSION['f']['name']=NULL;
			$_SESSION['f']['rating']=NULL;
			$_SESSION['f']['deliveryPoint']=NULL;
			$_SESSION['f']['deliveryTime']=NULL;
			$_SESSION['f']['category']=NULL;
			$_SESSION['f']['veg']=NULL;
			$_SESSION['s']['sortBy']=NULL;
			$_SESSION['s']['sortOrder']=NULL;
			$_SESSION['s']['equal']=NULL;
			
		
		header("Location: ../eat.php");
		exit;
		
?>