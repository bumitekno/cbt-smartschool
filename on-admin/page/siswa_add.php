<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');

$nis			= $_POST['nis'];
$nama			= $_POST['nama'];
$kelas 			= $_POST['kelas'];
$rombel 			= $_POST['rombel'];
$pass			= $_POST['pass'];
$sesi			= $_POST['sesi'];
$ruang			= $_POST['ruang'];
move_uploaded_file($lokasi_file,"../aset/foto_siswa/$nama_file");
if ($add = mysqli_query($konek, "INSERT INTO siswa (nis, nama, kelas, pass, sesi, ruang) VALUES 
	('$nis', '$nama', '$kelas$rombel', '$pass', '$sesi', '$ruang')")){
		header("Location:../siswa.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>