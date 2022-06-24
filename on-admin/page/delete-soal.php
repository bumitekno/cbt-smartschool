<?php
session_start();
include ('../../koneksi/koneksi.php');
include ('../conn/cek.php');
include ('../conn/fungsi.php');
if($admin_su == 1)
{
$username=$_SESSION['admin'];
}
else if ($admin_su == 0)
{
$username=$_SESSION['admin'];
}
else
{
header('location:../soal.php?gagal=1');
exit;
}
$mapel=$_GET['matpel'];
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
mysqli_query ($konek, "DELETE FROM soal where kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode'");
mysqli_query ($konek, "DELETE FROM ujian where kodesoal='$kode'");
header('location:../soal.php');
?>
