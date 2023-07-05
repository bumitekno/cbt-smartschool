<?php
include ('../../koneksi/koneksi.php');


$id				= $_POST['id'];
$content		= $_POST['content'];


if (empty($lokasi_file)) {
	if ($edit = mysqli_query($konek, "UPDATE article SET content='$content' WHERE id='$id'")){
		header("Location:../pesan.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

}else {	
	if ($edit = mysqli_query($konek, "UPDATE article SET content='$content' WHERE id='$id'")){
			header("Location:../pesan.php");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}
?>