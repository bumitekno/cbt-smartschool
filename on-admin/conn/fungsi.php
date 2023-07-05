<?php 
$query = mysqli_query ($konek, "SELECT * FROM users WHERE nip='$username'");
$ar = mysqli_fetch_array ($query);
$nama=$ar['nama'];
$pass=$ar['pass'];
$nip=$ar['nip']; 
$jabatan=$ar['jabatan'];  
$instagram=$ar['instagram']; 
$youtube=$ar['youtube']; 
$phone=$ar['phone']; 
$admin_su=$ar['admin_su']; 
?>
