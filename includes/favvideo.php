<?php		

$search=$_SESSION['SEARCH'];
$rating=$_SESSION['RATING'];
$pop4video=$_SESSION['POPULAR4VIDEO'];

$append="";
if($pop4video==4)
{
$append=", views ";
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
							$query="select id from user_login where eMail='$eMail'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
							$id4login= MYSQL_RESULT($result,0,"id");
							if (!(isset($pagenum))) 
							$pagenum = 1; 
							$data = mysql_query("SELECT * FROM video_details d,fav_videos f where d.video_id=f.video_id and f.user_id='$id4login'") or die(mysql_error()); 
						    $rows = mysql_num_rows($data); 
							
							
							
								
					     	
 							
							 
							$page_rows = 5;
							$last = ceil($rows/$page_rows); 
							 
							  if ($pagenum < 1) 
							 $pagenum = 1; 
							elseif ($pagenum > $last) 
							 $pagenum = $last; 

 							
								 $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
 								
								$data_p = mysql_query("SELECT * FROM video_details d,fav_videos f where d.video_id=f.video_id and f.user_id='$id4login' order by Rating$append desc $max") or die(mysql_error());
								 
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
           
            <td width="415" align="right" valign="top" ><?php

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
		

		?><div class="video_container">
		 	<table border="0">
			<tr>
			<td width="170" align="left" valign="top">
			<div class="video_disp">	<a href="watch.php?video_id=<?php echo  $info['video_id'];?>&url=<?php echo  $info['video_link']; ?>" style="color:#2be"><iframe width="320" height="200" src="<?php echo $info['video_link']; ?>" frameborder="0" allowfullscreen></iframe>	</a>	</div>
			</td>
			<td width="915" align="left" valign="top">
			<div class="video_details_disp">	
				 <hd1> <a href="watch.php?video_id=<?php echo  $info['video_id'];?>&url=<?php echo  $info['video_link']; ?>" style="color:#2be"><?php echo $info['title']; ?></a></hd1><br/>   
                 <div >
						<span class="det3">
			
						Rating:   <?php echo $info['rating']; ?> <br />
						No of views : <?php echo $info['views']; ?><br/>
						No Of fav:  <?php 
								
										   ?>	 
						<br/>
						
						</span>
						<br/>
					   
						<hd2> Genre:<?php echo $info['category'];?> </hd2><br/>
						<hd2>Added Date: <?php echo $info['date']; ?> </hd2><br/>
						<hd2> Added By:  <?php echo "LEFT"; ?></hd2><br/>
				<hd2>	Run Time: <?php echo $info['length']; ?></hd2><br />
					<br />	<hd2><?php if($info['hd']==1) echo "HD AVAIL"; else echo "NOT AVAIL IN HD"; ?> </hd2><br/>
						<hd2><?php if($info['nsfc']=="on") echo " NSFC"; ?> </hd2>
						
						
						
				 </div>	
			</div>
			</td>
			</tr>
			</table>
		</div>
		<?php }?>
		
</div>