<?php 
$query = mysqli_query ($konek, "SELECT * FROM siswa WHERE nis='$username'");
$ar = mysqli_fetch_array ($query);
$nama=$ar['nama'];
$pass=$ar['pass'];
$nis=$ar['nis']; 
$kelas=$ar['kelas'];  
$ruang=$ar['ruang']; 
$sesi=$ar['sesi']; 
$statuslogin=$ar['statuslogin']; 
?>
