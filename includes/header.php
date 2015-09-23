<div id="pop_bg"></div>
<div id="pop">
<button id="signup_box_close" >Close</button>
<div id="pop_cont">
<?php
include('login.php');
?>
</div>
</div>
<script type="text/javascript">
	   function showResult(key)
	   {
	         var obj = new XMLHttpRequest();
	   		obj.open('GET','includes/process1.php?key='+key,true);
	   		obj.send();
            obj.onreadystatechange = function(){
            	if(obj.readyState == 4 && obj.status == 200){
            		document.getElementById('').innerHTML=obj.responseText;
            	

            }

	   	}
	   }
	</script>

<div class="page" >
<div class="header">
	<button id="login_btn">LOGIN</button>
<a href="index.php"><img src="images/logo.png" style="float:left;" height="80" /></a>
<span style="margin-top:15px; font-size:14px; margin-left:30px; position:absolute;">Watch In : </span>
<button id="lang_sel" class="inp_text lang">
select language</button>
<a href="upload.php"><button id="lang_sel" class="inp_text lang" style="margin-top:45px;">
add content</button></a>

<div id="searchbar">
<form method="get" action="includes/check.php">
<input class="inp_text searchbarmain" type="text" name="search" placeholder="Search" /><img src="images/search.png" height="30" class="lens"/></a><br/>
<table class="bar_tabs" cellpadding="0" cellspacing="0">
<tr>
<td class="selected" onclick="showResult(1)">videos</td>
<td onclick="showResult(2)">profiles</td>
<td style="padding:0px 10px;" onclick="showResult(3)">jobs</td>
<td onclick="showResult(4)">forums</td>
</tr>
</table>
</form>
</div>

<div id="float_nav">
<ul>
<li>top<br/>Videos</li>
<hr class="hor"/>
<li>popular<br/>profiles</li>
<hr class="hor"/>
<li>featured<br/>jobs</li>
<hr class="hor"/>
<li>featured<br/>forums</li>
</ul>
</div>
</div>
</div>

