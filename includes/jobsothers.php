<?php 
		
		$eMail=$_SESSION['EMAIL'];
	
		
		
 include ( "includes/data.php");	
 $job_id=$_GET['job_id'];
$id=$_GET['id'];

					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							$query="select id from user_login where eMail='$eMail'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
							$id4login= MYSQL_RESULT($result,0,"id");
							
							$query="select * from apply_job where post_id='$id' and job_id='$job_id' and apply_id='$id4login'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
							$query4disp="select * from jobs where job_id='$job_id'";
							$result4disp=mysql_query($query4disp);
							
							$query4no="select * from apply_job where job_id='$job_id'";
							$result4no=mysql_query($query4no);
							$rows4no=mysql_num_rows($result4no);
			             }


?>
<script>
$("#float_nav").hide();
</script>
<script type="text/javascript">
	   function showResult(job_id,id,id4login)
	   {
	   	
	   		var obj = new XMLHttpRequest();
	   		obj.open('GET','includes/applyfinal.php?job_id='+job_id+'&id='+id+'&id4login='+id4login,true);
	   		obj.send();
            obj.onreadystatechange = function(){
            	if(obj.readyState == 4 && obj.status == 200){
            		document.getElementById('result').innerHTML=obj.responseText;
            	}

        

	   	}
	   }
	</script>


  <div class="jobs_disc">
  <?php 
  while($info = mysql_fetch_array( $result4disp ))
        {
		
		?>  <hd1><?php echo $info['jobTitle']; ?></hd1><br/><br/><br/>   
            <div >
         
            <span class=" det3">
			<?php 
			 if(@$numberOfRows4name==0)
							 {
							 ?>
			 <button style="width:150px; height:40px;  float:right; margin-bottom:30px; background-color:#2be;
	color:#fff;
	font-size:20px;
	text-transform:capitalize;" onclick="showResult(<?php echo $job_id; ?>,<?php echo $id; ?>,<?php echo $id4login; ?>)">
Apply</button><br />
<?php } 
else 
echo "<p style='text-decoration:blink; color:#2be'> You have already applied </p>";
?>

            <br /><br />
			EndDate : <?php echo $info['date']; ?> <br/><br/>
			No Of Applied : <?php echo $rows4no;?>
            </span>
            <br/>
       
        <hd2> Posted on: <?php echo $info['curr_date']; ?>  </hd2><br/><br/>
        <hd2>Company Name: <?php echo $info['companyName']; ?></hd2><br/><br/>
		<hd2> Location: <?php echo $info['location'].",".$info['country']; ?></hd2><br/><br/>
		<hd2> Category: <?php echo $info['categories'];?> </hd2><br/><br/>
		<hd2> Paid/Unpaid Job:  <?php if($info['paid']=="on") echo "Paid"; else echo "No Payment"; ?> </hd2><br/><br/>
	<hd2> Minimum Expr: <?php echo $info['expr']; ?> </hd2><br/><br/>
	
	
            <hr />Jobs Description:
            <p>
          <?php echo $info['details']; ?>
            </p>
			<br/><br/>
			
            <hr />Desired Candidate Profile:
            <p>
          
            </p>
			<br/><br/><br/>
			<hd2> Company Profile: <?php echo $info['companyProfile']; ?></hd2><br/><br/>			
			<?php }?>
            </div></div>