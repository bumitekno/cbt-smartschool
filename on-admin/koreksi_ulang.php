<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
$nis=$_GET['nis'];
$kodesoal=$_GET['kodesoal'];

$query = mysqli_query ($konek, "SELECT * FROM nilaihasil WHERE nis='$nis' AND kodesoal='$kodesoal'");
$queryKunciJawaban = mysqli_query ($konek, "SELECT * FROM soal WHERE kodesoal='$kodesoal' AND `status` IN('1','3','4','5') ORDER BY `nomersoal` ASC");
$queryujian = mysqli_query ($konek, "SELECT * FROM ujian where kodesoal='$kodesoal'");
$jumlahsoal = mysqli_num_rows($queryKunciJawaban);
$bobot = 0;

if($query == false || $queryKunciJawaban == false || $queryujian == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
}

while ($ujian = mysqli_fetch_array ($queryujian)){
    $bobot = $ujian['nilai'];
}

$jawabanSiswa = [];
while ($hasilJawaban = mysqli_fetch_array ($query)){
    $id_hasil = $hasilJawaban['id'];
    $hilang = str_replace("\n","",$hasilJawaban['jawabansiswa']);
    $dataJawabanSiswa = json_decode($hilang, true);
    foreach ($dataJawabanSiswa as $item) {
        foreach ($item as $key => $value) {
            $jawabanSiswa[$key] =  $value;
        }
    }
}

$kunciSoal = [];
$dataKunci = [];
while ($kunci = mysqli_fetch_array ($queryKunciJawaban)){
    $kunciSoal[$kunci['nomersoal']] = str_replace("\n","",$kunci['kunci']);
    $dataKunci[] = [
        $kunci['nomersoal'] => str_replace("\n","",$kunci['kunci'])
    ];
}

$benar = 0;
$salah = 0;
foreach ($jawabanSiswa as $key => $jawaban){
    $jawaban = str_replace(' ','', $jawaban);
    $kunci = str_replace(' ','', $kunciSoal[$key]);
    if($jawaban == $kunci){
        $benar++;
    }
}

$score = $benar / $jumlahsoal * (int) $bobot;
$salah = $jumlahsoal - $benar;

$dataKunci = json_encode($dataKunci);

$update = mysqli_query($konek, "UPDATE nilaihasil set benar='$benar', kuncisoal='$dataKunci', salah='$salah', nilai='$score' where id='$id_hasil'");

if ($update == true) {
    echo true;
    // header("Location:hasiltest.php");
    // exit();
}else{
    echo false;
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
}





?>