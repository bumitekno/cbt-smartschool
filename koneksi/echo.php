<?php
error_reporting(0);
$host="localhost";
$usersite="root";
$passsite="";
mysql_connect("$host","$usersite","$passsite") or die
("<body style='background-color:#333;text-align:center;color:#FFF;'><h1></br>T I D A K _ T E R S E D I A</h1></body>") ;
mysql_select_db('cbt_eschool') or die;
?>