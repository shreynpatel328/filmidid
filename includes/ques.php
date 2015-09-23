<?php

		session_start();
		$eMail=$_SESSION['EMAIL'];
       	 $topic_tags = addslashes( $_POST["topic"]);
				$ques = addslashes( $_POST["ques"]);
				$details = addslashes( $_POST["details"]);
					
				
				$date123=date("Y-m-d");
				echo $date123;
				echo  $topic_tags;
							
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
							
							$query4blog="insert into blog_details values('','$id','$date123','$ques','$topic_tags','$details','languages')";
							$result4blog= MYSQL_QUERY($query4blog);
							header("Location: ../upload.php");
						}


						



?>