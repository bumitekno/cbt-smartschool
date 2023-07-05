<?php
include ('../../koneksi/koneksi.php');

$id	= $_GET["id"];

if($delete = mysqli_query ($konek, "DELETE FROM soal WHERE id='$id'")){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>
