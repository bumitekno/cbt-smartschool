<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connsite = mysqli_connect('mysql', 'root', 'root');
mysqli_select_db($connsite, 'cbt_eschool');
?>