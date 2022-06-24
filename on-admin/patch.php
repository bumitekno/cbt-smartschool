<?php
session_start();
include ('../koneksi/koneksi.php');
include ('../koneksi/db.php');
include ('conn/cek.php');
include ('conn/fungsi.php');

$filer=$_POST['filer'];
file_put_contents(
    'versi/aktif/patch'.$filer.'.zip',
    file_get_contents( 'https://smpn38sby.sch.id/update_cbtschool/patch'.$filer.'.zip' )
);

$zip = new ZipArchive;
$zip->open('versi/aktif/patch'.$filer.'.zip');
$zip->extractTo('../');
$zip->close();
unlink('versi/aktif/patch'.$filer.'.zip');

$myfile2 = fopen("versi/aktif/patch.txt", "r");
while(!feof($myfile2)) {
$baca2 .=fgets($myfile2);
}
fclose($myfile2);
$result_alter = mysqli_query($konek,"$baca2");
unlink('versi/aktif/patch.txt');    
header("location:patching.php?pesan=sukses");
exit();
?>
