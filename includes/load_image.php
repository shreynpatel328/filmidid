<?php
mysql_connect("localhost","root");
mysql_select_db("test");
$q="select * from employees where id=".$_GET['pic_id'];
$rec=mysql_fetch_array(mysql_query($q));
$data=$rec['profile_pic'];
header('Content-Length: '.strlen($data));
header("Content-type: image/".$rec['ext']);
echo $data;
?>