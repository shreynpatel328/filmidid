<?php
 
session_start();
	    if (!isset($_SESSION['SESSION'])) 
	   		require ( "includes/session_init.php");
	   
	    if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: index.php");
			exit;
	    }
	   
$blog_id=$_REQUEST['ques'];		
$comment_value = $_REQUEST['comment_value'];
$eMail=$_SESSION['EMAIL'];
$host='127.0.0.1';
$us='root';
$ps='';	
	
		$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
			$db='filmidid';
			mysql_select_db($db);
			
							$query1="select id from user_login where eMail='$eMail'";
							$result1 = MYSQL_QUERY($query1);
							$numberOfRows4name = MYSQL_NUM_ROWS($result1);
							echo $id= MYSQL_RESULT($result1,0,"id");
							
						 $query4insertcomm="insert into comment_blog values('$id','$comment_value','0','$blog_id')";
						 $result4insertcomm=mysql_query($query4insertcomm);
 }
  header("Location: ../dispfor.php?blog_id=$blog_id");

?>