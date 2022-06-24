<?php
include ('../../koneksi/koneksi.php');
mysqli_query ($konek, "TRUNCATE TABLE siswa");
header('location:../siswa.php');
?>