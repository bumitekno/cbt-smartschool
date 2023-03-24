<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');

$id					= $_POST['id'];
$n_sekolah			= $_POST['n_sekolah'];
$sub_n_sekolah		= $_POST['sub_n_sekolah'];
$kepsek				= $_POST['kepsek'];
$nip				= $_POST['nip'];
$jenis_ujian		= $_POST['jenis_ujian'];
$kota			    = $_POST['kota'];
$tanggal			= $_POST['tanggal'];
$th_ajaran			= $_POST['th_ajaran'];
$kode_sekolah		= $_POST['kode_sekolah'];
$web			    = $_POST['web'];


	if ($edit = mysqli_query($konek, "UPDATE profil SET n_sekolah='$n_sekolah', sub_n_sekolah='$sub_n_sekolah', kepsek='$kepsek', nip='$nip', jenis_ujian='$jenis_ujian', kota='$kota', tanggal='$tanggal', th_ajaran='$th_ajaran', kode_sekolah='$kode_sekolah', web='$web'  WHERE id='$id'")){
		header("Location:../theme.php?sukses=1");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
?>