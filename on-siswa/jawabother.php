<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');

date_default_timezone_set('Asia/Jakarta');
$jam = date("h:i:s");
$tanggal = date("Y-m-d");
$tokenx = $_POST['tokenjd'];
$nomersoal = $_POST['nomersoal'];
$unik = $_POST['unik'];
$kodemapel = $_POST['kodemapel'];
$tipe = $_POST['tipe'];

//Memnyimpan artikel ke database
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");

$data = $_SESSION["unix"];
// Jika sebelumnya pernah
if(in_array($unik,$data)){
    $sql_update = mysqli_query($konek, "UPDATE jawabother SET jawaban='$tokenx',tanggal='$tanggal',waktu='$jam' WHERE nis='$nis' AND id='$unik'");
}else{
    $data[] = $unik;
    // $_SESSION["unix"] = $data;
    $sql_create = mysqli_query($konek, "INSERT into jawabother(id,jawaban,nomersoal,nis,nama,kodesoal,tipe,tanggal,waktu) VALUES ('$unik','$tokenx','$nomersoal','$nis','$nama','$kodemapel','$tipe','$tanggal','$jam')");
}

$_SESSION["unix"] = $data;

?>