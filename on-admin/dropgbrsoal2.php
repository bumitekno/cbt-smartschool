<?php 
unlink($_GET['file']);
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>