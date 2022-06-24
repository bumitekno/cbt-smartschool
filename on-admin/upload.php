<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');

	// Membaca nama file
	$file_name = $_FILES['fupload']['name'];

	// Membaca ukuran file
	$size = $_FILES['fupload']['size'];

	// Membaca jenis file
	$file_type = $_FILES['fupload']['type'];
	
	// Source tempat upload file sementara
	$source = $_FILES['fupload']['tmp_name'];
	
	// Tempat upload file disimpan
	$direktori = "upload/$file_name";
	
	// Mengecek apakah file yang di upload sudah ada atau belum
	if( file_exists ($direktori)) {
		echo "<div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-warning'></i> Gagal Upload ".$file_name." sudah ada !!!.
            </div>";
		exit();
	} elseif ($file_type != "application/rar" && $file_type != "application/x-zip-compressed" && $file_type != "text/comma-separated-values" && $file_type != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && $file_type != "application/vnd.openxmlformats-officedocument.presentationml.presentation" && $file_type != "application/vnd.ms-excel" && $file_type != "application/zip" && $file_type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" && $file_type != "application/pdf" && $file_type != "application/msword" && $file_type != "application/vnd.ms-powerpoint") {
		echo "<div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-warning'></i> Gagal Upload ".$file_name." tidak disuport !!!.
            </div>";
		exit();
	} elseif ($size > 2097152) {
		echo "<div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-warning'></i> Gagal Upload , Ukuran".$file_name." lebih dari 2Mb !!!.
            </div>";
		exit();	
	} else {

	// Memindahkan upload file dari direktori sementara ke tempat permanen
	move_uploaded_file($source,$direktori);

	//Menampilkan keterangan file
	echo "<div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-check'></i> Success Upload ".$file_name." ".$size." bytes !!!.
            </div>";
	echo("<meta http-equiv='refresh' content='2'>");
	}
	
?>