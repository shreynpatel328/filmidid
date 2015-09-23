<?php

		session_start();
		$eMail=$_SESSION['EMAIL'];
		 $video_link = addslashes( $_POST["video_link"]);
				$title = addslashes( $_POST["title"]);
				$desc = addslashes( $_POST["desc"]);
				$nsfc = addslashes( $_POST["nsfc"]);
	
				
			
				
				
				$date123=date("Y-m-d");
				echo $date123;

						
function cURLdownload($video_link, $file)
	{
	  $ch = curl_init();
	  if($ch)
	  {
		$fp = fopen($file, "w");
		if($fp)
		{
		  if( !curl_setopt($ch, CURLOPT_URL, $video_link) )
		  {
			fclose($fp); // to match fopen()
			curl_close($ch); // to match curl_init()
			return "FAIL: curl_setopt(CURLOPT_URL)";
		  }
		  if( !curl_setopt($ch, CURLOPT_FILE, $fp) ) return "FAIL: curl_setopt(CURLOPT_FILE)";
		  if( !curl_setopt($ch, CURLOPT_HEADER, 0) ) return "FAIL: curl_setopt(CURLOPT_HEADER)";
		  if( !curl_exec($ch) ) return "FAIL: curl_exec()";
		  curl_close($ch);
		  fclose($fp);
		  $s1=1;
		  
		}
		else return "FAIL: fopen()";
	  }
	  else return "FAIL: curl_init()";
	}
	// Download from 'example.com' to 'example.txt'
	echo cURLdownload($video_link, "example.txt");
	
	$myFile = "example.txt";
									$fh = fopen($myFile, 'r');
									$theData = fread($fh, 10000000);
									fclose($fh);
									
									$dur=strpos($theData, 'PT');
						
								
						  if (is_numeric($theData[$dur+2])) {
       $m.=$theData[$dur+2];
    } 
					
						  if (is_numeric($theData[$dur+3])) {
       $m.=$theData[$dur+3];
    } 
					
						  if (is_numeric($theData[$dur+4])) {
       $m.=$theData[$dur+4];
    } 
	
	if (is_numeric($theData[$dur+5])) {
       $s.=$theData[$dur+5];
    } 
					
						  if (is_numeric($theData[$dur+6])) {
       $s.=$theData[$dur+6];
    } 
					
						  if (is_numeric($theData[$dur+7])) {
       $s.=$theData[$dur+7];
    } 
	
	
                                    $fh = fopen($myFile, 'r');
									$theDat = fread($fh, 10000000);
									fclose($fh);
									
									$hd1=strpos($theDat, 'HD');
									if($hd1!=0)
									{
										$hd=1;
									}
										else {
										$hd=0;}
										
										
										 include ( "../includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							
							$query="select id from user_login where eMail='$eMail'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
							$id= MYSQL_RESULT($result,0,"id");
							echo $id;
							
							$query4video="insert into video_details values('','$id','$video_link','$title','category','0','0','00:$m:$s','$date123','$hd','$nsfc','lang','$desc','0')";
							$result4video= MYSQL_QUERY($query4video);
						}
 

?>

