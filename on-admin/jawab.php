<?php
session_start();
include ('../koneksi/koneksi.php');
$kods = $_POST['ks1'];
$kom = $_POST['km1'];
$username = $_POST['nis'];
$jumlah         =$_POST['jumlah1'];
$sisawaktu      =$_POST[sisawaktu];
$mulaiujian     = $_POST[mulaiujian];
$waktuselesai   = $_POST[waktuselesai];

// $sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
mysqli_query($konek, "update siswa set statuslogin='0'where nis='$username'");

$querydosen = mysqli_query($konek, "SELECT * FROM ujian WHERE kodesoal='$kods' and mapel='$kom'");
if ($querydosen == false) {
	die ("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($ar = mysqli_fetch_array($querydosen)) {
	date_default_timezone_set('Asia/Jakarta');
	$jam=date("h:i:sa");
	$tanggal=date("d-m-Y");
	$key=$ar[kunci];
	$nilaipg=$ar['nilai'];
	$score=0;
	$benar=0;
	$salah=0;
	$kosong=0;

	for ($i=0;$i<$jumlah;$i++){
			if($key[$i]==$answer[$i]){
			//jika jawaban cocok (benar)
			$benar++;
			}else{
			//jika salah
			$salah++;
		}  
	}
	$score = $nilaipg/$jumlah*$benar;

	$edit = mysqli_query($konek, "UPDATE jawaban SET jawabansiswa='$answer', kuncisoal='$key', benar='$jam', salah='$tanggal', nilai='$score', sisawaktu='$sisawaktu', mulaiujian='$mulaiujian', waktuselesai='$waktuselesai' WHERE nis='$username'");

	date_default_timezone_set('Asia/Jakarta');
	$jam = date("Y-m-d h:i:s");


    // koreksi
	$querydosen = mysqli_query($konek, "SELECT * FROM jawaban WHERE nis='$username'");

	if ($querydosen == false) {
		die ("Terjadi Kesalahan : " . mysqli_error($konek));
	}

	while ($ar = mysqli_fetch_array($querydosen)) {
		$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");

		if (is_nan($ar['nilai'])) {
			$ar['nilai'] = 0;
		}

		$add = mysqli_query($konek, "INSERT INTO nilaihasil (nis, nama, kelas, kodemapel, kodesoal, aktif, jumlahsoal, jawabansiswa, benar, salah, nilai, kuncisoal, waktuselesai) VALUES 
			('$ar[nis]', '$ar[nama]', '$ar[kelas]', '$ar[kodemapel]', '$ar[kodesoal]', '1', '$ar[jumlahsoal]', '$ar[jawabansiswa]', '$ar[benar]', '$ar[salah]', '$ar[nilai]', '$ar[kuncisoal]', '$jam')");
		if (!$add) {
			print_r(mysqli_error($konek));
		} else {
			mysqli_query($konek, "update siswa set statuslogin='0' where nis='$username'");
			mysqli_query($konek, "DELETE FROM jawaban where nis='$username'");
		}

	}

	header("Location:monitor.php");
		exit();



	die ("Terdapat kesalahan : " . mysqli_error($konek));

} ?>