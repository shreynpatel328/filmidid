<?php		

$search=$_SESSION['SEARCH'];
$date=$_SESSION['DATEADDED'];
$pop=$_SESSION['POPULAR'];

$append="";
if($date==1)
{
$append=",curr_date";
}


$pagenum=@$_GET["pagenum"];
 
	   if (!isset($_SESSION['SESSION'])) 
	   		require ( "includes/session_init.php");
	   
	    if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: index.php");
			exit;
	    }
		
		$eMail=$_SESSION['EMAIL'];
	
		
 include ( "includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							
							if (!(isset($pagenum))) 
							$pagenum = 1; 
							$data = mysql_query("SELECT * FROM jobs") or die(mysql_error()); 
						    $rows = mysql_num_rows($data); 
							
							$query="select id from user_login where eMail='$eMail'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
							$id4login= MYSQL_RESULT($result,0,"id");
							
								
					     	
 							
							 
							$page_rows = 4;
							$last = ceil($rows/$page_rows); 
							 
							  if ($pagenum < 1) 
							 $pagenum = 1; 
							elseif ($pagenum > $last) 
							 $pagenum = $last; 

 							
								 $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
 								
								$data_p = mysql_query("SELECT * FROM jobs order by applied$append desc $max") or die(mysql_error());
								 
								$rows4final=mysql_num_rows($data_p);
								
 


							
						}

 ?>
<script>
$("#float_nav").hide();

</script>

<div class="search_job">
		<div class="sort_by">
		  <table width="968" border="0">
          <tr>
            <td width="543" align="left" valign="top">Sort By : <a href="includes/sort.php?value=1" style="color:#00ff99">  Date Added </a>, <a href="includes/sort.php?value=2" style="color:#00ff99">Popularity </a></td>
            <td width="415" align="left" valign="top" ><?php

 if ($pagenum == 1) 

 {

 } 

 else 

 {

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=1' style='color:#00ff99'>  <<-First</a> ";

 echo " ";

 $previous = $pagenum-1;

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous' style='color:#00ff99'> <-Previous</a> ";

 }
  echo " "; echo " "; echo " ";
echo "Page: <a href='{$_SERVER['PHP_SELF']}?pagenum=$pagenum' style='color:#2be'>$pagenum</a>....<a href='{$_SERVER['PHP_SELF']}?pagenum=$last' style='color:#2be'>$last</a> ";
 echo " "; echo " "; echo " ";
 

if ($pagenum == $last) 
{
 } 
else {
$next = $pagenum+1;
echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$next' style='color:#00ff99'>Next -></a> ";
echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$last' style='color:#00ff99'>Last ->></a> ";
} 

		?></td>
          </tr>
        </table>
		</div>
	<?php	 while($info = mysql_fetch_array( $data_p )) 
  { 
		

		?><div class="container">
		 	<table border="0">
			<tr>
			<td width="170" align="left" valign="top">
			<div class="photo_disp">			</div>
			</td>
			<td width="915" align="left" valign="top">
			<div class="job_disp">	
				 <hd1> <a href="includes/jobcheck.php?job_id=<?php echo  $info['job_id'];?>&id=<?php echo  $info['id']; ?>" style="color:#2be"><?php echo $info['jobTitle']; ?></a></hd1><br/>   
                 <div >
						<span class="det3">
			
						Paid/Unpaid Job:   <?php if($info['paid']=="on") echo "Paid"; else echo "No Payment"; ?> <br />
						Date Added : <?php echo $info['curr_date']; ?><br/>
						No Of Applied:  <?php 
 echo $info['applied'];									
										   ?>	 
						<br/>
						
						</span>
						<br/>
					   
						<hd2> Name: </hd2><br/>
						<hd2>Company Name: <?php echo $info['companyName']; ?> </hd2><br/>
						<hd2> Company Profile:  <?php echo $info['companyProfile']; ?></hd2><br/>
						Details:
            		<p>
         <?php echo $info['details']; ?>
         		   </p>
					<br />	<hd2> Location: <?php echo $info['location'].",".$info['country']; ?></hd2><br/>
						<hd2> Category:<?php echo $info['categories'];?> </hd2>
						
						
						
				 </div>	
			</div>
			</td>
			</tr>
			</table>
		</div>
		<?php }?>
		
</div>