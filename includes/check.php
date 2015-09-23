<?php 
   session_start();
   $value=	$_SESSION['VALUE'];
if($value=="")
$value=1;
$search=$_GET['search'];
  $_SESSION['SEARCH']=$search;
     @session_register('SEARCH');
$_SESSION['VALUE']="";
echo $value;
if($value==1)
{
	header("location: ../search_videos.php");
}
if($value==2)
{
	header("location: ../search_profiles.php");
}

if($value==3)
{
	header("location: ../search_job.php");
}
if($value==4)
{
	header("location: ../search_forum.php");
}

?>