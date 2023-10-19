<?php
session_start();
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');

$mapel = $_GET['matpel'];
$kode = $_GET['kode'];
$waktu = $_GET['waktu'];
$waktune = $waktu * 60;
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
$query2 = mysqli_query($konek, "SELECT * FROM ujian WHERE kodesoal='$kode'");
$ur = mysqli_fetch_array($query2);

if ($ur['aktif'] == 0) {
	header('location:ujian.php?gagal=1');
	exit;
}
$querydosen = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$kode' and aktif='1'");
if ($querydosen == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}

while ($ar = mysqli_fetch_array($querydosen)) {
	date_default_timezone_set('Asia/Jakarta');
	$saiki = date('H:i:s');
	$lama = time();
	$buyar = $waktune + $lama;
	$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
	$rows = mysqli_num_rows($result);
	if (!$ar['aktif'] == '1') {
		$aktif = "<span style=color:red>Tidak Aktif</span>";
	} else {
		$aktif = "Aktif";
	}
	if ($aktif == '1') {
		$tombol = "Tidak Aktif";
	} else {
		$tombol = '<br><button id="konfir" type="submit" class="btn btn-success"><b>MASUK</b></button>
                        </div>';
	}
}
$qq = mysqli_query($konek, "SELECT * FROM profil where id='1'");
if ($qq == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($xx = mysqli_fetch_array($qq)) { ?>
	<html class="no-js" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>
			<?php echo $xx['n_sekolah']; ?>
		</title>
		<link href="../aset/foto/<?php echo $xx['logo']; ?>" rel="icon" type="image/png">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			.no-close .ui-dialog-titlebar-close {
				display: none;
			}
		</style>
		<style>
			.left {
				float: left;
				width: 65%;
			}

			.right {
				float: right;
				width: 30%;
				background-color: #333333;
				height: 101px;
				color: #FFFFFF;
				font-size: 13px;
				font-style: normal;
				font-weight: normal;
			}

			.user {
				color: #FFFFFF;
				font-size: 15px;
				font-style: normal;
				font-weight: bold;
				top: -20px;
			}

			.log {
				color: #3799c2;
				font-size: 11px;
				font-style: normal;
				font-weight: bold;
				top: -20px;
			}

			.group:after {
				content: "";
				display: table;
				clear: both;
			}

			/*	img {max-width: 100%; height: auto;}	*/
			.visible {
				display: block !important;
			}

			.hidden {
				display: none !important;
			}

			.foto {
				height: 80px;
			}

			@media screen and (max-width: 780px) {

				/* jika screen maks. 780 right turun */
				/*    .left, */
				.left,
				.right {
					float: none;
					width: auto;
					margin-top: 0px;
					height: 91px;
					color: #FFFFFF;
					display: block;
				}

				.foto {
					height: 65px;
				}
			}

			@media screen and (max-width: 400px) {

				/* jika screen maks. 780 right turun */
				/*    .left, */
				.left {
					width: auto;
					height: 91px;
				}

				.right {
					float: none;
					width: auto;
					margin-top: 0px;
					height: 60px;
					color: #FFFFFF;
				}

				.foto {
					height: 40px;
				}
			}

			#konfir {
				border-radius: 0;
				z-index: 0;
				background-color: #48a845;
				border: 0;
				position: absolute;
				right: 10;
			}

			#garis {
				border: 0;
			}

			.col-md-6 {
				margin-top: 100px;
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
		<link href="mesin/klien.css" rel="stylesheet">
		<link rel="stylesheet" href="mesin/bootstrap.min.css">
	</head>

	<body class="font-medium" style="background-color:#cacaca">
		<?php
		$querydosen = mysqli_query($konek, "SELECT * FROM theme where id='2'");
		if ($querydosen == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}
		while ($oo = mysqli_fetch_array($querydosen)) {
			$warna = $oo['warna'];
			$warna = str_replace("blue", "#2e6499", $warna);
			$warna = str_replace("red", "#dd4b39", $warna);
			$warna = str_replace("yellow", "#f39c12", $warna);
			$warna = str_replace("green", "#00a65a", $warna);
			$warna = str_replace("purple", "#605ca8", $warna);
			?>
			<header style="background-color:<?php echo $warna; ?> ; ">
				<div class="group">
					<div class="left" style="background-color:<?php echo $warna; ?>"><img
							src="../aset/foto/<?php echo $xx['logo_ujian']; ?>" style=" margin-left:0px;"></div>
				<?php } ?>
				<div class="right">
					<table width="100%" border="0" cellspacing="5px;" style="margin-top:10px">
						<tr>
							<td rowspan="3" width="100px" align="center"><img src="mesin/avatar.gif"
									style=" margin-left:0px; margin-top:5px" class="foto"></td>
						</tr>
						<tr>
							<td><span class="user">
									<?php echo $nama; ?><br>
									<?php echo $r['kelas']; ?>
								</span></td>
						</tr>
						<tr>
							<td><span class="log"><a href="logout.php">Logout</a><span></span></span></td>
						</tr>

					</table>
				</div>
			</div>
		</header>

		<div class="col-md-6 col-md-offset-3 login-wrapper" style="float:inherit">
			<div class="panel panel-default">
				<form action="mulai.php" method="post">
					<div id="garis" class="list-group-item top-heading">
						<h3 class="list-group-item-heading page-label">Konfirmasi Data Ujian</h3>
					</div>
					<div id="garis" class="list-group-item">
						<label class="list-group-item-heading">Nomer Peserta</label>
						<p class="list-group-item-text">
							<?php echo "$username"; ?>
						</p>
					</div>
					<div id="garis" class="list-group-item">
						<label class="list-group-item-heading">Nama</label>
						<p class="list-group-item-text">
							<?php echo $nama; ?> |
							<?php echo "$r[kelas]"; ?>
						</p>
					</div>
				<?php } ?>
				<div id="garis" class="list-group-item">
					<label class="list-group-item-heading">Mapel </label>
					<p class="list-group-item-text">
						<?php echo "$mapel"; ?> |
						<?php echo "$kode"; ?>
					</p>
				</div>
				<div id="garis" class="list-group-item">
					<label class="list-group-item-heading">Jumlah Soal </label>
					<p class="list-group-item-text">
						<?php echo "$rows"; ?>
					</p>
				</div>
				<div id="garis" class="list-group-item">
					<label class="list-group-item-heading">Waktu </label>
					<p class="list-group-item-text">
						<?php echo $ur['waktu']; ?> MENIT
					</p>
				</div>
				<input id="nis" name="nis" type="hidden" value="<?php echo "$username"; ?>">
				<input id="nama" name="nama" type="hidden" value="<?php echo "$nama"; ?>">
				<input id="kelas" name="kelas" type="hidden" value="<?php echo "$kelas"; ?>">
				<input id="mapel" name="kodemapel" type="hidden" value="<?php echo "$mapel"; ?>">
				<input id="kode" name="kodesoal" type="hidden" value="<?php echo "$kode"; ?>">
				<input id="kode" name="jumlahsoal" type="hidden" value="<?php echo "$rows"; ?>">
				<input id="aktif" name="aktif" type="hidden" value="<?php echo $aktif; ?>">
				<input id="waktu" name="waktu" type="hidden" value="<?php echo $waktu; ?>">
				<input id="waktuselesai" name="waktuselesai" type="hidden" value="<?php echo date("H:i:s", $buyar); ?>">
				<input id="mulaiujian" name="mulaiujian" type="hidden" value="<?php echo $saiki; ?>">
				<input id="lamaujian" name="lamaujian" type="hidden"
					value="<?php echo "" . gmdate("H", $waktune) . ":" . gmdate("i", $waktune) . ":" . gmdate("s", $waktune) . ""; ?>">
				<input id="sisawaktu" name="sisawaktu" type="hidden" value="<?php echo "$waktune"; ?>">
				<?php $queryn = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE nama='$nama' and kodesoal='$kode'");
				if ($queryn == false) {
					die("Terjadi Kesalahan : " . mysqli_error($konek));
				}
				while ($r = mysqli_fetch_array($queryn)) {
					$ok = $r["aktif"];
				}

				?>
				<input id="ok" name="ok" type="hidden" value="<?php echo $ok; ?>">
				<div id="garis" class="list-group-item">
					<div class="row">
						<?php echo "$tombol"; ?>
					</div>
				</div>

			</form>
			<?php if (!empty($_GET['aktif'])) {
				echo "&emsp;<a id='ok' href='ujian.php'><button id='ok' type='button' class='btn btn-primary btn-xs' data-toggle='modal'><i class='fa fa-arrow-left'></i> BACK</button></a> <h5 style='color:red;'>&emsp;Ujian siswa <b>AKTIF</b>, Silahkan <b>RESET LOGIN !!</b></h5>";
			}
			?>
			<?php if (!empty($_GET['sudah'])) {
				echo "&emsp;<a id='ok' href='ujian.php'><button id='ok' type='button' class='btn btn-primary btn-xs' data-toggle='modal'><i class='fa fa-arrow-left'></i> BACK</button></a> <h5 style='color:red;'>&emsp;Siswa Sudah selesai mengerjakan SOAL ini !!</b></h5>";
			}
			?>
		</div>

		<div id="buntut">
			<?php
			include "footer.php";
			?>
</body>

</html>