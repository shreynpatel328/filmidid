<?php

		session_start();
		$eMail=$_SESSION['EMAIL'];
		
		
 include ( "../includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							
							$query="select id from user_login where eMail='$eMail'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
							$id4login= MYSQL_RESULT($result,0,"id");
						
							$id=$_GET['id'];
							$job_id=$_GET['job_id'];
							
							if($id4login==$id)
							{
							header("location: ../jobs_desc.php?job_id=$job_id");
							}
							else
							header("location: ../jobsother.php?job_id=$job_id&id=$id");
					
						}
?>