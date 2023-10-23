<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include('koneksi/base.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$inputtoken = $_POST['token'];
$file = fopen("on-siswa/token.txt", "r");
$token = fread($file, filesize("on-siswa/token.txt"));
if ($token == $inputtoken) {

    $username = mysqli_real_escape_string($connsite, $username);
    $password = mysqli_real_escape_string($connsite, $password);
    $q = mysqli_query($connsite, "select nis,pass,nama,statuslogin from siswa where BINARY nis='$username' and pass='$password'");
    if (mysqli_num_rows($q) == 1) {

        $_SESSION['siswa'] = $username;
        $_SESSION['nama'] = $nama;
        mysqli_query($connsite, "update siswa set online='1'where nis='$username'");
        header('location:on-siswa/index.php');


    } else {
        header('location:login.php?salah=1');
    }
} else {
    fclose($file);
    header('location:login.php?token=1');
}
?>