<?php
include('../../koneksi/koneksi.php');

$id = $_GET["id"];
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
if ($delete = mysqli_query($konek, "DELETE FROM soal WHERE id='$id'")) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit();
}
die("Terdapat Kesalahan : " . mysqli_error($konek));

?>