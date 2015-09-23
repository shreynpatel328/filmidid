<?php 
     $eMail=$_SESSION['EMAIL'];
 				
	include ( "data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							$query4topvideos="select * from video_details where 1 order by rating desc ";
							$result4topvideos=mysql_query($query4topvideos);
							$rows4topvideos=mysql_num_rows($result4topvideos);
					    }

/*    //////////////**************************    This is for the random in top  videoes                 *******************/////////////*/

                             $i=0;	
								$clue=array();
								if($rows4topvideos>30)
								$rows4topvideos=30;
								while($i<$rows4topvideos)
								{
									if($i<=9)
									{
										$i="0".$i;
										
									}
									$thisvideoId=mysql_result($result4topvideos,$i,"video_id");
									$clue[$i]=$thisvideoId;
									$i++;
								}
							
								for($i=0;$i<30;$i++)
							    {
								    $visit[$i]=0;
								}
								
							
			//////////////   Algorithm for getting the top videos ////////////////////////////// 					
								
						for($j=0;$j<8;$j++)
						{
						$ran = '';
						
						$characters='012';
						$characters1='0123456789';
							for ($i = 0; $i < 1; $i++) 
							 {
								  $ran = $characters[rand(0, strlen($characters) - 1)];
								  $digit=($ran*10)+$characters1[rand(0, strlen($characters1) - 1)];
     						 }
							
							 
									if($digit<=9)
									{
										$digit="0".$digit;
										
									}
							
									$k=0;
									$s=0;
							
									$z=0;
									for($i=0;$i<30;$i++)
									{
										
										if($z==$digit)
										{
										    if($i<=9)
												{
													$k="0".$i;
													
												}
												else
												$k=$i;
												
										    $randomId[]=$clue[$k];
											$visit[$i]=1;
											break;
										}
										else if($visit[$i]!=1)
										{
											$z++;
										}
										else 
										$s++;
										
										if($s+$z==29)
										$i=0;
									}
								
							
			 } 
			
			//////////////   Algorithm for getting the top videos ////////////////////////////// 					
			
/*    //////////////**************************    This is for the random in top  videoes                 *******************/////////////*/

?>
<div class="main home">
<div class="listblock" id="v">
<div class="listblock1">
<table width="1000" height="250" cellpadding="0" cellspacing="4">
<th colspan="4" align="left">
<a class="a_heading">Top videos</a>
<a class="viewall" href="search_videos.php">VIEW ALL</a><br/><br/>
	
	                     
</th>
<tr valign="top">
<?php for($i=0; $i<4; $i++)
{
	$videoId=$randomId[$i];
	
	$query4print="select * from video_details where video_id='$videoId'";
	$result4print=mysql_query($query4print);
	$thisvideo_link=mysql_result($result4print,0,"video_link");
	$thisvideo_id=mysql_result($result4print,0,"video_id");
	$thistitle=mysql_result($result4print,0,"title");
	
	
 ?>

<td><a href="watch.php?video_id=<?php echo $thisvideo_id; ?>&url=<?php echo $thisvideo_link; ?>" style="color:#2be"><?php  ?>
<div class="vdo_thumb">
<iframe width="240" height="150" src="<?php echo $thisvideo_link; ?>" frameborder="0" allowfullscreen></iframe>
</div>
</a>
</td>
<?php 

}
?>
</tr> 
<tr>
<?php for($i=4; $i<8; $i++)
{
	$videoId=$randomId[$i];
	
	$query4print="select * from video_details where video_id='$videoId'";
	$result4print=mysql_query($query4print);
	$thisvideo_link=mysql_result($result4print,0,"video_link");
	$thisvideo_id=mysql_result($result4print,0,"video_id");
	
	
 ?>
<td>  <a href="watch.php?video_id=<?php echo $thisvideo_id; ?>&url=<?php echo $thisvideo_link; ?>" style="color:#2be"><?php  ?>
<div class="vdo_thumb">
<iframe width="240" height="150" src="<?php echo $thisvideo_link; ?>" frameborder="0" allowfullscreen></iframe>
</div>
</a>
</td>
<?php 

}
?></tr>
</table>
</div>
</div>
<div class="listblock" id="t">
<div class="listblock1">
<table width="980" height="250" cellpadding="0" cellspacing="0">
<th colspan="5" align="left">
<a class="a_heading">Popular Profiles</a>
<a class="viewall" href="search_profiles.php">VIEW ALL</a><br/><br/>
</th>
<tr valign="top">
<td>
<div class="talent_box"><a href="user.php?id=12"><img src="pics/12.png" width="240" height="260"></a>
</div>
</td>
<td>
<div class="talent_box"><a href="user.php?id=9"><img src="pics/9.png" width="240" height="260"></a>
</div>
</td>
<td>
<div class="talent_box"><a href="user.php?id=5"><img src="pics/5.png" width="240" height="260"></a>
</div>
</td>
<td>
<div class="talent_box"><a href="user.php?id=15"><img src="pics/15.png" width="240" height="260"></a>
</div>
</td>
</tr>
</table>
</div>
</div>
<?php 
$query4jobs="select applied,job_id from jobs order by applied desc";
$result4jobs=mysql_query($query4jobs);
$rows4jobs=mysql_num_rows($result4jobs);

?>
<div class="listblock" id="r">
<div class="listblock1">
<table width="1000" height="250" cellpadding="0" cellspacing="0">
<th colspan="4" align="left">
<a class="a_heading">Featured Jobs</a>
<a class="viewall" href="search_job.php">VIEW ALL</a><br/><br/>
</th>
<tr valign="top">
<td>
<div class="review_box"><img src="pics/<?php echo mysql_result($result4jobs,0,"job_id"); ?>.png" width="240" height="350">
</div>
</td>
<td>
<div class="review_box"><img src="pics/<?php echo mysql_result($result4jobs,1,"job_id"); ?>.png" width="240" height="350">
</div>
</td>
<td>
<div class="review_box"><img src="pics/<?php echo mysql_result($result4jobs,2,"job_id"); ?>.png" width="240" height="350">
</div>
</td>
<td>
<div class="review_box"><img src="pics/<?php echo mysql_result($result4jobs,3,"job_id"); ?>.png" width="240" height="350">
</div>
</td>
</tr>
</table>
</div>
</div>
<?php 
$query4forum="select count(*),blog_id from comment_blog group by blog_id order by count(*) desc";
$result4forum=mysql_query($query4forum);
$rows4forum=mysql_num_rows($result4forum);

?>

<div class="listblock" id="f">
<div class="listblock1">
<table width="1000" height="250" cellpadding="0" cellspacing="0">
<th colspan="4" align="left">
<a class="a_heading">Featured FORUMS</a>
<br/><br/>
</th>
<tr valign="top">
<td>
<div class="review_box_1"><?php echo mysql_result($result4forum,0,"blog_id"); ?>
</div>
</td>
<td>
<div class="review_box_1"><?php echo mysql_result($result4forum,1,"blog_id"); ?>
</div>
</td>
<td>
<div class="review_box_1"><?php echo mysql_result($result4forum,2,"blog_id"); ?>
</div>
</td>
<td>
<div class="review_box_1"><?php echo mysql_result($result4forum,3,"blog_id"); ?>
</div>
</td>
</tr>
</table>
</div>
</div>
</div>