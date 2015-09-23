<?php		

$search=$_SESSION['SEARCH'];
$rating=$_SESSION['RATING'];
$pop4video=$_SESSION['POPULAR4VIDEO'];

$append="";
if($pop4video==4)
{
$append=", views ";
}


$pagenum=@$_GET["pagenum"];

 
	   if (!isset($_SESSION['SESSION'])) 
	   		require ( "includes/session_init.php");
	   
	    if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: index.php");
			exit;
	    }
		
		$eMail=$_SESSION['EMAIL'];
		
		
 include ( "includes/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
						if($connect)
						{	
							$db='filmidid';
							mysql_select_db($db);
							
							if (!(isset($pagenum))) 
							$pagenum = 1; 
						$query1="SELECT * FROM user_details d,user_login l where d.eMail=l.eMail and d.password=l.password and d.name like '%$search%'";
							$result1=mysql_query($query1); 
						    $rows = mysql_num_rows($result1); 	
							 
							$page_rows = 16;
							$last = ceil($rows/$page_rows); 
							
							  if ($pagenum < 1) 
							 $pagenum = 1; 
							elseif ($pagenum > $last) 
							 $pagenum = $last; 

 							
								 $max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
								 
 								
								$data_p = mysql_query("SELECT * FROM user_details order by name$append desc $max") or die(mysql_error());
							    $rows4final=mysql_num_rows($data_p);
								
 
 


							
						}

 ?>
<script>
$("#float_nav").hide();

</script>

<div class="search_job">
		<div class="sort_by">
		  <table width="968" border="0">
          <tr>
            <td width="543" align="left" valign="top">Sort By : <a href="includes/sort.php?value=3" style="color:#00ff99">  Rating </a>, <a href="includes/sort.php?value=4" style="color:#00ff99">Popularity </a></td>
            <td width="415" align="left" valign="top" ><?php

 if ($pagenum == 1) 

 {

 } 

 else 

 {

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=1' style='color:#00ff99'>  <<-First</a> ";

 echo " ";

 $previous = $pagenum-1;

 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous' style='color:#00ff99'> <-Previous</a> ";

 }
  echo " "; echo " "; echo " ";
echo "Page: <a href='{$_SERVER['PHP_SELF']}?pagenum=$pagenum' style='color:#2be'>$pagenum</a>....<a href='{$_SERVER['PHP_SELF']}?pagenum=$last' style='color:#2be'>$last</a> ";
 echo " "; echo " "; echo " ";
 

if ($pagenum == $last) 
{
 } 
else {
$next = $pagenum+1;
echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$next' style='color:#00ff99'>Next -></a> ";
echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$last' style='color:#00ff99'>Last ->></a> ";
} 

		?></td>
          </tr>
        </table>
		</div>
		<?php 
		$rows1=$rows;

		$i=0;
		$k=0;
		while($i<4 and $rows>0)
		{
		?>
     	<div class="video_container">
		 	<table border="0">
			<tr>
			<table border="0">
			<tr>
			<td><?php if($rows>0){ $rows--; ?> <div class="profile_container"><?php $thisid=mysql_result($result1,$k,"id"); $thisname=mysql_result($result1,$k,"name"); $k++; ?><a href="user.php?id=<?php echo $thisid;?>" style="color:#00FF00"><img src="pics/<?php echo $thisid;?>.png" width="160" height="250"><p style="color:#00FF00" align="center"><?php echo $thisname;?></p></a></div> <?php }?></td>
		<td><?php if($rows>0){ $rows--; ?> <div class="profile_container"><?php $thisid=mysql_result($result1,$k,"id"); $thisname=mysql_result($result1,$k,"name"); $k++; ?><a href="user.php?id=<?php echo $thisid;?>" style="color:#00FF00"><img src="pics/<?php echo $thisid;?>.png" width="160" height="250"><p style="color:#00FF00" align="center"><?php echo $thisname;?></p></a></div> <?php }?></td>
		<td><?php if($rows>0){ $rows--; ?> <div class="profile_container"><?php $thisid=mysql_result($result1,$k,"id"); $thisname=mysql_result($result1,$k,"name"); $k++; ?><a href="user.php?id=<?php echo $thisid;?>" style="color:#00FF00"><img src="pics/<?php echo $thisid;?>.png" width="160" height="250"><p style="color:#00FF00" align="center"><?php echo $thisname;?></p></a></div> <?php }?></td>
		<td><?php if($rows>0){ $rows--; ?> <div class="profile_container"><?php $thisid=mysql_result($result1,$k,"id"); $thisname=mysql_result($result1,$k,"name"); $k++; ?><a href="user.php?id=<?php echo $thisid;?>" style="color:#00FF00"><img src="pics/<?php echo $thisid;?>.png" width="160" height="250"><p style="color:#00FF00" align="center"><?php echo $thisname;?></p></a></div> <?php }?></td>
			</tr>
			</table>
			</tr>
			</table>
		</div>
		<?php 
		$i++;
		}
		?>
</div>