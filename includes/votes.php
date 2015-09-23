<?php 
  error_reporting(0);
  
		$eMail=$_SESSION['EMAIL'];
       
$blog_id=$_REQUEST['blog_id'];		
$comment_value = $_REQUEST['comment_value'];
$votes=$_REQUEST['votes'];
$comment_id = $_REQUEST['comment_id'];
  include ( "../includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
  $query4vote="UPDATE comment_blog SET votes=$votes+1 WHERE comment_id=$comment_id and blog_id=$blog_id and comment_value='$comment_value'"; 
 
  
  $result1 = MYSQL_QUERY($query4vote);
 }
header("Location: ../dispfor.php?blog_id=$blog_id");
  
   ?>
  