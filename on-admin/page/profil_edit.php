<?php
include ('../../koneksi/koneksi.php');


$nama				= $_POST['nama'];
$jabatan		 	= $_POST['jabatan'];
$username			= $_POST['nip'];
$pass				= $_POST['pass'];
$phone				= $_POST['phone'];
$instagram			= $_POST['instagram'];
$youtube			= $_POST['youtube'];

if (empty($lokasi_file)) {
	if ($edit = mysqli_query($konek, "UPDATE users SET nama='$nama', jabatan='$jabatan', nip='$username', pass='$pass', phone='$phone', instagram='$instagram', youtube='$youtube' WHERE nip='$username'")){
		header("Location:../profil.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

}else {	
	$hapus=mysqli_query($konek, "SELECT * FROM users WHERE nip='$username'");
    $r=mysqli_fetch_array($hapus);
	$d = '../aset/foto_siswa/'.$r['foto'];
	unlink ("$d");
	move_uploaded_file($lokasi_file,"../aset/foto_siswa/$nama_file");
	if ($edit = mysqli_query($konek, "UPDATE users SET nama='$nama', jabatan='$jabatan', nip='$username', pass='$pass', phone='$phone', instagram='$instagram', youtube='$youtube' WHERE nip='$username'")){
			header("Location:../profil.php");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}
?>