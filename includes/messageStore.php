<?php 
$selmes=$_POST['selectdetails'];
$urmes=$_POST['urdetails'];
$rejmes=$_POST['rejdetails'];
$job_id=$_POST['job_id'];

 include ( "../includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
if($selmes!="")
{
$query4selmes="update selected set message='$selmes' where job_id='$job_id'";

$result4selmes=mysql_query($query4selmes);

}
if($urmes!="")
{

$query4urmes="update underreview set message='$urmes' where job_id='$job_id'";
$result4urmes=mysql_query($query4urmes);

}
if($rejmes!="")
{

$query4rejmes="update rejected set message='$rejmes' where job_id='$job_id'";
$result4rejmes=mysql_query($query4rejmes);

}

}
header("location: ../jobs_desc.php?job_id=$job_id");
?>