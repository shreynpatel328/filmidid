<?php
session_start();
$id=$_GET['id'];
$details=$_POST['details'];
echo $id;
echo $details;
$eMail=$_SESSION['EMAIL'];
	
		//CONNECTING TO THE DATABASE USER_DATA
				
	
		$host='127.0.0.1';
$us='root';
$ps='';
		$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
			$db='filmidid';
			mysql_select_db($db);
			$query="select id from user_login where eMail='$eMail'";
			$result = MYSQL_QUERY($query);
			$numberOfRows4name = MYSQL_NUM_ROWS($result);
		    echo $id4login= MYSQL_RESULT($result,0,"id");
			
			$query1="insert into messages values('$id4login','$id','$details')";
			$result1=mysql_query($query1);
			
		}
		header("location: ../useroriginal.php?id=$id4login"); 

?>