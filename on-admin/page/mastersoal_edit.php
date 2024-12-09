<?php
include('../../koneksi/koneksi.php');

$kodesoal_old = $_POST['kodesoal_old'];
$kodesoal = $_POST['kodesoal'];
$acak = $_POST['acak'];
$opsi = $_POST['opsi'];
$kelas = $_POST['kelas'];
$waktu = $_POST['waktu'];
$nilai = $_POST['nilai'];

$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
if ($edit = mysqli_query($konek, "UPDATE ujian SET kodesoal='$kodesoal', acak='$acak', kelas='$kelas', opsi='$opsi', nilai='$nilai', waktu='$waktu' WHERE kodesoal='$kodesoal_old'")) {
	if ($edit == false) {
		die("Terjadi Kesalahan : " . mysqli_error($konek));
	}

	header("Location:../soal.php");
	exit();
}
die("Terdapat kesalahan : " . mysqli_error($konek));
?>