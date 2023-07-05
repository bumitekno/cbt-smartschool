<?php
include ('../../koneksi/koneksi.php');


$jenissoal			= $_POST['jenissoal'];
$kodemapel			= $_POST['kodemapel'];
$kodesoal			= $_POST['kodesoal'];
$nomersoal			= $_POST['nomersoal'];
$soal		    	= $_POST['soal'];
$pilihan1			= $_POST['pilihan1'];
$pilihan2			= $_POST['pilihan2'];
$pilihan3			= $_POST['pilihan3'];
$pilihan4			= $_POST['pilihan4'];
$pilihan5			= $_POST['pilihan5'];
$kunci  			= $_POST['kunci'];
$status 			= $_POST['status'];
$lokasi_file 	= $_FILES['gambarsoal']['tmp_name'];
$nama_file  	= $_FILES['gambarsoal']['name'];
move_uploaded_file($lokasi_file,"../../gbr/$nama_file");

$lokasi_file_a 	= $_FILES['gambar_a']['tmp_name'];
$nama_file_a  	= $_FILES['gambar_a']['name'];
move_uploaded_file($lokasi_file_a,"../../gbr/$nama_file_a");

$lokasi_file_b 	= $_FILES['gambar_b']['tmp_name'];
$nama_file_b  	= $_FILES['gambar_b']['name'];
move_uploaded_file($lokasi_file_b,"../../gbr/$nama_file_b");

$lokasi_file_c  = $_FILES['gambar_c']['tmp_name'];
$nama_file_c  	= $_FILES['gambar_c']['name'];
move_uploaded_file($lokasi_file_c,"../../gbr/$nama_file_c");

$lokasi_file_d 	= $_FILES['gambar_d']['tmp_name'];
$nama_file_d  	= $_FILES['gambar_d']['name'];
move_uploaded_file($lokasi_file_d,"../../gbr/$nama_file_d");

$lokasi_file_e 	= $_FILES['gambar_e']['tmp_name'];
$nama_file_e  	= $_FILES['gambar_e']['name'];
move_uploaded_file($lokasi_file_e,"../../gbr/$nama_file_e");

$lokasi_file_f 	= $_FILES['audio']['tmp_name'];
$nama_file_f  	= $_FILES['audio']['name'];
move_uploaded_file($lokasi_file_f,"../../gbr/$nama_file_f");

if ($add = mysqli_query($konek, "INSERT INTO soal (jenissoal, kodemapel, kodesoal, nomersoal, soal, pilihan1, pilihan2, pilihan3, pilihan4, pilihan5, kunci, gambarsoal, gambar_a, gambar_b, gambar_c, gambar_d, gambar_e, audio, status) VALUES 
	('$jenissoal', '$kodemapel', '$kodesoal', '$nomersoal', '$soal', '$pilihan1', '$pilihan2', '$pilihan3', '$pilihan4', '$pilihan5', '$kunci', '$nama_file', '$nama_file_a', '$nama_file_b', '$nama_file_c', '$nama_file_d', '$nama_file_e', '$nama_file_f', '$status')")){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>