<?php 
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
include "bundle/script.php";
mysqli_query ($konek, "UPDATE siswa SET online='2' WHERE nis='$username'"); 
?>
<?php
session_start();
session_destroy();
header('location:../login.php');
?>