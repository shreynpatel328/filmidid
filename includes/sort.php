<?php 
      session_start();
	   $value = $_GET['value'];
      if($value==1)
	 { 
	  if($_SESSION['DATEADDED']==1)
	  $_SESSION['DATEADDED']=0;
	  else
	  $_SESSION['DATEADDED']=1;
	  @session_register('DATEADDED');
	  header("location: ../search_job.php");
}
	   else if($value==2)
	 {  
	 	if($_SESSION['POPULAR']==1)
	    $_SESSION['POPULAR']=0;
		else
		$_SESSION['POPULAR']=1;
        @session_register('POPULAR');
		header("location: ../search_job.php");
     }
	 
	 else if($value==3)
	 { 
	  if($_SESSION['RATING']==1)
	  $_SESSION['RATING']=0;
	  else
	  $_SESSION['RATING']=1;
	  @session_register('RATING');
	  header("location: ../search_videos.php");
	  }
	  else if($value==4)
	 {  
	 	if($_SESSION['POPULAR4VIDEO']==1)
	    $_SESSION['POPULAR4VIDEO']=0;
		else
		$_SESSION['POPULAR4VIDEO']=1;
        @session_register('POPULAR4VIDEO');
		header("location: ../search_videos.php");
     }
	

?>