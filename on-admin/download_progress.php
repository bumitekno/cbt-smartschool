<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
$filer=$_POST['filer'];
file_put_contents(
    'versi/aktif/'.$filer.'.zip',
    file_get_contents( 'https://smpn38sby.sch.id/update_cbtschool_v6/'.$filer.'.zip' )
);

$zip = new ZipArchive;
$zip->open('versi/aktif/'.$filer.'.zip');
$zip->extractTo('../');
$zip->close();
unlink('versi/aktif/'.$filer.'.zip');

header("location:update.php");
exit();
?>