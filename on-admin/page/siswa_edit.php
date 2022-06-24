<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');


$id				= $_POST['id'];
$nis			= $_POST['nis'];
$nama		 	= $_POST['nama'];
$kelas 			= $_POST['kelas'];
$rombel 		= $_POST['rombel'];
$pass			= $_POST['pass'];
$sesi			= $_POST['sesi'];
$ruang			= $_POST['ruang'];

if (empty($lokasi_file)) {
	if ($edit = mysqli_query($konek, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas$rombel', pass='$pass', sesi='$sesi', ruang='$ruang' WHERE id='$id'")){
		header("Location:../siswa.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

}else {	
	$hapus=mysqli_query($konek, "SELECT * FROM siswa WHERE id='$id'");
    $r=mysqli_fetch_array($hapus);
	$d = '../aset/foto_siswa/'.$r['foto'];
	unlink ("$d");
	move_uploaded_file($lokasi_file,"../aset/foto_siswa/$nama_file");
	if ($edit = mysqli_query($konek, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas$rombel', pass='$pass', sesi='$sesi', ruang='$ruang' WHERE id='$id'")){
			header("Location:../siswa.php");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}
?>