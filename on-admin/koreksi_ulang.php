<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
$nis=$_GET['nis'];
$kodesoal=$_GET['kodesoal'];

$query = mysqli_query ($konek, "SELECT * FROM nilaihasil WHERE nis='$nis' AND kodesoal='$kodesoal'");

if($query == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
    $i=1;
}

while ($hasil = mysqli_fetch_array ($query)){
    $id_hasil = $hasil['id'];
    $queryujian = mysqli_query ($konek, "SELECT * FROM ujian where kodesoal='$kodesoal'");
    if($queryujian == false){
        die ("Terjadi Kesalahan : ". mysqli_error($konek));
    }

    while ($ujian = mysqli_fetch_array ($queryujian)){
        $kuncijawaban = str_replace(" ","",$ujian['kunci']);
        $jumlahsoal = strlen($kuncijawaban);
        $nilai = $ujian['nilai'];
    }

    $jawaban = $hasil['jawabansiswa'];
    $benar=0;
    $salah=0;

    for ($no=0;$no<strlen($kuncijawaban);$no++){
        if($jawaban[$no] == $kuncijawaban[$no]){
            $benar++;
        }else{
            $salah++;
        }
    }

    $score = ($benar/$jumlahsoal) * (int) $nilai;

    $update = mysqli_query($konek, "UPDATE nilaihasil set benar='$benar', salah='$salah', kuncisoal='$kuncijawaban' , nilai='$score' where id='$id_hasil'");

    if ($update == true) {
        header("Location:hasiltest.php");
		exit();
    }else{
        die ("Terjadi Kesalahan : ". mysqli_error($konek));
    }








}



?>