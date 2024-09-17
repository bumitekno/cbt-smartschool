<?php
error_reporting(0);

include('../../koneksi/koneksi.php');

// Menggunakan GET sesuai format URL yang Anda tampilkan
$id = $_GET['id'];
$status = $_GET['status'];

// Set SQL mode untuk menghindari masalah mode strict di MySQL
$sql_mode = mysqli_query($konek, "SET @@sql_mode = '';");

// Cek apakah id dan status ada
if (isset($id) && isset($status)) {
    // Pastikan nilai $id dan $status adalah integer
    $id = intval($id);
    $status = intval($status);

    // Jalankan query update
    $query = "UPDATE siswa SET status='$status' WHERE id='$id'";
    if (mysqli_query($konek,$query)) {
        // Jika berhasil, redirect kembali ke halaman siswa
        header("Location: ../siswa.php");
        exit();
        } else {
            // Jika gagal, tampilkan pesan error dari MySQL
            die("Terdapat kesalahan: " . mysqli_error($konek));
        }
} else {
    echo "ID atau status tidak ditemukan dalam URL.";
}
?>