<?php
session_start();
     $key = $_GET['key'];
      $_SESSION['VALUE']=$key;
      @session_register('VALUE');
?>