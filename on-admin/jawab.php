<?php
session_start();
include ('../koneksi/koneksi.php');
$kods = $_POST['ks1'];
$kom = $_POST['km1'];
$username = $_POST['nis'];

// $sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
mysqli_query($konek, "update siswa set statuslogin='0'where nis='$username'");

$querydosen = mysqli_query($konek, "SELECT * FROM ujian WHERE kodesoal='$kods' and mapel='$kom'");
if ($querydosen == false) {
	die ("Terjadi Kesalahan : " . mysqli_error($konek));
}


// Jawaban siswa sementara
$jawabSementara = mysqli_query($konek, "SELECT * FROM jawaban WHERE nis='$username'");



$data_jawaban = [];

while ($ar = mysqli_fetch_array($querydosen)) {
	$kunci_soals = $ar['kunci'];
	$nilaipg = $ar['nilai'];
}

while ($ar = mysqli_fetch_array($jawabSementara)) {
	$data_jawaban = $ar['jawabansiswa'];
} 

$kunci_soal = str_split($kunci_soals);
$data_jawaban = str_split($data_jawaban);

$benar = 0; // Inisialisasi variabel untuk menghitung perbedaan
$salah = 0;

// Pastikan kedua array memiliki panjang yang sama
$length = count($data_jawaban);

for ($i = 0; $i < $length; $i++) {
    // Bandingkan setiap elemen di indeks yang sama
    if ($kunci_soal[$i] == $data_jawaban[$i]) {
        $benar++; // Tambahkan jika ada elemen yang berbeda
    }else{
		$salah++;
	}
}

$score = $nilaipg/$length*$benar;




	//$edit = mysqli_query($konek, "UPDATE jawaban SET jawabansiswa='$answer', kuncisoal='$key', benar='$jam', salah='$tanggal', nilai='$score', sisawaktu='$sisawaktu', mulaiujian='$mulaiujian', waktuselesai='$waktuselesai' WHERE nis='$username'");

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
			('$ar[nis]', '$ar[nama]', '$ar[kelas]', '$ar[kodemapel]', '$ar[kodesoal]', '1', '$length', '$ar[jawabansiswa]', '$benar', '$salah', '$score', '$kunci_soals', '$jam')");
		if (!$add) {
			print_r(mysqli_error($konek));
		} else {
			mysqli_query($konek, "UPDATE siswa set statuslogin='0' where nis='$username'");
			mysqli_query($konek, "DELETE FROM jawaban where nis='$username'");
		}
		

	}

	header("Location:monitor.php");
		exit();



	die ("Terdapat kesalahan : " . mysqli_error($konek));

?>