<?php 
	$eMail=$_SESSION['EMAIL'];
	
		//CONNECTING TO THE DATABASE USER_DATA
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
			
			$query4="select * from blog_details where id=$id4login";
			$result4=mysql_query($query4);
			$rows4=mysql_num_rows($result4);
			$rows4;
		}

?>
<script>
$("#float_nav").hide();

</script>

<div class="search_job">
	
			<div class="prof_aboutme" style="color:#0000FF;"  >
			
		<span style="margin:0px; color:#FFF; font-weight:bold; display:block; background-color:#2be; padding:10px;">My Queries</span>
				<?php  
				$i=0;
				while($i<$rows4)
				{
				
					$thisdate=mysql_result($result4,$i,"date");
					$thisblog_question=mysql_result($result4,$i,"blog_question");
					$thisdetails=mysql_result($result4,$i,"details");
					$thisblog_id=mysql_result($result4,$i,"blog_id");
				 ?>
			   <a href="dispfor.php?blog_id=<?php echo $thisblog_id;?>">  <hd1>       
							<table width="1108">
							<tr>
							<td width="835">
								<?php echo "Query ".($i+1);
								echo ":";
								echo $thisblog_question; ?>							</td>
							<td width="261">
								<?php echo $thisdate; ?>							</td>
							</tr>
				  </table>		
				</hd1>
				</a>
				 	<div class="mess_container">
					<div style="width:auto">
						<label style="color: #9900FF">DETAILS:</label> &nbsp;&nbsp;&nbsp;<label style="color:#000000"><?php echo $thisdetails; ?></label>
					</div>
					</div>
				 <?php 
				 $i++;
				 }
				?>
		</div>
		
</div>