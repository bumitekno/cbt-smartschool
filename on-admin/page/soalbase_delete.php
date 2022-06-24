<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');

$id	= $_GET["id"];

if($delete = mysqli_query ($konek, "DELETE FROM ujian WHERE Urut='$id'")){
	header("Location:../soalbase.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>