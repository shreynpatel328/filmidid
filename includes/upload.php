<?php  

		
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
							
							$query1="select * from blog_details where id='$id4login'";
							$result1= MYSQL_QUERY($query1);
							$rows=mysql_num_rows($result1);
							
							
							$query4job="select * from jobs where id='$id4login'";
							$result4job= MYSQL_QUERY($query4job);
						      $rows4job=mysql_num_rows($result4job);
							
							
							$query4video="select * from video_details where id='$id4login'";
							$result4video= MYSQL_QUERY($query4video);
							$rows4video=mysql_num_rows($result4video);
							
							
							
							
						}
		?>
<table width="980" class="up_nav" align="center" height="auto" cellspacing="0">
<tr>
<td class="nav_cur">Add Film</td>
<td>Add Question</td>
<td>Post a Job</td>
</tr>
</table>
<form method="post" action="includes/filmsucc.php" >
<script src="scripts/jquery-ui-1.10.3.custom.js"></script>

<div class="upload" style="display:block;">
<label>Paste your Video URL here:<br/><br/>
<center>
 </label><input class="url" type="text"  name="video_link"/>
 <a class="prev">Preview Video</a>
 <br/>
</center>
 <span style="font-size:14px; color:#555; margin-left:20px;"><span style="color:#F00">**</span>You must own the copyright or have the necessary rights for any contenet you add on this site</span>
<br/>
<div class="up_vdo_dsc">
<table border="0" width="940" cellpadding="10" height="auto" align="center" style="text-align:left;">
    <tr valign="top">
        <td width="400" style="background-color:#CCC;">    
            <div class="up_vdo">
            <iframe id="youtube_vdo" width="398" height="250" src="http://www.youtube.com/embed/oZy9nQA5NU4" frameborder="0" allowfullscreen></iframe>
            </div>
        </td>
        <td width="560">
            <div class="up_title">
            <table width="100%" height="auto">
            <tr valign="top">
            <td>Enter the title:</td>
            <td width="200">
            <input type="text" name="title" />
            </td>
            </tr>
            <tr valign="top" name="description">
            <td>Enter the description:</td>
            <td>
            <textarea name="desc"></textarea>
            </td>
            </tr>
            <tr>
            <td>
            </td>
            <td>
                        <input type="checkbox" name="nsfc"/> Not Suitable For Children

            </td>
            </tr>
            </table>
            </div>
        </td>
    </tr>
    <tr>
    <td style="background-color:#2be;">
    	<a class="up_bt" id="gen_sel">Select Genre</a>
    </td>
    <td  style="background-color:#2be;">
    	<a class="up_bt" id="langg_sel">Select Language</a>
    </td>
    </tr>
</table>
<span class="hylyt">Cast Details</span>
<br/>
<br/>
<br/>
    <div class="cast_det">
    <table width="630" cellspacing="4" align="center" height="auto">
        <tr>
            <th width="50%">
            Charactor name
            </th>
            <th width="50%">
            Name
            </th>
        </tr>
        <tr>
            <td width="50%">
            <input type="text" />
            </td>
            <td width="50%">
            <input type="text" />
            </td>
        </tr>
   </table>
        <a class="up_bt2">Add More</a>
    </div>
<script type="text/javascript">
	   function showResult(key)
	   {
	   	if(key == "" || key == " "){
	   		document.getElementById('result').innerHTML="Please Type Something";

	   	}
	   	else{
	   		var obj = new XMLHttpRequest();
	   		obj.open('GET','includes/process.php?key='+key,true);
	   		obj.send();
            obj.onreadystatechange = function(){
            	if(obj.readyState == 4 && obj.status == 200){
            		document.getElementById('result').innerHTML=obj.responseText;
            	}

            }

	   	}
	   }
	</script>
	
<span class="hylyt">Crew Details</span><br/><br/><br/>
    <div class="cast_det">
  <div id="result" align="left" style="margin:30px; color:#000000"></div>  <table width="630" cellspacing="4" align="center" height="auto">
        <tr>
            <th width="50%">
            Crew Role
            </th>
            <th width="50%">
            Name
            </th>
        </tr>
        <tr>
	         <td width="50%">
            <input type="text" name="key"  onKeyUp="showResult(this.value)" />
            </td>
			
            <td width="50%">
            <input type="text"  />
            </td>
			
        </tr>
    </table>
    <a class="up_bt2" >Add More</a>
    </div>
	
	<input type="hidden" value="1" name="film" />
    <br/>
    <button class="up_bt">Add Film</button>
    </div>
	
