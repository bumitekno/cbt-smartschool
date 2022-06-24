<?php
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');


$zip = new ZipArchive;
$zip->open('images.zip');
$zip->extractTo('./../gbr/');
$zip->close();
unlink('images.zip');

header("location:syncupload.php?pesan=sukses");
exit();
?>