<?php 
$eMail1=$_SESSION['EMAIL'];
	
		//CONNECTING TO THE DATABASE USER_DATA
				
	
		include ( "includes/data.php");	
		$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
			$db='filmidid';
			mysql_select_db($db);
			$query2="select id from user_login where eMail='$eMail1'";
			$result2 = MYSQL_QUERY($query2);
			$numberOfRows4name = MYSQL_NUM_ROWS($result2);
			$id4login= MYSQL_RESULT($result2,0,"id");
			
			$query4sent="select * from messages where sender_id='$id4login'";
			$result4sent=mysql_query($query4sent);
			$rows4sent=mysql_num_rows($result4sent);
			$rows4sent;
			
			$query4rec="select * from messages where reciever_id='$id4login'";
			$result4rec=mysql_query($query4rec);
			$rows4rec=mysql_num_rows($result4rec);
			$rows4rec;
		}

?>
<script>
$("#float_nav").hide();

</script>

<div class="search_job">
	
		<hd1>Recieved Messages</hd1>
						<?php 
						$i=0;
						while($i<$rows4rec)
						{
						?>
		<div class="mess_container">
					<table>
					<tr>
					<td>
			<div>
							<?php  $thisid=mysql_result($result4rec,$i,"sender_id");
									$thisdetails=mysql_result($result4rec,$i,"message");
								
						$query4name="SELECT * FROM user_details d,user_login l where d.eMail=l.eMail and d.password=l.password and l.id='$thisid'";
						$result4name=mysql_query($query4name);
						$thisname=mysql_result($result4name,0,"name");
							
							 ?>
							<img src="pics/<?php echo $thisid;?>.png" width="100" height="60">
			</div>
				</td>
				<td>				
			<div id="name_mess">
					
					<b style="color:#1ad;"><?php  echo $thisname; ?></b><br/>
					<label style="color:#000000">Message: <?php  echo $thisdetails;     ?></label>
			</div>
							</td>	
							</tr>
							</table>
								<?php 
								$i++;
								}
								?>
								
			</div>
		<br/>
			
					 
						 <hd1>Sent Messages</hd1>
						  <?php 
						  $i=0;
						while($i<$rows4sent)
						{
						?>
		<div class="mess_container">
							<table>
							<tr>
							<td>
			<div>
					<?php  $thisid=mysql_result($result4sent,$i,"reciever_id");
						    $thisdetails=mysql_result($result4sent,$i,"message");
								
						$query4name="SELECT * FROM user_details d,user_login l where d.eMail=l.eMail and d.password=l.password and l.id='$thisid'";
						$result4name=mysql_query($query4name);
						$thisname=mysql_result($result4name,0,"name");
							
					 ?>
					<img src="pics/<?php echo $thisid;?>.png" width="100" height="60">
			</div>
					</td>
	                <td>
			<div id="name_mess">
	
						<b style="color:#1ad;"><?php  echo $thisname; ?></b><br/>
						<label style="color:#000000">Message: <?php  echo $thisdetails;     ?></label>
			</div>	
						</td>	
						</tr>
									</table>
								
							<?php 
							$i++;
							}
							?>
	
</div>
</div>