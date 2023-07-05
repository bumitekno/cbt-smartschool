<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');

$token = $_POST['token'];
$nomersoal = $_POST['nomersoal'];
$unik = $_POST['unik'];
$kodemapel = $_POST['kodemapel'];
$soal = $_POST['soal'];
$soal_gbr = $_POST['soal_gbr'];
$soal_audio = $_POST['soal_audio'];
//Memnyimpan artikel ke database
if ($q = mysqli_query($konek, "REPLACE into jawaburaian (id,jawaban,nomersoal,nis,nama,kodesoal,soal,soal_gbr,soal_audio) VALUES ('$unik','$token','$nomersoal','$nis','$nama','$kodemapel','$soal','$soal_gbr','$soal_audio')")){
	echo "
		<div id='us' class='save'>
		  <div class='loading'>
			<i class='fa fa-save fa-spin' style='font-size:54px'></i>
		  </div>
		</div>
<script>
setTimeout(function() {
$('#us').fadeOut();
}, 300);
</script>
	";
}
?>