</form>
    <div class="up_vdo_more">
    <span class="hylyt">Your Recent Video Uploads</span>
	<?php 
if($rows4video!=0)
{
 $rows4video--;
$i=$rows4video-3;
$k=1;
if($i<=0)
$i=0;
							while($rows4video>=$i)
							{
							$thisvideo_id = @MYSQL_RESULT($result4video,$rows4video,"video_id");
					$thisid = @MYSQL_RESULT($result4video,$rows4video,"id");
					$thisvideo_link = @MYSQL_RESULT($result4video,$rows4video,"video_link");
					$thislanguages = @MYSQL_RESULT($result4video,$rows4video,"lang");
					$thisrating= @MYSQL_RESULT($result4video,$rows4video,"rating");
					$thisfav = @MYSQL_RESULT($result4video,$rows4video,"fav");
						$thislength = @MYSQL_RESULT($result4video,$rows4video,"length");
			$thisdate = @MYSQL_RESULT($result4video,$rows4video,"date");			
					$thishd = @MYSQL_RESULT($result4video,$rows4video,"hd");
	$thisnsfc = @MYSQL_RESULT($result4video,$rows4video,"nsfc");
		$thisdesc = @MYSQL_RESULT($result4video,$rows4video,"desc");
		$thiscategory = @MYSQL_RESULT($result4video,$rows4video,"category");
		$thistitle=@MYSQL_RESULT($result4video,$rows4video,"title");
		$thisviews=@MYSQL_RESULT($result4video,$rows4video,"views");
			
														
?>
	
    <table width="100%" height="auto" class="up_vdo_more_frame">
        <tr valign="top">
            <td>
            <a href="watch.php?video_id=<?php echo $thisvideo_id;?>&url=<?php echo $thisvideo_link;?>"><?php echo $thistitle; ?></a>
            <div class="up_vdo_thumb"></div>
            <span class="det">
            Genre : <?php  echo $thiscategory;?><br/>
            Added On : <?php echo $thisdate; ?><br/>
            Run Time : <?php echo $thislength; ?><br/>
            HD : <?php if($thishd ==1) echo "Available"; else echo "Not Available"; ?><br/>
            Suitable for Children : <?php if($thisnsfc=="on") echo "NO"; else echo "YES";?><br/>
            
            </span>
            <span class="det2">
            Rating : <?php echo $thisrating;  ?><br/>
            Views : <?php echo $thisviews;?><br/>
            favorites : <?php echo $thisfav; ?><br/> 
            </span>
            </td>
		 <?php 
		   $rows4video--;
	
}	}
?>  	
           
         
         </tr>
    </table>
    </div>
