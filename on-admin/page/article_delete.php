<?php
include ('../../koneksi/koneksi.php');

$id	= $_GET["id"];

$hapus=mysqli_query($konek, "SELECT * FROM article WHERE id='$id'");

if($delete = mysqli_query ($konek, "DELETE FROM article WHERE id='$id'")){
	header("Location:../pesan.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>