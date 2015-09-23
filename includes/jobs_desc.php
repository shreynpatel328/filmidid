<?php  
		
		$eMail=$_SESSION['EMAIL'];
		$job_id=$_GET['job_id'];
		
		
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
							
						
							
							$query4disp="select * from jobs where job_id='$job_id'";
							
							$result4disp=mysql_query($query4disp);
							
							
							$query4no="select * from apply_job where job_id='$job_id'";
							$result4no=mysql_query($query4no);
							$rows4no=mysql_num_rows($result4no);
							
							$query4candi="select * from apply_job a, user_details d, user_login l where a.job_id='$job_id' and a.apply_id=l.id and d.eMail=l.eMail and d.password=l.password ";
							$result4candi=mysql_query($query4candi);
							$rows4candi=mysql_num_rows($result4candi);
							$rows4candi;
							
						}
						?>
<script>
$("#float_nav").hide();

</script>
<div class="jobs_disc">
  
<?php 
  while($info = mysql_fetch_array( $result4disp ))
        {
		
		?>  <hd1><?php echo $info['jobTitle']; ?></hd1><br/><br/><br/>   
            <div >
         
				<span class=" det3">
				<br />
			Apply before : <?php echo $info['date']; ?> <br/><br/>
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
           </div>

</div>
<div id="three">
<div class="jobs_applied_list">
		   
		 
		     <table width="860" height="37" border="0">
               <tr>
                <hd1>  <td width="420" height="33" align="left" valign="bottom"><span >Candidates Apllied</span></td>
                </hd1>
                 <td width="175"><a>
                   <button id="lang_sel" class="inp_text lang" >
Download List</button></a>&nbsp;</td>
                 <td width="251"><a>
                   <button id="lang_sel" class="inp_text lang" >
Publish Results</button></a>&nbsp;</td>
               </tr>
  </table>
		      <br />
</div>
<div class="list">
<script type="text/javascript">
	   function showResult(key,post_id,job_id,select_id)
	   {
	   	
	   		var obj = new XMLHttpRequest();
	   		obj.open('GET','includes/jobfinal.php?key='+key+'&post_id='+post_id+'&job_id='+job_id+'&select_id='+select_id,true);
	   		obj.send();
            obj.onreadystatechange = function(){
            	if(obj.readyState == 4 && obj.status == 200){
            		document.getElementById('result').innerHTML=obj.responseText;
            	}

        

	   	}
	   }
	</script>


<table width="1025" border="0">
 <?php 
  while($res = mysql_fetch_array( $result4candi ))
        {
		
		?> 
  <tr>
    <td width="276" style="color:#000000"><a href="user.php?id='<?php echo $res['id'];?>'">
      <hd3><?php echo $res['name']; ?></hd3></a></td>
    <td width="184"><span>
    <input name="Input3" type="button" value="Rejected" id="save" onclick="showResult(-1,<?php echo $id4login; ?>,<?php echo $job_id; ?>,<?php echo $res['id'];  ?>)">
    </span><div id="result"></div></td>
    <td width="183"><span>
      <input name="Input3" type="button" value="Under Review" id="save"  onclick="showResult(0,<?php echo $id4login; ?>,<?php echo $job_id; ?>,<?php echo $res['id'];  ?>)">
      </span><div id="result"></div></td>
    <td width="364"><span>
     <input name="Input3" type="button" value="Selected" id="save"  onclick="showResult(1,<?php echo $id4login; ?>.,<?php echo $job_id; ?>,<?php echo $res['id'];  ?>)">
      </span><div id="result"></div></td>
  </tr>
<?php }?></table>
</div>
</div>
<div class="message_save">
		<div id="message_one">
		<table width="1027">
		<tr>
		<td width="645"><hd2>Your Personalized Message to Candidates</hd2></td>
		<td width="370">
		 <form method="post" action="includes/messageStore.php"> 
		  <input type="submit" value="Save Messages" id="save" /></td>
		</tr>
		</table>
		
		</div>
		<div id="message_two">
		 <table width="898" style="margin:20px;" cellspacing="10px">
		 <tr >
		 <td width="228" align="left" valign="top">Selected:  
		   </td>
		 <td width="590" class="message_qstn"><textarea name="selectdetails" ></textarea></td>
		 </tr>
		  <tr >
		 <td width="228" align="left" valign="top">Under Review:
		  </td>
		 <td width="590" class="message_qstn"><textarea name="urdetails" ></textarea></td>
		 </tr>
		  <tr >
		 <td width="228" align="left" valign="top">Rejected:
		  </td>
		 <td width="590" class="message_qstn"><textarea name="rejdetails" ></textarea></td>
		 </tr>
		 </table>
		 <input type="hidden" value="<?php echo $job_id;?>" name="job_id" />
		 </form>
		</div>
</div>
