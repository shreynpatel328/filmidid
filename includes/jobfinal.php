<?php
 $key = $_GET['key'];
 $post_id=$_GET['post_id'];
 $job_id= $_GET['job_id'];
 $select_id= $_GET['select_id'];
 include ( "../includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							
							if($key==1)
							{
							 $query4checkrej="select * from rejected where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4checkrej=mysql_query($query4checkrej);
							  $rows4checkrej=mysql_num_rows($result4checkrej);
							  
							  $query4checkur="select * from underreview where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4checkur=mysql_query($query4checkur);
							  $rowsur=mysql_num_rows($result4checkur);
							  if($rows4checkrej>0)
							  {
							  echo "you cant select more thatn two options";
                              }
							  else if($rowsur>0)
							 {
							  echo "you cant select more thatn two options";
                              }
							else
							{
                              $query4check="select * from selected where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4check=mysql_query($query4check);
							  $rows=mysql_num_rows($result4check);
							  if($rows>0)
							  {
							  $query4delete="delete from selected where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result=mysql_query($query4delete);
							  }
							  else
							  {							
							  $query4selected="insert into selected values('$post_id','$job_id','$select_id','')";
							  $res=mysql_query($query4selected);
							  }
							}}
							if($key==0)
							{
							  $query4checkrej="select * from rejected where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4checkrej=mysql_query($query4checkrej);
							  $rows4checkrej=mysql_num_rows($result4checkrej);
							  
							  $query4checksel="select * from selected where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4checksel=mysql_query($query4checksel);
							  $rowssel=mysql_num_rows($result4checksel);
							  if($rows4checkrej>0)
							  {
							  echo "you cant select more thatn two options";
                              }
							  else if($rowssel>0)
							 {
							  echo "you cant select more thatn two options";
                              }
							else
							{ 
							 
							  $query4check="select * from underreview where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4check=mysql_query($query4check);
							  $rows=mysql_num_rows($result4check);
							  if($rows>0)
							  {
							  $query4delete="delete from underreview where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result=mysql_query($query4delete);
							  }
							  else
							  {
							  $query4selected="insert into underreview values('$post_id','$job_id','$select_id','')";
							  $res=mysql_query($query4selected);
							  }
							}}
							if($key==-1)
							{
							  $query4checksel="select * from selected where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4checksel=mysql_query($query4checksel);
							  $rows4checksel=mysql_num_rows($result4checksel);
							  
							  $query4checkur="select * from underreview where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4checkur=mysql_query($query4checkur);
							  $rowsur=mysql_num_rows($result4checkur);
							  if($rows4checksel>0)
							  {
							  echo "you cant select more thatn two options";
                              }
							  else if($rowsur>0)
							 {
							  echo "you cant select more thatn two options";
                              }
							else
							{
							 $query4check="select * from rejected where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result4check=mysql_query($query4check);
							  $rows=mysql_num_rows($result4check);
							  if($rows>0)
							  {
							  $query4delete="delete from rejected where post_id='$post_id' and job_id='$job_id' and select_id='$select_id'";
							  $result=mysql_query($query4delete);
							  }
							  else
							  {
							  $query4selected="insert into rejected values('$post_id','$job_id','$select_id','')";
							  $res=mysql_query($query4selected);
							}}}
								
						}
	
	

?>