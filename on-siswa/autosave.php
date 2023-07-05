<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
include ('pilihan.php');
mysqli_query($konek, "update siswa set statuslogin='1'where nis='$nis'");
$query = mysqli_query ($konek, "SELECT * FROM jawaban WHERE nis='$nis'");
						if($query == false){
						die ("Terjadi Kesalahan : ". mysqli_error($konek));
						$i=1;
						}
						while ($ar = mysqli_fetch_array ($query)){
$sisawaktu      = $ar['sisawaktu']-(60);
}
//Memnyimpan artikel ke database
mysqli_query($konek, "UPDATE jawaban SET jawabansiswa='$answer', sisawaktu='$sisawaktu' WHERE nis='$nis'");
?>