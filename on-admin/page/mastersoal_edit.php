<?php
include ('../../koneksi/koneksi.php');

$kodesoal_old 	= str_replace(" ","-",$_POST['kodesoal_old']);
$kodesoal 		= str_replace(" ","-",$_POST['kodesoal']);
$acak			= $_POST['acak'];
$opsi		 	= $_POST['opsi'];
$kelas		 	= $_POST['kelas'];
$waktu		 	= $_POST['waktu'];
$nilai		 	= $_POST['nilai'];


	if ($edit = mysqli_query($konek, "UPDATE ujian SET kodesoal='$kodesoal', acak='$acak', kelas='$kelas', opsi='$opsi', nilai='$nilai', waktu='$waktu' WHERE kodesoal='$kodesoal_old'")){
			header("Location:../soal.php");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
?>