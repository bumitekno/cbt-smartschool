<?php
include('../../koneksi/koneksi.php');
$id = $_GET["id"];
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
if ($edit = mysqli_query($konek, "UPDATE users SET pass='admin12345' WHERE id='$id'")) {
	header("Location:../super.php?reset=1");
	exit();
}
die("Terdapat kesalahan : " . mysqli_error($konek));

?>