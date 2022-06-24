<?php
include ('../../koneksi/koneksi.php');


$id	= $_GET["id"];

	if ($edit = mysqli_query($konek, "UPDATE users SET pass='admin12345' WHERE id='$id'")){
			header("Location:../super.php?reset=1");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

?>