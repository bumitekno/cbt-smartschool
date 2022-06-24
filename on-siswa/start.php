<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
$mulaiujian     = $_POST[mulaiujian];

    					date_default_timezone_set('Asia/Jakarta');
						$saiki=date('H:i:s');
						
						$lama=time();
						$buyar=$mulaiujian+$lama;
						$wes=date("H:i:s",$buyar);
mysqli_query($konek, "UPDATE jawaban SET mulaiujian='$saiki', waktuselesai='$wes' WHERE nis='$nis'");
		header("Location:ujianstart.php");
		exit();
?>