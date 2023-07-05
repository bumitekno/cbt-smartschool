<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
mysqli_query ($konek, "DROP TABLE soal");
	// Membaca nama file
	$file_name = $_FILES['files']['name'];

	// Membaca ukuran file
	$size = $_FILES['files']['size'];

	// Membaca jenis file
	$file_type = $_FILES['files']['type'];
	
	// Source tempat upload file sementara
	$source = $_FILES['files']['tmp_name'];
	
	// Tempat upload file disimpan
	$direktori = "./$file_name";
	
	// Memindahkan upload file dari direktori sementara ke tempat permanen
	move_uploaded_file($source,$direktori);

header("location:soalsqlproses.php");
exit();
?>