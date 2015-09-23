<?php 
$job_id=$_GET['job_id'];

  $id=$_GET['id'];
  $id4login=$_GET['id4login'];
  
  
 include ( "../includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);			
							
														$query="select * from apply_job where post_id='$id' and job_id='$job_id' and apply_id='$id4login'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
					     	
							 if(@$numberOfRows4name==0)
							 {
												$query4insert="insert into apply_job values('$job_id','$id','$id4login')";
											   $result4insert=mysql_query($query4insert);
											   
											   $query4update="update jobs set applied=applied+1 where job_id='$job_id'";
											   $result4update=mysql_query($query4update);
						
							 	}
							 
					  }			
 ?>