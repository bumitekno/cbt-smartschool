<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');

$id	= $_GET["id"];

$hapus=mysqli_query($konek, "SELECT * FROM siswa WHERE id='$id'");
    $r=mysqli_fetch_array($hapus);
  $d = '../aset/foto_siswa/'.$r['foto'];
  unlink ("$d");

if($delete = mysqli_query ($konek, "DELETE FROM siswa WHERE id='$id'")){
	header("Location:../siswa.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>