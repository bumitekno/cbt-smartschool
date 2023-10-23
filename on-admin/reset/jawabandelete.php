<?php
include "../../koneksi/koneksi.php";
mysqli_query($konek, "TRUNCATE TABLE jawaban");
mysqli_query($konek, "TRUNCATE TABLE jawabother");
header('location:../reset.php?sukses=1');
?>