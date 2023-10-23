<?php
include "../../koneksi/koneksi.php";
mysqli_query($konek, "TRUNCATE TABLE soal");
mysqli_query($konek, "TRUNCATE TABLE ujian");
mysqli_query($konek, "TRUNCATE TABLE jawabother");
array_map('unlink', glob("../../gbr/*"));
header('location:../reset.php?sukses=1');
?>