<?php
error_reporting(0);
include("config.php");
$host = DB_HOSTNAME;
$usersite = DB_USERNAME;
$passsite = DB_PASSWORD;
$connsite = mysqli_connect("$host", "$usersite", "$passsite") or die
    ("<body style='background-color:#333;text-align:center;color:#FFF;'><h1></br>T I D A K _ T E R S E D I A</h1></body>");
mysqli_select_db($connsite, DB_DATABASE) or die;
?>