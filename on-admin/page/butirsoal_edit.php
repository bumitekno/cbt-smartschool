<?php
include ('../../koneksi/koneksi.php');

$id			= $_POST['id'];
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
$gambarsoal			= $_POST['gambarsoal'];
$gambar_a  			= $_POST['gambar_a'];
$gambar_b   		= $_POST['gambar_b'];
$gambar_c 			= $_POST['gambar_c'];
$gambar_d 			= $_POST['gambar_d'];
$gambar_e 			= $_POST['gambar_e'];
$audio 			= $_POST['audio'];

if ($edit = mysqli_query($konek, "UPDATE soal SET jenissoal='$jenissoal', kodemapel='$kodemapel', kodesoal='$kodesoal', soal='$soal', pilihan1='$pilihan1', pilihan2='$pilihan2', pilihan3='$pilihan3', pilihan4='$pilihan4', pilihan5='$pilihan5', kunci='$kunci', gambarsoal='$gambarsoal', gambar_a='$gambar_a', gambar_b='$gambar_b', gambar_c='$gambar_c', gambar_d='$gambar_d', gambar_e='$gambar_e', audio='$audio' WHERE id='$id'")){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
?>