</div>



    
    <form method="post" action="includes/ques.php">
    <div class="upload">
        <table class="up_qstn" align="center" width="940" height="auto" border="0" cellspacing="0" cellpadding="7">
        <tr valign="top">
        <td>
        <label>Question</label>
        </td>
        <td>
         <input type="text" placeholder="How to get sponsors to produce my short movie" name="ques"/>
        </td>
        </tr>
        <tr valign="top">
        <td>
        <label>Topic Tags</label>
        </td>
        <td>
        <input type="text" placeholder="sponcors short movie produce producer"  name="topic"/>
        </td>
        </tr>
        <tr valign="top">
        <td>
        <label>Details</label>
        </td>
        <td>
        <textarea name="details"></textarea>
        </td>
        </tr>
        <tr>
        <td>
                 <a class="up_bt2" id="sel_lang">Select Language</a>
    
        </td>
        <td>
             <div id="lang_bar">
             
             </div>
        </td>
        </tr>
        <tr>
        <td colspan="2">
            <center>
			
             <button class="prev" id="add_qstn">Add Question</button>
            </center>
    </form>
        </td>
        </tr>
        </table>
    
            <span style="margin:0px; color:#FFF; font-weight:bold; display:block; background-color:#2be; padding:10px;">Previous Questions</span>   
			
			<?php 
			if($rows!=0)
{
 $rows--;
$i=$rows-3;
if($i<=0)
$i=0;
							while($rows>=$i)
							{
							$thisblog_question = @MYSQL_RESULT($result1,$rows,"blog_question");
					$thistopic_tags = @MYSQL_RESULT($result1,$rows,"topic_tags");
					$thisdetails = @MYSQL_RESULT($result1,$rows,"details");
					$thislanguages = @MYSQL_RESULT($result1,$rows,"languages");
					$thisblog_id = @MYSQL_RESULT($result1,$rows,"blog_id");
					$thisid = @MYSQL_RESULT($result1,$rows,"id");
					
					$sql="select * from comment_blog where blog_id='$thisblog_id'";
					$result4replies=mysql_query($sql);
					$rows4replies=mysql_num_rows($result4replies);
				
								
?> 
            <div class="qstn_box">
            <div>
            <span><?php echo $rows4replies;  ?>  replies</span>
            <a href="dispfor.php?blog_id=<?php echo $thisblog_id; ?>"> <?php echo $thisblog_question; ?></a>

            <p>
           <?php echo $thisdetails; ?>

            
            
            </p>
            </div>
            
            
    </div>
	 <?php 
		   $rows--;
	}
	}
?>
</div>

  <form method="post" action="includes/jobsucc.php"> 
<div class="upload">

