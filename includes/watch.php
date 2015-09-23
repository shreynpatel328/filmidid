<?php 

		$eMail=$_SESSION['EMAIL'];
       $video_id=$_GET["video_id"];
$video_link=$_GET["url"];


 				
	include ( "data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
								$query="select id from user_login where eMail='$eMail'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
							$id4login= MYSQL_RESULT($result,0,"id");
							
							
						$query4video="select * from video_details where video_id='$video_id'";
						$result4video= MYSQL_QUERY($query4video);
						
						
					$id = @MYSQL_RESULT($result4video,0,"id");
					
					$title = @MYSQL_RESULT($result4video,0,"title");
					$video_link = @MYSQL_RESULT($result4video,0,"video_link");
					$languages = @MYSQL_RESULT($result4video,0,"lang");
					$rating= @MYSQL_RESULT($result4video,0,"rating");
					$fav = @MYSQL_RESULT($result4video,0,"fav");
						$length = @MYSQL_RESULT($result4video,0,"length");
			$date = @MYSQL_RESULT($result4video,0,"date");			
					$hd = @MYSQL_RESULT($result4video,0,"hd");
	$nsfc = @MYSQL_RESULT($result4video,0,"nsfc");
		$desc = @MYSQL_RESULT($result4video,0,"desc");
		$category = @MYSQL_RESULT($result4video,0,"category");
		$views=@MYSQL_RESULT($result4video,0,"views");
		
		
		$query4name="select name from user_details d, user_login l where d.eMail=l.eMail and d.password=l.password and id='$id'";
		$result4name=mysql_query($query4name);
		$name=@MYSQL_RESULT($result4name,0,"name");
		
		$query4review="select * from video_review where video_id='$video_id'";
		$result4review=mysql_query($query4review);
		$rows4review=mysql_num_rows($result4review);
		$query4views="update video_details set views=views+1 where video_id='$video_id'";
		$result4views=mysql_query($query4views);
		
		$query4random="select * from video_details";
		$result4random=mysql_query($query4random);
		$rows4random=mysql_num_rows($result4random);
		
		
		
	}


?>

<div class="main home">
<div class="watch_title">
<span><?php echo $title; ?></span>
<span style="float:right; text-transform:none; background-color:#333; padding:5px 15px; border-radius:5px; margin-top:-5px;">544 votes</span>
            
            <div class="ratebar" style="margin-top:-5px;">
            <div class="filler" style="background-color:#FF0;">
            <img src="images/ratestar.png" width="250" />
            </div>
            </div>

</div>
<table width="1000" height="auto" cellspacing="0" cellpadding="0" align="center" border="0">
<tr>
<td>
<div id="vdo_panel">
<iframe width="700" height="450" src="<?php echo $video_link; ?>" frameborder="0" allowfullscreen></iframe>
</div>
</td>
<td width="300" rowspan="4" valign="top" id="vdo_dsc">
<div>
<table width="280" align="center">
<tr>
<td align="left">
<p style="background-color:#FFF; color:#333; padding:5px 15px; border-radius:3px; border:thin solid #222;">Added by : <a style="color:#2BE;" href="user.php?u=214214124"><?php echo $name;?></a></p>
Cast
<br/>
<br/>

</td>
</tr>
<tr>
<td align="left">
<br/>
Crew
<br/>
<br/>

</td>
</tr>
</table>
</div>
</td>
<tr>
<td>
<div class="vdo_blocks" style="height:auto; padding:0px 0px 40px 10px; width:690px;">
        <div style="width:200px;height:auto; line-height:40px; margin-bottom:10px;position:absolute;;">
            Genre :
            <span class="hylyt"><?php  echo $category;?></span>
            <br/>
            Run time :
            <span class="hylyt"> <?php echo $length; ?></span>
            <br/>
            Suitable for Children:
            <span class="hylyt"><?php if($nsfc!="on") echo "YES"; else echo "NO";?></span>
			<br/>
         </div>
        <div style="width:200px;height:auto; line-height:40px; margin-bottom:10px; margin-left:250px;position:absolute;;">
   
            HD :
            <span class="hylyt"><?php  if($hd ==1) echo "Available"; else echo "Not Available"; ?></span>
            <br/>
            Views :
            <span class="hylyt"><?php echo $views; ?></span>
            <br/>
 	        Added on:
            <span class="hylyt" ><?php echo $date; ?></span>
            <br/>
   		</div>      
             <div class="ratebar" style="width:190px; overflow:hidden; margin-top:10px;">
             Your Rating
                <div class="filler" style="	margin-top:5px; height:auto;">
                <img src="images/ratestar.png" width="185" />
                </div>
                              <button class="add_fav" title="add to favorites"><img alt="add tto favorites" src="images/fav.png" style="margin-bottom:-10px; margin-top:-15px;" onclick="<?php 	$db='filmidid';
							mysql_select_db($db);
							$query="select * from fav_videos where user_id='$id4login' and video_id='$video_id'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
					     	 echo  $numberOfRows4name ;
							 if(@$numberOfRows4name==0)
							 {
							 $sql="insert into fav_videos values('$id4login','$video_id')"; 
							 $result=mysql_query($sql);
							 }
							$query1= "select * from fav_videos where video_id='$video_id'";
							$result1=mysql_query($query1);
							$rows1=mysql_num_rows($result1);
							echo $rows1;
							$query2="update video_details set fav='$rows1' where video_id='$video_id'";
							$result2=mysql_query($query2);
							 		?>" />Add to Favorites</button>    
             </div>
        <br/><br/><br/>
        <br/><br/><br/>
