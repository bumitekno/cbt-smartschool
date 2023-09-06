<?php 
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');

$querydosen = mysqli_query ($konek, "SELECT * FROM jawaban WHERE nis='$username'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
if ($add = mysqli_query($konek, "INSERT INTO nilaihasil (nis, nama, kelas, kodemapel, kodesoal, aktif, jumlahsoal, jawabansiswa, benar, salah, nilai, kuncisoal) VALUES 
	('$ar[nis]$ar[kodesoal]', '$ar[nama]', '$ar[kelas]', '$ar[kodemapel]', '$ar[kodesoal]', '1', '$ar[jumlahsoal]', '$ar[jawabansiswa]', '$ar[benar]', '$ar[salah]', '$ar[nilai]', '$ar[kuncisoal]')"))
	{
mysqli_query($konek, "update siswa set statuslogin='0'where nis='$username'");
mysqli_query ($konek, "DELETE FROM jawaban where nis='$username'");
	}
}
$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){
?>
<link href="mesin/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<head>
    <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
</head>
<title><?php echo $xx['n_sekolah'];?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../aset/foto/<?php echo $xx['logo'];?>" rel="icon" type="image/png">
<style>
    /* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}   
    #ok {
    border-radius:0;
    }
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #242a30;
    color: #565656;
    text-align: center;
    font-family: sans-serif;
    }
</style>
<body onload="myFunction()" style="margin:0;">
    <html class="no-js" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
    .no-close .ui-dialog-titlebar-close {display: none;}
	</style>
	<style>
		.left {float: left; width: 65%;}
		.right {float: right; width: 30%; background-color: #333333; height:101px; color:#FFFFFF;	
			font-size: 13px; font-style:normal; font-weight:normal;}
		.user {color:#FFFFFF; font-size: 15px; font-style:normal; font-weight:bold;	top:-20px;}
		.log {color:#3799c2; font-size: 11px; font-style:normal; font-weight:bold; top:-20px;}
		.group:after {content:""; display: table; clear: both;}
		/*	img {max-width: 100%; height: auto;}	*/
		.visible{display: block !important;}
		.hidden{display: none !important;}
		.foto{height:80px;}	
		@media screen and (max-width: 780px) { /* jika screen maks. 780 right turun */
		/*    .left, */
		.left,
		.right {float: none; width: auto; margin-top:0px; height:91px; color:#FFFFFF; display:block;}
		.foto{height:65px;}}
		@media screen and (max-width: 400px) { /* jika screen maks. 780 right turun */
		/*    .left, */
		.left{width: auto; height: 91px;}
		.right {float: none; width: auto; margin-top:0px; height:60px; color:#FFFFFF;}
		.foto{height:40px;}	}
	#konfir {
    border-radius:0;
    z-index: 0;
    background-color: #48a845;
    border:0;
    position:absolute;
    right: 10;
    }

    #garis {
    border:0;
    }
    .col-md-6 {
    margin-top:100px;
    }
    #progres { 
    border-radius: 0px;
    }
    #doa { 
    border-radius: 0px;
    }
	</style>
	<link href="mesin/klien.css" rel="stylesheet">
	<link rel="stylesheet" href="mesin/bootstrap.min.css">
    <script src="mesin/jQuery-2.1.4.min.js"></script>
</head><body class="font-medium" style="background-color:#cacaca">
<?php
	$querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='2'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($oo = mysqli_fetch_array ($querydosen)){
						    $warna =$oo['warna'];
						    $warna = str_replace("blue", "#2e6499", $warna);
                            $warna = str_replace("red", "#dd4b39", $warna);
                            $warna = str_replace("yellow", "#f39c12", $warna);
                            $warna = str_replace("green", "#00a65a", $warna);
                            $warna = str_replace("purple", "#605ca8", $warna);
?>
<header style="background-color:<?php echo $warna;?> ; ">
<div class="group">
    <div class="left" style="background-color:<?php echo $warna;?>"><img src="../aset/foto/<?php echo $xx['logo_ujian'];?>" style=" margin-left:0px;"></div>
    <?php }?>
    	<div class="right">
			<table width="100%" border="0" cellspacing="5px;" style="margin-top:10px">   
				<tbody><tr><td rowspan="3" width="100px" align="center"><img src="mesin/avatar.gif" style=" margin-left:0px; margin-top:5px" class="foto"></td>
				</tr><tr><td><span class="user"><?php echo $nama; ?><br><?php echo $ar['kelas']; ?></span></td></tr>
				<tr><td><span class="log"><a href="logout.php">Logout</a><span></span></span></td></tr>
			</tbody></table>
        </div>
</div>
</header>
<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
    <br><br><br>
  <b><h2>Success!</h2></b>
  <h6><p>Nilai sudah masuk ke dalam database</p></h6>
  <p>Silahkan kembali ke BERANDA...atau LOGOUT untuk keluar</p>
  <br>
  <a id='ok' href='index.php'><button id='ok' type='button' class='btn btn-primary btn-xs'><i class='fa fa-home'></i> BERANDA</button></a>
  <a id='ok' href='logout.php'><button id='ok' type='button' class='btn btn-primary btn-xs'><i class='fa fa-sign-out'></i> LOGOUT</button></a>
</div>
<?php
include "footer.php";
?>
<script>
    var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
<?php }?>