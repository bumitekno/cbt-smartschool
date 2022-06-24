<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include('../koneksi/base.php');
session_start();
$username 	= $_POST['username'];
$password	= $_POST['password'];

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$q = mysql_query("select nip,pass,nama from users where nip='$username' and pass='$password'");
if (mysql_num_rows($q) == 1) {
$_SESSION['admin'] = $username;
$_SESSION['nama'] = $nama;
header('location:../on-admin/index.php');
} else {
header('location:login.php?salah=1');
}
?>