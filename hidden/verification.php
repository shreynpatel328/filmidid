<?php

				
				session_start();
				if (!isset($_SESSION['SESSION'])) 
	   				require ( "../include/session_init.php");
				
				if ($_SESSION['LOGGEDIN'] == true)
				{
					header("Location: ../profile.php");
					exit;
				}
			
				$name = addslashes( $_POST["name"]);
				$role = addslashes( $_POST["role"]);
				$dob = addslashes( $_POST["dob"]);
				$region = addslashes( $_POST["region"]);
				$country= addslashes( $_POST["country"]);
				$lang = addslashes( $_POST["lang"]);
				$accents = addslashes( $_POST["accents"]);
				$height= addslashes( $_POST["height"]);
				$build = addslashes( $_POST["build"]);
				$best = addslashes( $_POST["best"]);
				$about = addslashes( $_POST["about"]);
				$skill1= addslashes( $_POST["skill1"]);
				$skill2 = addslashes( $_POST["skill2"]);
				$skill3 = addslashes( $_POST["skill3"]);
				$recom = addslashes( $_POST["recom"]);
				$add = addslashes( $_POST["add"]);
				$review = addslashes( $_POST["review"]);
				$eMail = addslashes($_POST["eMail"]);
			    $password = addslashes($_POST["password"]);
				
				
				
				//////VALIDATING NAME & EMAIL ////////////
				
					if(preg_match("/^[a-zA-Z][a-zA-Z ]+$/",$name)==0)
					{	
								$alert=1;
								?>
									<script type="text/javascript" language="javascript"> 
										alert("Invalid Name!");
										window.location = "../index.php"
									</script>
								<?php
								exit;
					}
					else if(preg_match("/^[a-zA-Z0-9_.]+$/", $eMail) == 0)
					{	
								$alert=1;
								?>
									<script type="text/javascript" language="javascript"> 
										alert("Invalid Email Id!");
										window.location = "../index.php"
									</script>
								<?php
								exit;
					}	
							
				//////CHECKING FOR UNIQUE REGNO ////////////
				  
					 include ( "../include/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($alert==0 && $connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							
							$query="select * from user_details where name='$name' and eMail = '$eMail' and verified = 0";
							$result=mysql_num_rows(mysql_query($query));
							if($result>0)
							{	
								$alert=1;
								?>
									<script type="text/javascript" language="javascript"> 
										alert("Account with same name & Email Id already exists. Verify to continue.");
										window.location = "index.php"
									</script>
								<?php
								exit;
							}
							else
							{
								$query="select * from user_details where eMail = '$eMail' and verified = 1";
								$result=mysql_num_rows(mysql_query($query));
								if($result>0)
								{
									$alert=1;
									?>
										<script type="text/javascript" language="javascript"> 
											alert("Account with same Email Id already exists.\nYou cannot make more than one account  !");
											window.location = "index.php"
										</script>
									<?php
									exit;
								}
								else
								{
								$query="select * from user_details where eMail='$eMail' and verified = 0";
								$result=mysql_num_rows(mysql_query($query));
								if($result>0)
								{
								
									
									$query="delete from user_details where eMail='$eMail'";
									$result=mysql_query($query);
									$query="insert into user_login values('','$eMail','$password')";
									$result=mysql_query($query);
									$query="insert into user_details values('$name','$eMail','$password','0','$role','$dob','$region' ,'$country','$lang','$accents','$height','$build','$best','$about','$skill1','$skill2','$skill3','$recom','$add','$review','')";
									
									$result=mysql_query($query);
									$ver=intval($eMail).$name.intval($password);
									// ENCRYPT HERE
									
									
									 
									$ver = md5($ver);
									//$ver= rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
 
 
									
									
									$link="https://www.filmidid.com/verify.php?eMail=".$eMail."&ver=".$ver;
									mysql_close($connect);
									
									
									
									$to = $eMail;
									$subject = " Verification Mail";
									$message = " Verification Mail :
-----------------------------------------------------------
CONFIRM BY VISITING THE LINK BELOW:
	
".$link."
	
Click the link above to give us permission to send you
information.  It's fast and easy!  If you cannot click the
full URL above, please copy and paste it into your web
browser.

-----------------------------------------------------------
If you have not registered, simply ignore this message.

Thank you,


".date("H:i:s ")."
URL: http://www.filmidid.com";
									$from = "Verification@filmidid.com";
									$headers = "From:" . $from;
									mail($to,$subject,$message,$headers);
									
									
									$_SESSION['LOGGEDIN']=true;
									$_SESSION['EMAIL']=$eMail;
									@session_register('LOGGEDIN','EMAIL');
									
								}
								else
								{
								$query="select * from user_details where eMail='$eMail' and verified = 1";
								$result=mysql_num_rows(mysql_query($query));
								
								
								
								if($result>0)
								{
									$_SESSION['EXST']=true;
									$_SESSION['EMAIL']=$eMail;
									session_register('EXST','EMAIL');
									header("Location: index.php");
									exit;
								}
								else
								{
								
								$query="delete from user_details where eMail='$eMail'";
									$result=mysql_query($query);
									$query="insert into user_login values('','$eMail','$password')";
									$result=mysql_query($query);
									
									$query="insert into user_details values('$name','$eMail','$password','0','$role','$dob','$region' ,'$country','$lang','$accents','$height','$build','$best','$about','$skill1','$skill2','$skill3','$recom','$add','$review','')";
									$result=mysql_query($query);
									$ver=intval($eMail).$name.intval($password);
									// ENCRYPT HERE
									
									
									 
									$ver = md5($ver);
									//$ver= rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
 
 
									
									
									$link="https://www.filmidid.com/verify.php?eMail=".$eMail."&ver=".$ver;
									mysql_close($connect);
									
									
									
									$to = $eMail;
									$subject = " Verification Mail";
									$message = " Verification Mail :
-----------------------------------------------------------
CONFIRM BY VISITING THE LINK BELOW:
	
".$link."
	
Click the link above to give us permission to send you
information.  It's fast and easy!  If you cannot click the
full URL above, please copy and paste it into your web
browser.

-----------------------------------------------------------
If you have not registered, simply ignore this message.

Thank you,

".date("H:i:s ")."
URL: http://www.filmidid.com";
									$from = "Verification@filmidid.com";
									$headers = "From:" . $from;
									mail($to,$subject,$message,$headers);
									
									
									$_SESSION['LOGGEDIN']=true;
									$_SESSION['EMAIL']=$eMail;
									@session_register('LOGGEDIN','EMAIL');
								}
								
								}
								}
							}	
						}
						else if($alert==0)
						{ 
						 	$alert=1;
								?>
									<script type="text/javascript" language="javascript"> 
										alert("Unabale to connect to database. Try Later !");
										window.location = "index.php"
									</script>
								<?php
								exit;
						 }
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="../profile.php" method="post">
<a><input name="" type="submit"  /></a>
</form>

</body>
</html>
