<?php 

		
		$eMail1=$_SESSION['EMAIL'];
		
		
		$id=$_GET['id'];
	
		
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
							
		$query="select * from user_details d, user_login l  where d.eMail=l.eMail and d.password=l.password and l.id=$id";
			$result=mysql_query($query);
			$rows=mysql_num_rows($result);
			
			 $name =  MYSQL_RESULT($result,0,"name");
				$role =  MYSQL_RESULT($result,0,"role");
				$dob =  MYSQL_RESULT($result,0,"dob");
				$region =  MYSQL_RESULT($result,0,"region");
				$country=   MYSQL_RESULT($result,0,"country");
			 $lang =  MYSQL_RESULT($result,0,"lang");
				$accents =  MYSQL_RESULT($result,0,"accents");
				$height=  MYSQL_RESULT($result,0,"height");
				$build =  MYSQL_RESULT($result,0,"build");
				$best =  MYSQL_RESULT($result,0,"best");
				$about =  MYSQL_RESULT($result,0,"about");
				$skill1=  MYSQL_RESULT($result,0,"skill1");
				$skill2 =  MYSQL_RESULT($result,0,"skill2");
				$skill3 =  MYSQL_RESULT($result,0,"skill3");
				$recom =  MYSQL_RESULT($result,0,"recom");
				$add =  MYSQL_RESULT($result,0,"add");
				$review =  MYSQL_RESULT($result,0,"review");
				$eMail =  MYSQL_RESULT($result,0,"eMail");
				
				 
				
							
			
				
				}
?>

<div class="prof">
<table width="1000" height="auto" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td width="600">
        <div class="prof_slider">
        <div class="main_slider">
                <div class="main_slider_frame cur_frame" style="display:block;">
                    <img id="b" src="images/1.png" height="400" width="600"/>
                </div>
                <div class="main_slider_frame">
                    <img id="b" src="images/2.png" height="400" width="600"/>
                </div>
                <div class="main_slider_frame">
                    <img id="b" src="images/3.png" height="400" width="600"/>
                </div>
                <div class="main_slider_frame">
                    <img id="b" src="images/4.png" height="400" width="600"/>
                </div>
                <div class="main_slider_frame">
                    <img id="b" src="images/5.png" height="400" width="600"/>
                </div>
                
                <div id="slider_content_holder">
                <span class="hylyt hyl2">12 reviews , 77 connections , 5 recommendations</span>
                    <ul id="pagination">
                        <li id="prev"></li>
                        <li class="pag pag_cur"></li>
                        <li class="pag"></li>
                        <li class="pag"></li>
                        <li class="pag"></li>
                        <li class="pag"></li>
                        <li id="next"></li>
                     </ul>
                </div>
                
        </div>
        </div>
    </td>
    <td width="400">
        <div class="prof_details">
        <hd1><?php echo $name; ?></hd1><br/>
        <hd2><?php echo $role; ?> - <?php echo $dob; ?> years old</hd2><br/>
        <hd2><?php echo $region;?>,<?php echo $country;?></hd2><br/><br/>
        <div><table cellpadding="5" width="380">
        <tr valign="top"><td width="50%"><hd3>Languages known</hd3></td><td><hd4><?php echo $lang;?></hd4></td></tr>
        <tr valign="top"><td><hd3>Build</hd3></td><td><hd4><?php echo $build;?></hd4></td></tr>
        <tr valign="top"><td><hd3>Height</hd3></td><td><hd4><?php echo $height;?></hd4></td></tr>
        <tr valign="top"><td><hd3>Best Features</hd3></td><td><hd4><?php echo $best;?></hd4></td></tr>
        </table></div>
        </div>
    </td>
</tr>
<tr>
    <td colspan="2">
    <table width="100%" class="prof_bar1" cellpadding="0" cellspacing="0">
    <tr>
    <td><a href="useroriginal.php?id=<?php echo $id4login;?>"> MY HOME</a></td>
    <td onclick=" <?php 
							$db='filmidid';
							mysql_select_db($db);
							$query="select * from network_map where ser_id='$id4login' and cli_id='$id'";
							$result = MYSQL_QUERY($query);
							$numberOfRows4name = MYSQL_NUM_ROWS($result);
					     	
							 if(@$numberOfRows4name==0 and $id4login!=$id)
							 {
							$query="insert into network_map values ( '$id4login','$id')";
							$result = MYSQL_QUERY($query);  }  ?>"><button class="prof_bar1">add to network</button> </td>
  
    <td><a href="message.php?id=<?php echo $id; ?>">MESSAGE</a></td>
    </tr>
    </table>
    </td>
</tr>
<tr valign="top" style="background-color:#FFF;">
	<td>
    <div class="prof_aboutme">
    <hd1>About me</hd1>
    <span>
<?php echo $about; ?>
    </span>
    </div>
    </td>
	<td>
    <div class="prof_showreel" style="width:398px;">
    <hd1>Showreel</hd1>
    <iframe width="398" height="250" src="http://www.youtube.com/embed/oZy9nQA5NU4" frameborder="0" allowfullscreen></iframe>
    </div>
    </td>
</tr>
<tr>
<td colspan="2">

</tr>
</table>
<div class="prof_aboutme" style="color:#0000FF;"  >
<hd1>
Artistic Skills:<br/></hd1>
<span class="box"><?php echo $skill1;?></span>
<hd1>
Technical Skills:<br/></hd1>
<span class="box"><?php echo $skill2;?></span><hd1>
Experience:<br/></hd1>
<span class="box"><?php echo $skill3;?></span>


</div>
</div>
<script>
$("#float_nav").hide();
</script>