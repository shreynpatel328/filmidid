<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>



<?php
  $key = $_GET['key'];
  $con = mysql_connect('127.0.0.1','root','');
  mysql_select_db('filmidid');
  $query = "select name from user_details where name like '%$key%'";
  $res = mysql_query($query);
  $ans = "";
  while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
  	$ans.= $row['name'] . "<br />";
  }
  echo $ans;
   mysql_close($con);
?><body>
</body>
</html>