<?php 
unlink($_GET['file']);
header('location:laporan.php?hapus=1');
?>