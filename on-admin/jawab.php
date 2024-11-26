<?php
session_start();
include ('../koneksi/koneksi.php');
$kods = $_POST['ks1'];
$kom = $_POST['km1'];
$username = $_POST['nis'];

$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
mysqli_query($konek, "update siswa set statuslogin='0'where nis='$username'");

$querydosen = mysqli_query($konek, "SELECT * FROM ujian WHERE kodesoal='$kods' and mapel='$kom'");
if ($querydosen == false) {
	die ("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($ar = mysqli_fetch_array($querydosen)) {
	date_default_timezone_set('Asia/Jakarta');

	$tanggal = date("Y-m-d");
	$nilaipg = $ar['nilai'];

	$score = 0;
	$benar = 0;
	$salah = 0;
	$kosong = 0;

	$querysoal = mysqli_query($konek, "SELECT * FROM soal WHERE `kodesoal`='$kods' AND `status` IN('1','3','4','5')");
	$jumlah = mysqli_num_rows($querysoal);

	while ($soal = mysqli_fetch_array($querysoal)) {
		$queryhistory = mysqli_query($konek, "SELECT * FROM jawabother WHERE kodesoal='$soal[kodesoal]' AND tanggal='$tanggal' AND nis='$username' AND nomersoal='$soal[nomersoal]'");

		$dataJawaban = [];

		while ($jawaban = mysqli_fetch_array($queryhistory)) {

			$kunci = strtolower(str_replace(' ', '-', $soal['kunci']));

			$dataJawaban[] = [
				$soal['nomersoal'] => $jawaban['jawaban']
			];

			//jawaban soal pg komplek
			if ($jawaban['tipe'] == 4) {
				$remove_coma = str_replace(',', '', $jawaban['jawaban']);
				if ($kunci == strtolower($remove_coma)) {
					$benar++;
				} else {
					$salah++;
				}
			} else {
				$jawaban_siswa = strtolower(str_replace(' ', '-', $jawaban['jawaban']));
				if ($kunci == strtolower($jawaban_siswa)) {
					$benar++;
				} else {
					$salah++;
				}
			}
		}
	}

	$score = $nilaipg / $jumlah * $benar;
	$dataJawaban = json_encode($dataJawaban);

	$edit = mysqli_query($konek, "UPDATE jawaban SET  benar='$benar', salah='$salah', nilai='$score' WHERE nis='$username'");
	$delete = mysqli_query($konek, "DELETE FROM jawabother WHERE kodesoal='$soal[kodesoal]' AND tanggal='$tanggal' AND nis='$username' AND nomersoal='$soal[nomersoal]'");

	date_default_timezone_set('Asia/Jakarta');
	$jam = date("Y-m-d h:i:s");

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
			('$ar[nis]', '$ar[nama]', '$ar[kelas]', '$ar[kodemapel]', '$ar[kodesoal]', '1', '$ar[jumlahsoal]', '$dataJawaban', '$ar[benar]', '$ar[salah]', '$ar[nilai]', '$ar[kuncisoal]', '$jam')");
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