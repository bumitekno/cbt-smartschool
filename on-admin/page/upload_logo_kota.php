<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');

$id			= $_POST['id'];

	// Membaca nama file
	$file_name = $_FILES['logo']['name'];

	// Membaca ukuran file
	$size = $_FILES['logo']['size'];

	// Membaca jenis file
	$file_type = $_FILES['logo']['type'];
	
	// Source tempat upload file sementara
	$source = $_FILES['logo']['tmp_name'];
	
	// Tempat upload file disimpan
	$direktori = "../../aset/foto/$file_name";
	
	// Mengecek apakah file yang di upload sudah ada atau belum
	if( file_exists ($direktori)) {
		echo "<br><br><br><center><img class='img-responsive' src='../../aset/foto/hack.png'><center><h2>Waduuuuhh !!! </h2> file <strong>$file_name</strong> sudah ada, upload dengan nama lain <br/> <a href=\"../theme.php\">Upload ulang</a></center>";
		exit();
	} elseif ($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "imageJPG" && $file_type != "image/JPEG" && $file_type != "image/gif") {
		echo "<meta charset='utf-8'>
              <title>ZONK</title>
              <br><br><br>
              <center><img class='img-responsive' src='../../aset/foto/hack.png'></center><br><center><h2>Zzonnnkk !!! </h2> file <strong>$file_name</strong> tidak di support ,<br> file opo ikiii <strong>$file_type</strong> ??? Hayo ga boleh <b>NAKAL</b></center> ";
		exit();
	} elseif ($size > 1097152) {
		echo "<meta charset='utf-8'>
              <title>ZONK</title>
              <br><br><br>
              <center><img class='img-responsive' src='../../aset/foto/hack.png'></center><br><center><h2>Zzonnnkk !!! </h2> file <strong>$file_name</strong> abooottt pol ,<br> Ukuran file maksimal 2 Mb ??? <a href=\"../theme.php\">Upload ulang</a></center> ";
		exit();	
	} else {

	// Memindahkan upload file dari direktori sementara ke tempat permanen
	move_uploaded_file($source,$direktori);
	}
	
if (empty($source)) {
	if ($edit = mysqli_query($konek, "UPDATE profil SET logo_kota='$file_name' WHERE id='$id'")){
		header("Location:../theme.php");
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

}else {	
	$hapus=mysqli_query($konek, "SELECT * FROM profil WHERE id='$id'");
    $r=mysqli_fetch_array($hapus);
	$d = '../../aset/foto/'.$r['logo_kota'];
	unlink ("$d");
    move_uploaded_file($direktori,"../../aset/foto/$file_name");
	if ($edit = mysqli_query($konek, "UPDATE profil SET logo_kota='$file_name' WHERE id='$id'")){
		header("Location:../theme.php");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}
?>