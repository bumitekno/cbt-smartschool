<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');
include ('../key.php');
$kods=$_POST['ks1'];
$kom=$_POST['km1'];


	if ($edit = mysqli_query($konek, "UPDATE ujian SET aktif='1', kunci='$key' WHERE mapel='$kom' and kodesoal='$kods'")){
		header("Location:../soal.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

?>