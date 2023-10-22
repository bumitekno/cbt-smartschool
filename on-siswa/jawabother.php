<?php
session_start();
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');

date_default_timezone_set('Asia/Jakarta');
$jam = date("h:i:sa");
$tanggal = date("Y-m-d");
$tokenx = $_POST['tokenjd'];
$nomersoal = $_POST['nomersoal'];
$unik = $_POST['unik'];
$kodemapel = $_POST['kodemapel'];
$tipe = $_POST['tipe'];

//Memnyimpan artikel ke database
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");

$check = mysqli_query($konek, "SELECT id FROM jawabother WHERE id='$unik'");

$barx = mysqli_num_rows($check);

if ($tipe == 4) {
    $sql_create = mysqli_query($konek, "REPLACE into jawabother(id,jawaban,nomersoal,nis,nama,kodesoal,tipe,tanggal,waktu) VALUES ('$unik','$tokenx','$nomersoal','$nis','$nama','$kodemapel','$tipe','$tanggal','$jam')");
} else {
    if ($barx > 0) {
        $sql_update = mysqli_query($konek, "UPDATE jawabother SET jawaban='$tokenx',tanggal='$tanggal',waktu='$jam' WHERE nis='$nis' AND id='$unik'");
    } else {
        $sql_create = mysqli_query($konek, "INSERT into jawabother(id,jawaban,nomersoal,nis,nama,kodesoal,tipe,tanggal,waktu) VALUES ('$unik','$tokenx','$nomersoal','$nis','$nama','$kodemapel','$tipe','$tanggal','$jam')");
    }
}



?>