<?php 
 session_start();
$blog_id=$_REQUEST['blog_id'];
$eMail=$_SESSION['EMAIL'];

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
							$id1= MYSQL_RESULT($result,0,"id");
							$query4blog="select * from blog_details where blog_id='$blog_id'";
							$result4blog=mysql_query($query4blog);
							
							$query4comment="select * from comment_blog where blog_id='$blog_id'";
						
							$result4comment=mysql_query($query4comment);
							$rows4comment=mysql_num_rows($result4comment);
					}
							
?>
<script>
$("#float_nav").hide();

</script>
<div class="search_job">
	<div class="conta">
	
	<?php 
                    $thisblog_question = MYSQL_RESULT($result4blog,0,"blog_question");
					$thistopic_tags = MYSQL_RESULT($result4blog,0,"topic_tags");
					$thisdetails = MYSQL_RESULT($result4blog,0,"details");
					$thislanguages = MYSQL_RESULT($result4blog,0,"languages");
					$thisblog_id = MYSQL_RESULT($result4blog,0,"blog_id");
					
					?>
			 <div class="prof_queries">
					<hd1>Question</hd1>
					
					<hd2></hd2><br/><br/>
					<div><table width="1107" height="216" cellpadding="5">
					<tr valign="top"><td width="18%"><hd3>Question</hd3></td><td width="82%"><hd4><?php echo $thisblog_question; ?></hd4></td></tr>
					<tr valign="top"><td><hd3>Topic Tags</hd3></td><td><hd4><?php echo $thistopic_tags; ?></hd4></td></tr>
					<tr valign="top"><td><hd3>Details</hd3></td><td><hd4><?php echo $thisdetails; ?></hd4></td></tr>
					<tr valign="top"><td><hd3>Languages</hd3></td><td><hd4><?php echo $thislanguages; ?></hd4></td></tr>
					</table></div>
	  </div>
	</div>
	<span style="margin:0px; color:#FFF; font-weight:bold; display:block; background-color:#2be; padding:10px;">To Comment</span>
	<br/>
	<form action="includes/addcomm.php?blog_id=<?php echo $thisblog_id;?>&" method="get">
	<table width="1093" height="38">
	<tr>
	<td width="118">
	<label style="color:#2be; font-size:18px;">Comment </label>
	</td>
	<td width="175">
	<div id="comment_value">
<input name="comment_value" type="text" />
	</div>
	</td>
	<td width="784" align="center" valign="middle"><input type="submit" class="butto" id="qstn_comment" value="comment" /></td>
	</tr>
  </table>
  <input name="ques" type="hidden" value="<?php echo $thisblog_id;?>" /></form><br/>
  <?php 
$f=1;
$i=0;
if($rows4comment==0)
$f=0;
if($f!=0)
{
while($i<$rows4comment)
{
                     $thiscomment_value = MYSQL_RESULT($result4comment,$i,"comment_value");
					$thiscomment_id = MYSQL_RESULT($result4comment,$i,"comment_id");
					$thisvotes=mysql_result($result4comment,$i,"votes");
					$query4name="SELECT * FROM user_details d,user_login l where d.eMail=l.eMail and d.password=l.password and l.id='$thiscomment_id'";
						$result4name=mysql_query($query4name);
						$thisname=mysql_result($result4name,0,"name");
?>
	<span style="margin:0px; color:#FFF; font-weight:bold; display:block; background-color:#2be; padding:10px;">Comments</span>
      
	   <div id="comment_container">
	       <div id="comment_name">
					<a href="user.php?id=<?php echo $thiscomment_id;?>"><label style="color:#FFFFFF"> <?php echo $thisname; ?></label></a>
		   </div><br/>
		 <label style=" font-size:18px;color:#2be; "> Comment</label><br/>
		   <div id="comment_value_cont">
					 <?php echo $thiscomment_value;
					 
					 
					  ?>
		   </div>
		<table width="1090">
		<tr>
		<td width="48" height="41" align="left" valign="top">
			<label style=" font-size:18px;color:#2be; ">Votes</label>&nbsp;&nbsp;&nbsp;<?php echo $thisvotes; ?>	 </td>
		 <td width="1030"  align="left" valign="top">
             <a href="includes/votes.php?comment_value=<?php echo $thiscomment_value;?>&comment_id=<?php echo $thiscomment_id; ?>&votes=<?php echo $thisvotes; ?>&blog_id=<?php echo $thisblog_id;?>">
           <button class="butt" id="qstn_comment"> Vote Answer</button></a>
          </td>
		  </tr>
		 </table>
	   <br/>
	   <br/><br/><br/><br/>
	   </div>



<?php  
$i++;
}
}

	
?>

</div>
