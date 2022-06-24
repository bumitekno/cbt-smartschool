<?php
include "../../koneksi/koneksi.php";
mysqli_query ($konek, "TRUNCATE TABLE siswa");
header('location:../reset.php?sukses=1');
?>