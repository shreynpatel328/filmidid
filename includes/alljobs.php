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
			
			$query4apply="select * from apply_job a,jobs j where a.job_id=j.job_id and a.apply_id=$id4login";
			$result4apply=mysql_query($query4apply);
			$rows4apply=mysql_num_rows($result4apply);
			$rows4apply;
			
			$query4post="select * from jobs where id=$id4login";
			$result4post=mysql_query($query4post);
			$rows4post=mysql_num_rows($result4post);
			$rows4post;
		}

?>
<script>
$("#float_nav").hide();

</script>

<div class="search_job">
	
			<div class="prof_aboutme" style="color:#0000FF;"  >
			
		<span style="margin:0px; color:#FFF; font-weight:bold; display:block; background-color:#2be; padding:10px;">My Applied Jobs</span>
				<?php 
				$i=0;
				while($i<$rows4apply)
				{
					$thisjob_id=mysql_result($result4apply,$i,"job_id");
					$thisjobTitle=mysql_result($result4apply,$i,"jobTitle");
					$thiscompanyName=mysql_result($result4apply,$i,"companyName");
					$thiscompanyProfile=mysql_result($result4apply,$i,"companyProfile");
					$thispost_id=mysql_result($result4apply,$i,"post_id");
					
							?>
			    <a href="jobsother.php?job_id=<?php echo $thisjob_id;?>&id=<?php echo $thispost_id; ?>"><hd1>       
				  <?php echo "Applied ".($i+1);
								echo ":";
								echo $thiscompanyName; ?>	</hd1>
								</a>
				    
							<div class="mess_container">
										<div style="width:auto">
										<label style="color: #9900FF">Job Title:</label> &nbsp;&nbsp;&nbsp;<label style="color:#000000"><?php echo $thisjobTitle; ?></label><br/>
										<label style="color: #9900FF">Company Profile:</label> &nbsp;&nbsp;&nbsp;<label style="color:#000000"><?php echo $thiscompanyProfile; ?></label>
										</div>
								</div>
				
				<?php 
			$i++;
			}
				?>
		<span style="margin:0px; color:#FFF; font-weight:bold; display:block; background-color:#2be; padding:10px;">My Posted Jobs</span>
				<?php 
				$i=0;
				while($i<$rows4post)
				{
					$thisjob_i=mysql_result($result4post,$i,"job_id");
					$thisjobTitl=mysql_result($result4post,$i,"jobTitle");
					$thiscompanyNam=mysql_result($result4post,$i,"companyName");
					$thiscompanyProfil=mysql_result($result4post,$i,"companyProfile");
					$thisapplied=mysql_result($result4post,$i,"applied");
							?>
				 <hd1>    
				 <a href="jobs_desc.php?job_id=<?php echo $thisjob_i;?>"><table width="1108">
							<tr>
							<td width="835">
								  <?php echo "Posted ".($i+1);
								echo ":";
								echo $thiscompanyNam; ?>							</td>
							<td width="261">
								<?php 
								
								echo "Applied :";
								echo $thisapplied; ?>							</td>
							</tr>
				  </table>	
				    	</hd1>
				    </a>
							<div class="mess_container">
										<div style="width:auto">
										<label style="color: #9900FF">Job Title:</label> &nbsp;&nbsp;&nbsp;<label style="color:#000000"><?php echo $thisjobTitl; ?></label><br/>
										<label style="color: #9900FF">Company Profile:</label> &nbsp;&nbsp;&nbsp;<label style="color:#000000"><?php echo $thiscompanyProfil; ?></label>
										</div>
								</div>
				 <?php 
			$i++;
			}
				?>
		</div>
		
</div>