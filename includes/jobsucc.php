<?php
header("Location: ../upload.php");
		
		session_start();
		$eMail=$_SESSION['EMAIL'];
       
       	        $job_title = addslashes( $_POST["job_title"]);
				$cmp_name = addslashes( $_POST["cmp_name"]);
				$cmp_pro = addslashes( $_POST["cmp_pro"]);
				$country = addslashes( $_POST["country"]);
				$state = addslashes( $_POST["state"]);
				$d = addslashes( $_POST["d"]);
				$paid = addslashes( $_POST["paid"]);
				$amt = addslashes( $_POST["amt"]);
				$expr = addslashes( $_POST["expr"]);
				$details = addslashes( $_POST["details"]);
				
				echo $job_title;
				echo $cmp_name;
				echo $cmp_pro;
				echo $d;
				$date123=date("Y-m-d");
				echo $date123;
		/*	
					
	include ( "../includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							
							$query="select id from user_login where eMail='$eMail'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
							$id= MYSQL_RESULT($result,0,"id");
							echo $id;
							
							$query4blog="insert into jobs values('','$id','$job_title','$cmp_name','$cmp_pro','$country','$state','$d','','$paid','$amt','$expr','$details','','$date123','0')";
							$result4blog= MYSQL_QUERY($query4blog);
							
							*/
						

						



?>