<?php
include('../../koneksi/koneksi.php');
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
mysqli_query($konek, "TRUNCATE TABLE siswa");
header('location:../siswa.php');
?>