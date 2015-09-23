<?php 
$id=$_GET['id'];


	$eMail1=$_SESSION['EMAIL'];
	
		//CONNECTING TO THE DATABASE USER_DATA
				
	
		include ( "includes/data.php");	
		$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
			$db='filmidid';
			mysql_select_db($db);
			
			$query="select * from user_details d, user_login l  where d.eMail=l.eMail and d.password=l.password and l.id=$id";
			$result=mysql_query($query);
			$rows=mysql_num_rows($result);
		 $rows;
		}

?>
<script>
$("#float_nav").hide();

</script>

<div class="search_job">
	<div class="container">
			<div class="prof_aboutme" style="color:#0000FF;"  >
			<?php $thisname=mysql_result($result,0,"name"); ?>
				 <hd1>Send A Message To <?php echo $thisname; ?></hd1>
				 
				 <form action="../newfilmidid/includes/mess.php?id=<?php echo $id;?>" method="post">
					<textarea name="details" > </textarea>
			  <center>
             <button class="prev" id="add_qstn">Send</button>
            </center>
		</form>
		</div>
		
</div>
	
</div>