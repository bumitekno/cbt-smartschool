<?php
error_reporting(0);
include('../../koneksi/koneksi.php');

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$agama = $_POST['agama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$rombel = $_POST['rombel'];
$pass = $_POST['pass'];
$sesi = $_POST['sesi'];
$ruang = $_POST['ruang'];
move_uploaded_file($lokasi_file, "../aset/foto_siswa/$nama_file");
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
if (
	$add = mysqli_query($konek, "INSERT INTO siswa (nis, nama, agama, kelas, jurusan, pass, sesi, ruang) VALUES 
	('$nis', '$nama','$agama', '$kelas$rombel','$jurusan', '$pass', '$sesi', '$ruang')")
) {
	header("Location:../siswa.php");
	exit();
}
die("Terdapat kesalahan : " . mysqli_error($konek));

?>