<?php
$mapel=$_GET['matpel'];
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
include ('../../koneksi/koneksi.php');

if ($edit = mysqli_query($konek, "UPDATE ujian SET aktif='0' WHERE mapel='$mapel' and jenis='$jenis' and kodesoal='$kode'")){
		header("Location:../soal.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
?>