<table class="up_qstn" align="center" width="940" height="auto" border="0" cellspacing="0" cellpadding="7">
    
     <tr valign="top">
        <td>
        <label>Job Title</label>
        </td>
        <td>
         <input type="text" name="job_title"/>
        </td>
        </tr>
        <tr valign="top">
        <td>
        <label>Company Name</label>
        </td>
        <td>
        <input type="text" name="cmp_name" />
        </td>
        </tr>
        <tr valign="top">
        <td>
        <label>Company Profile</label>
        </td>
        <td>
        <input type="text" placeholder="enter company website or text" name="cmp_pro" />
        </td>
        </tr>
        <tr valign="top">
        <td colspan="2" style="text-align:center;">
        Country : <select onchange="print_state('state',this.selectedIndex);" id="country" name="country"></select>
        Location : <select name ="state" id = "state"></select>
        <script language="javascript">print_country("country");</script>
        Apply before : <input type="date" id="datepicker" name="d" />
			<script>
            $(function() {
            $( "#datepicker" ).datepicker();
            });
            </script>
   	

        </td>
        </tr>
        <tr>
        <td>
                 <a class="up_bt2" id="sel_cat">Select Categories</a>
    
        </td>
        <td>
             <div id="lang_bar">
             
             </div>
        </td>
        </tr>
        <tr valign="top">
        <td colspan="2" height="60">
        <br/>
        <input type="checkbox" id="paid_job_trig" name="paid"  /> Paid Job
        <span id="paid_job">
        Pay Amount : <input type="text" style="width:100px; float:none;" name="amt"   />
        </span>
        <span style="float:right">
        Experience : <select style="width:50px; margin-right:10px; border:thin solid #eee;" name="expr" >
        				<option>0</option>
        				<option>1</option>
        				<option>2</option>
        				<option>3</option>
        				<option>4</option>
        				<option>5</option>
        				<option>6</option>
        				<option>7</option>
        				<option>8</option>
        				<option>9</option>
        				<option>10</option>
        				<option>11</option>
        				<option>12</option>
        				<option>13</option>
        				<option>14</option>
        				<option>15</option>
        				<option>16</option>
        				<option>17</option>
        				<option>18</option>
        				<option>19</option>
        				<option>20</option>
        				<option>21</option>
        				<option>22</option>
        				<option>23</option>
        				<option>24</option>
        				<option>25</option>
        				<option>26</option>
        				<option>27</option>
        				<option>28</option>
        				<option>29</option>
        				<option>30</option>
             			<option>31</option>
        				<option>32</option>
        				<option>33</option>
        				<option>34</option>
        				<option>35</option>
        				<option>36</option>
        				<option>37</option>
        				<option>38</option>
        				<option>39</option>
        				<option>40</option>
			         </select>years
        </span>
        </td>
        </tr>
        <tr valign="top">
        <td>
        Details :
        </td>
        <td>
        <textarea name="details" > </textarea>
        </td>
        </tr>
        <tr>
        <td>
                 <a class="up_bt2" id="sel_lang">Select Language</a>
    	</td>
        <td>
             <div id="lang_bar">
             
             </div>
        </td>
        </tr>

        <tr>
        <td colspan="2">
            <center>
             <button class="prev" id="add_qstn">Post Job</button>
            </center>
    </form>
        </td>
        </tr>
        </table>
		
            <span style="margin:0px; color:#FFF; font-weight:bold; display:block; background-color:#2be; padding:10px;">Previously Posted Jobs</span>    
			<?php 
			if($rows4job!=0)
{
 $rows4job--;
$i=$rows4job-3;
$k=1;
if($i<=0)
$i=0;


							while($rows4job>=$i)
							{
							$thisjob_id = @MYSQL_RESULT($result4job,$rows4job,"job_id");
					$thisid = @MYSQL_RESULT($result4job,$rows4job,"id");
					$thisjobTitle = @MYSQL_RESULT($result4job,$rows4job,"jobTitle");
					$thislanguages = @MYSQL_RESULT($result4job,$rows4job,"languages");
					$thiscompanyName= @MYSQL_RESULT($result4job,$rows4job,"companyName");
					$thiscompanyProfile = @MYSQL_RESULT($result4job,$rows4job,"companyProfile");
						$thiscountry = @MYSQL_RESULT($result4job,$rows4job,"country");
			$thisstate = @MYSQL_RESULT($result4job,$rows4job,"location");			
					$thisdate = @MYSQL_RESULT($result4job,$rows4job,"date");
	$thiscategories = @MYSQL_RESULT($result4job,$rows4job,"categories");
		$thispaid = @MYSQL_RESULT($result4job,$rows4job,"paid");
			$thisamt = @MYSQL_RESULT($result4job,$rows4job,"amt");
				$thisexpr = @MYSQL_RESULT($result4job,$rows4job,"expr");
					$thisdetails = @MYSQL_RESULT($result4job,$rows4job,"details");
				
						$thiscurr_date = @MYSQL_RESULT($result4job,$rows4job,"curr_date");
						
														
?> 
            <div class="job_box">
            
            <div>
            <a href="jobs_desc.php?job_id=<?php echo $thisjob_id;?>">Job Post <?php echo $k; $k++;?></a>
            <span class="det2 det3">
            <?php if($thispaid=="on") echo "Paid"; else echo "No Payment"; ?><br />
			Posted on : <?php echo $thiscurr_date; ?><br/>
			89 applied
            </span>
            <br/>
            Company Profile : <?php echo $thiscompanyProfile; ?><br/>
            Location : <?php echo $thisstate.",".$thiscountry; ?><br />
            Category : <?php echo $thiscategories;?><br />
            <hr />Details:
            <p>
            <?php 	echo $thisdetails;?>
            </p>
            </div>
           <?php 
		   $rows4job--;
	}
	}
?>  
            
            
           
             
</div>

<script>
$("#float_nav").hide();
if($('#paid_job_trig').is(':checked')){$("#paid_job").show();}
else{$("#paid_job").hide();}

$("#paid_job_trig").click(function()
								   {
									 if($('#paid_job_trig').is(':checked')){$("#paid_job").slideDown(100);}
									 else{$("#paid_job").fadeOut(200);}
								   });

$(".upload .prev").click(function()
								  {
									u=$(".upload .url").val();
								  $(".up_vdo_dsc").slideDown(2000);
								  u=u.replace("watch?v=","embed/");
								  $("#youtube_vdo").attr('src',u);
								  });
$(".upload .up_bt2").click(function()
								   {
									$(this).prev().append('<tr><td width="50%"><input type="text" /></td><td width="50%"><input type="text" /></td></tr>');   
									});

$(".up_nav tr td").click(
						 function()
								  {
										te=$(this).index();
										$(".upload").fadeOut(200).eq(te).fadeIn(400);
										$(".up_nav tr td").removeClass('nav_cur').eq(te).addClass('nav_cur');
								  }
						 );
</script>