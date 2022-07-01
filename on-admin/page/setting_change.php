<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');

$id					= $_POST['id'];
$n_sekolah			= $_POST['n_sekolah'];
$sub_n_sekolah		= $_POST['sub_n_sekolah'];
$kepsek				= $_POST['kepsek'];
$nip				= $_POST['nip'];
$kota			    = $_POST['kota'];
$tanggal			= $_POST['tanggal'];
$kode_sekolah		= $_POST['kode_sekolah'];
$web			    = $_POST['web'];


	if ($edit = mysqli_query($konek, "UPDATE profil SET n_sekolah='$n_sekolah', sub_n_sekolah='$sub_n_sekolah', kepsek='$kepsek', nip='$nip', kota='$kota', tanggal='$tanggal', kode_sekolah='$kode_sekolah', web='$web'  WHERE id='$id'")){
		header("Location:../theme.php?sukses=1");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
?>