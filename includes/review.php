<?php

$video_id=$_GET["video_id"];
$id4login=$_GET["id"];
$video_link=$_GET["video_link"];
$review=$_POST["review"];



 				
	include ( "data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							
							$query4review="insert into video_review values('$video_id','$id4login','$review')";
							$result4review= MYSQL_QUERY($query4review);
							header("location: ../watch.php?video_id=$video_id&url=$video_link");
					
							
						}

?>