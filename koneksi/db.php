<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connsite = mysqli_connect('localhost', 'root', '');
mysqli_select_db($connsite, 'cbt_school');
?>