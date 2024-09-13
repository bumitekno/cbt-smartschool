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
    
    // Menambahkan pengecekan status
    $q = mysqli_query($connsite, "SELECT nis, pass, nama, status FROM siswa WHERE BINARY nis='$username' AND pass='$password'");
    
    if (mysqli_num_rows($q) == 1) {
        $row = mysqli_fetch_assoc($q);
        
        // Memeriksa apakah statusnya aktif (status = 1)
        if ($row['status'] == 1) {
            $_SESSION['siswa'] = $username;
            $_SESSION['nama'] = $row['nama'];
            mysqli_query($connsite, "UPDATE siswa SET online='1' WHERE nis='$username'");
            header('location:on-siswa/index.php');
        } else {
            // Jika statusnya nonaktif
            header('location:login.php?status=nonaktif');
        }

    } else {
        header('location:login.php?salah=1');
    }
} else {
    fclose($file);
    header('location:login.php?token=1');
}
?>
