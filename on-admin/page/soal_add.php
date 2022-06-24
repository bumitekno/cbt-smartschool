<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');
include ('../conn/fungsi.php');
if($admin_su == 1)
				        {
				             $username=$_SESSION['admin'];
					   
				        }
				         else if ($admin_su == 0)
				        {
				             $username=$_SESSION['admin'];
					   
				        }
				        else
				        {
				             header('location:../soal.php?gagal=1');
				             exit;
				        }
$jenissoal			= $_POST['jenissoal'];
$kodemapel			= $_POST['kodemapel'];
$kelas			= $_POST['kelas'];
$kodesoal			= $_POST['kodesoal'];
$waktu			    = $_POST['waktu'];
$acak			    = $_POST['acak'];
$opsi			    = $_POST['opsi'];
$waktune=$waktu*60;
$suwe=''.gmdate('H',$waktune).':'.gmdate('i',$waktune).':'.gmdate('s',$waktune).'';
if ($add = mysqli_query($konek, "INSERT INTO soal (jenissoal, kodemapel, kodesoal) VALUES 
	('$jenissoal', '$kodemapel', '$kodesoal')")){
	}
if ($add = mysqli_query($konek, "INSERT INTO ujian (jenis, mapel, kodesoal, kelas, waktu, lamaujian, acak, opsi) VALUES 
	('$jenissoal', '$kodemapel', '$kodesoal', '$kelas', '$waktu', '$suwe', '$acak', '$opsi')")){
		header("Location:../soal.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>