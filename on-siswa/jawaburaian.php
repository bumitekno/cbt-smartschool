<?php
session_start();
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');

$token = $_POST['token'];
$nomersoal = $_POST['nomersoal'];
$unik = $_POST['unik'];
$kodemapel = $_POST['kodemapel'];
$soal = $_POST['soal'];
$soal_gbr = $_POST['soal_gbr'];
$soal_audio = $_POST['soal_audio'];
$nama_file = '';


if(isset($_FILES['file'])){

	$lokasi_file = $_FILES['file']['tmp_name'];
	$nama_file = $_FILES['file']['name'];
	$allowedExtensions = ['jpg', 'jpeg', 'png', 'doc', 'docx' ,'xls','xlsx' ,'pdf'];
	$fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	
	if (!in_array($fileExtension, $allowedExtensions)) {
		http_response_code(400); 
		echo json_encode(['error' => 'File tidak valid']);
		exit();
	}
	
	move_uploaded_file($lokasi_file, "../file_siswa/$nama_file");
}else{
	$nama_file = '';
}


//Memnyimpan artikel ke database
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");

if($token != '' || $token != null){
	if ($q = mysqli_query($konek, "REPLACE into jawaburaian (id,jawaban,nomersoal,nis,nama,kodesoal,soal,soal_gbr,soal_audio,file) 
	VALUES ('$unik','$token','$nomersoal','$nis','$nama','$kodemapel','$soal','$soal_gbr','$soal_audio','$nama_file')")) {
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
	}else{
		http_response_code(400); 
		echo json_encode(['error' => 'Error']);
		exit; //
	}
}

?>