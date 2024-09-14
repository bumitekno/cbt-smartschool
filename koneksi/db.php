<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include("config.php");
$connsite = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
mysqli_select_db($connsite, DB_DATABASE);
?>