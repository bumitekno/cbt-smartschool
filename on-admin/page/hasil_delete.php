<?php
include ('../../koneksi/koneksi.php');

$id	= $_GET["id"];
$kodesoal	= $_GET["kodesoal"];
$nama	= $_GET["nama"];
$busek = mysqli_query ($konek, "DELETE FROM jawaburaian WHERE nama='$nama' AND kodesoal='$kodesoal'");
$hapus=mysqli_query($konek, "SELECT * FROM nilaihasil WHERE id='$id'");

if($delete = mysqli_query ($konek, "DELETE FROM nilaihasil WHERE id='$id'")){
	header("Location:../hasiltest.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>