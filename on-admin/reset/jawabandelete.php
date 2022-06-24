<?php
include "../../koneksi/koneksi.php";
mysqli_query ($konek, "TRUNCATE TABLE jawaban");
header('location:../reset.php?sukses=1');
?>