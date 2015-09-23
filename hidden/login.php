<?php
  header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	    header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
      
	    session_start();
	   
	    if (!isset($_SESSION['SESSION'])) 
	   		require ("../includes/session_init.php");
	
	    if ($_SESSION['LOGGEDIN'] == true)
		{
				
		 include ( "../includes/data.php");	
		$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
		
			$db='filmidid';
			mysql_select_db($db);
			
			$query="select id from user_login where eMail='$eMail' and password='$password'";
			$result=@mysql_query($query);
			$id=@mysql_result($result,0,"id");
			header("Location: ../useroriginal.php?id=$id");
			exit;
	    }
		}
		
	
			$eMail = addslashes($_POST["eMail"]);
			$password = addslashes( $_POST["password"]);
	
			
		
		
			
			//CONNECTING TO THE DATABASE USER_DATA
			
		 include ( "../includes/data.php");	
		$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
		
			$db='filmidid';
			mysql_select_db($db);
			
			$query="select id from user_login where eMail='$eMail' and password='$password'";
            
			$result2=mysql_query($query);
            $rows=mysql_num_rows($result2);
            
			$id=mysql_result($result2,0,"id");
			

			
			if(@mysql_num_rows($result2) >0)
			{    
				 if($remem==true)
				 {
					 @setcookie("remem",true,time()+(60*60*24*7),"/",'filmidid.com');
					 @setcookie("eMail",$eMail,time()+(60*60*24*7),"/",'filmidid.com');
				 }				
				
				 $_SESSION['LOGGEDIN']=true;
				 $_SESSION['EMAIL']=$eMail;
				 @session_register('LOGGEDIN','EMAIL');
			      header("Location: ../useroriginal.php?id=$id");
				 exit;
			}
			else
			{
				 $_SESSION['VER']=true;	
				 @session_register('VER');
				header("Location: ../index.php");
				 exit;
			}			
				mysql_close($connect);
		}
			
?>
