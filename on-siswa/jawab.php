<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
include ('pilihan.php');
$kods = $_POST['ks1'];
$kom = $_POST['km1'];
$jumlah = $_POST['jumlah1'];
$sisawaktu = $_POST['sisawaktu'];
$mulaiujian = $_POST['mulaiujian'];
$waktuselesai = $_POST['waktuselesai'];

$sql_mode = mysqli_query($konek, "SET sql_mode = '';");
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

	$dataJawaban = [];

	while ($soal = mysqli_fetch_array($querysoal)) {
		$queryhistory = mysqli_query($konek, "SELECT * FROM jawabother WHERE kodesoal='$soal[kodesoal]' AND tanggal='$tanggal' AND nis='$username' AND nomersoal='$soal[nomersoal]'");

		$checkrow = mysqli_num_rows($queryhistory);

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


	if ($edit = mysqli_query($konek, "UPDATE jawaban SET jawabansiswa='$dataJawaban', benar='$benar', salah='$salah', nilai='$score', sisawaktu='$sisawaktu', mulaiujian='$mulaiujian', waktuselesai='$waktuselesai' WHERE nis='$username'")) {
		
		if($delete = mysqli_query($konek, "DELETE FROM jawabother WHERE kodesoal='$kods' AND nis='$username'") ){

			header("Location:koreksi.php");
			exit();
		}
	}

	die ("Terdapat kesalahan : " . mysqli_error($konek));

} ?>