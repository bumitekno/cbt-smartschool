<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');

    
$nis			= $_POST[nis];
$nama			= $_POST[nama];
$kelas 			= $_POST[kelas];
$kodemapel		= $_POST[kodemapel];
$kodesoal		= $_POST[kodesoal];
$aktif			= $_POST[aktif];
$waktu			= $_POST[waktu];
$jumlahsoal		= $_POST[jumlahsoal];
$lamaujian      = $_POST[lamaujian];
$mulaiujian     = $_POST[mulaiujian];
$waktuselesai   = $_POST[waktuselesai];
$sisawaktu      = $_POST[sisawaktu]+(60);

$ok         = $_POST[ok];


         if ($statuslogin =='1') {
        header('location:confirm.php?aktif=1');
        } elseif ($ok =='1') {
        header('location:confirm.php?sudah=1');
        } else {
        ($add = mysqli_query($konek, "INSERT INTO jawaban (nis, nama, kelas, kodemapel, kodesoal, aktif, waktu, jumlahsoal, lamaujian, mulaiujian, waktuselesai, sisawaktu) VALUES 
        	('$nis', '$nama', '$kelas', '$kodemapel', '$kodesoal', '$aktif', '$waktu', '$jumlahsoal', '$lamaujian', '$mulaiujian', '$waktuselesai', '$sisawaktu') ON DUPLICATE KEY UPDATE nis='$username', nama='$nama', kelas='$kelas' "));
        		header("Location:konfirm.php");
        		fclose($file);
        		exit();
        }   

?>