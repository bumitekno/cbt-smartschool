<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');

$id					= $_POST['id'];
$warna			    = $_POST['warna'];


	if ($edit = mysqli_query($konek, "UPDATE theme SET warna='$warna' WHERE id='$id'")){
		header("Location:../theme.php?sukses=1");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
?>