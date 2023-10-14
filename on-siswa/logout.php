<?php

include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');
include "bundle/script.php";
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
$exit = mysqli_query($konek, "UPDATE siswa SET online='2' WHERE nis='$username'");
session_start();
session_destroy();
echo '<script type="text/javascript">
           window.location = "/index.php"
      </script>';
?>