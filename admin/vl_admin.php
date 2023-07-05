<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include('../koneksi/base.php');
session_start();
$username 	= $_POST['username'];
$password	= $_POST['password'];

$username = mysqli_real_escape_string($connsite, $username);
$password = mysqli_real_escape_string($connsite, $password);
$q = mysqli_query($connsite, "select nip,pass,nama from users where nip='$username' and pass='$password'");
if (mysqli_num_rows($q) == 1) {
$_SESSION['admin'] = $username;
$_SESSION['nama'] = $nama;
header('location:../on-admin/index.php');
} else {
header('location:login.php?salah=1');
}
?>