<hr width="95%"/>   
        Description:
        <span class="dsc_watch">
<?php echo $desc;?>

   </span>
        <button class="rep_viol">Report violation</button>
</div>
</td>
</tr>
<tr>
<td>

<div class="vdo_blocks vdo_more">
More Videos

<ul><?php 
$rows4random--;
$i=$rows4random-3;

							while($rows4random>=$i)
							{
							$thisvideo_id = @MYSQL_RESULT($result4random,$rows4random,"video_id");
							$thisvideo_link = @MYSQL_RESULT($result4random,$rows4random,"video_link");

?>
<li>
<a href="watch.php?video_id=<?php echo $thisvideo_id;?>&url=<?php echo $video_link;?>">
<iframe id="youtube_vdo" width="165" height="120" src="<?php echo $video_link;?>" frameborder="0" allowfullscreen></iframe>
</a>
</li>
<?php 
$rows4random--;
}
?>
</ul>

<center>
<a class="readmore">Show More Videos</a>
</center>
</div>

</td>
</tr>
<tr>
<td>
<div class="vdo_blocks vdo_comments">
     <div class="ratebar" style="margin-right:0px; margin-top:0px;">
                <div class="filler">
                <img src="images/ratestar.png" width="250" />
                </div>
     </div>
     <form method="post" action="includes/review.php?video_id=<?php echo $video_id;?>&id=<?php echo $id4login;?>&video_link=<?php echo $video_link;?>">         
Write your reviews:    
<br/><span style="font-size:10px;">(Please write a detailed review when possible and refrain from posting indecent comments)</span>
<textarea name="review" ></textarea>
<center>
<input type="submit" class="viewall" style="border:none; font-size:14px; float:none; margin-top:5px;" value="Submit Review" />	
</center>
</div>
</form>
</td>
</tr>
</tr>
</table>
<div id="vdo_reviews">
<span style="margin:0px; color:#FFF; font-weight:bold; display:block; background-color:#2be; padding:10px;">User Reviews</span>
<?php 
if($rows4review!=0)
{
$rows4review--;
							while($rows4review>=0)
							{
							$thisvideo_id = @MYSQL_RESULT($result4review,$rows4review,"video_id");
					$thisid = @MYSQL_RESULT($result4review,$rows4review,"id");
					$thisreview= @MYSQL_RESULT($result4review,$rows4review,"review");
					
$query4name="select * from user_details d, user_login l where d.eMail=l.eMail and d.password=l.password and id='$thisid'";
		$result4name=mysql_query($query4name);
		$name=@MYSQL_RESULT($result4name,0,"name");
		$thisid=@MYSQL_RESULT($result4name,0,"id");

?>
<table height="auto" width="1000" border="0" cellspacing="10" class="reviews_blocks">
<tr>
<td rowspan="2" width="50" height="50">
<img src="images/search.png" width="50" height="50" />
</td>
<td><a style="color:#2be;" href="user.php?id=<?php echo $thisid; ?>"><?php echo $name; ?></a></td>
</tr>
<tr>
<td>

</td>
</tr>
<tr>
<td height="120" colspan="2" style="padding:10px; background-color:#FFF; border-radius:5px">
<?php echo $thisreview; ?>
<br />

<a class="readmore">...read more</a>
</td>
</tr>
</table>
<?php 
$rows4review--;
}}
?>
</div>
</div>
<script>
$("#float_nav").hide();
</script>