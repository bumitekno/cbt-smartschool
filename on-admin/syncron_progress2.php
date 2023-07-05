<?php
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');

$connect = mysqli_connect('localhost','root','');
if (!$connect) {
die('Could not connect to MySQL: ' . mysqli_error());
}
//nama database
$cid =mysqli_select_db($konek, 'smpnsby1_38school',$connect);

file_put_contents(
    'versi/aktif/images.zip',
    file_get_contents( 'https://smpn38sby.sch.id/update_cbtschool_v6/syncron/images.zip' )
);



$zip = new ZipArchive;
$zip->open('versi/aktif/images.zip');
$zip->extractTo('./images/');
$zip->close();
unlink('versi/aktif/images.zip');

header("location:sync.php?pesan=sukses");
exit();
?>