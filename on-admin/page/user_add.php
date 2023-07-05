<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');

$nip			= $_POST['nip'];
$nama			= $_POST['nama'];
$jabatan 		= $_POST['jabatan'];
$pass			= $_POST['pass'];


if ($add = mysqli_query($konek, "INSERT INTO users (nip, nama, admin_su, pass) VALUES 
	('$nip', '$nama', '$jabatan', '$pass')")){
		header("Location:../super.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>