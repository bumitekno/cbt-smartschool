<?php
include "../../koneksi/koneksi.php";
mysqli_query($konek, "TRUNCATE TABLE nilaihasil");
mysqli_query($konek, "TRUNCATE TABLE jawaburaian");
mysqli_query($konek, "TRUNCATE TABLE jawabother");
header('location:../reset.php?sukses=1');
?>