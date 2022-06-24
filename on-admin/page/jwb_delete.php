<?php
include ('../../koneksi/koneksi.php');

$nis	= $_GET["nis"];

$delete = mysqli_query ($konek, "DELETE  FROM jawaban WHERE nis='$nis'");
	header("Location:../ujianbase.php");
	exit();
?>