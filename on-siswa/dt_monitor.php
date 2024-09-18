<?php
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
?>
<div class="box-body">

	<?php
	$kelasx = preg_replace('/[^0-9\  ]/', '', $kelas);
	// $querydosen = mysqli_query($konek, "SELECT * FROM ujian 
	// 	WHERE  aktif=1 and kelas='$kelasx'");
	$querydosen = mysqli_query($konek, "SELECT * FROM ujian 
		WHERE (agama = '' OR agama = '$agama' OR agama IS NULL)
  		AND (jurusan = '' OR jurusan = '$jurusan' OR jurusan IS NULL)
  		AND aktif=1 and kelas='$kelasx'");
	if ($querydosen == false) {
		die("Terjadi Kesalahan : " . mysqli_error($konek));
	}
	$i = 1;
	while ($ar = mysqli_fetch_array($querydosen)) {
		$hs = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE nama='$nama' AND kodesoal='$ar[kodesoal]'");
		$nm = mysqli_num_rows($hs);
		if ($nm > 0) {
			$hsil = 'danger';
		} else {
			$hsil = 'primary';
		}
		if ($nm > 0) {
			$nope = '';
		} else {
			$nope = 'disabled';
		}

		echo "					
			<div  id='pew' class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
				<div  id='pew' class='panel panel-$hsil'>
					<div  id='pew' class='panel-heading'>
					<div class='row'>
						<div class='col-xs-8'>
							<h6>$ar[kodesoal]
							<br>$num_rows Soal</h6>
						</div>
						<div class='col-xs-4 text-right'>
							<i class='fa fa-clock-o fa-spin'></i>$ar[waktu]'
						</div>
					</div>
					<div class='row'>
						<div class='col-xs-12'>
							<h6><b>$ar[mapel]</b></h6>
						</div>
					</div>
					</div>
					<a class='$hsil' href='confirm.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&waktu=$ar[waktu]'>
					<div  id='pow' class='panel-footer' style='border:0;border-radius:0;'>
						<span class='pull-left'><i class='fa fa-check'></i> Kerjakan</span>
						<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
						<div class='clearfix'></div>
					</div>
					</a>
				</div>
			</div>
		";
		$i++;
	}
	?>
</div>
<h4>
	<font color="#FF0000">Keterangan: *</font>
</h4>
<ul>
	<li>Tombol ujian aktif akan muncul diatas, klik untuk memulai ujian</li>
	<li>Hubungi Admin / Proktor jika tidak ada Ujian yang aktif</li>
	<li>Jika tidak ada tombol ujian maka soal tidak bisa dikerjakan</li>
	<br>
</ul>
<div class='box'>
	<div class='box-header'>
		<h6 class='box-title'>Finished Exam <i class="fa fa-calendar-check-o"></i></h6>
		<br>
		<h6 style='font-size:12px;'>Kamu sudah mengerjakan ujian dibawah ini</h6>
	</div>
	<div class='box-body no-padding'>
		<table class='table table-condensed'>
			<tr>
				<th style='width: 3%'>No</th>
				<th style='width: 20%'>Mapel</th>
				<th style='width: 20%'>Kode Soal</th>
				<th style='width: 40%'>Progress</th>
				<th style='width: 7%'>Status</th>
				<th style='width: 17%'>Benar | Salah </th>
				<th style='width: 17%'>Waktu Selesai</th>
			</tr>
			<?php
			$queryn = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE nama='$nama'");
			if ($queryn == false) {
				die("Terjadi Kesalahan : " . mysqli_error($konek));
			}
			$i = 1;
			while ($r = mysqli_fetch_array($queryn)) {
				$ok = $r["kodesoal"];

				$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ok' AND status IN ('1', '3', '4','5')");
				$rows = mysqli_num_rows($result);

				$nilaipg = $sr['nilai'];
				$jumlah = $rows;

				$benar = 0;
				$salah = 0;
				$kosong = 0;
				$xhasil = 0;

				$scorepg = 0;
				$score_bs = 0;
				$score_uraian = 0;
				$score_jd = 0;
				$score_pgk = 0;

				$scorepg_total = 0;
				$score_bs_total = 0;
				$score_uraian_total = 0;
				$score_jd_total = 0;
				$score_pgk_total = 0;

				$total_score = 0;

				$list_menjodohkan = mysqli_query($konek, "SELECT kunci FROM soal WHERE `status`='5' AND kodesoal = '$ok' ");
				$rows_jodohkan = mysqli_num_rows($list_menjodohkan);

				$array_kuncian = [];
				if ($rows_jodohkan > 0) {
					while ($chek = mysqli_fetch_array($list_menjodohkan)) {
						array_push($array_kuncian, $chek['kunci']);
					}
				}

				while ($soal = mysqli_fetch_array($result)) {
					$queryhistory = mysqli_query($konek, "SELECT * FROM jawabother WHERE kodesoal='$ok'  AND nis='$r[nis]' AND nomersoal='$soal[nomersoal]'");
					$count_jawaban = mysqli_num_rows($queryhistory);
					while ($jawaban = mysqli_fetch_array($queryhistory)) {

						$jawaban_siswa = strtolower(str_replace(' ', '-', $jawaban['jawaban']));
						$kunci = strtolower(str_replace(' ', '-', $soal['kunci']));

						if ($soal['status'] == 1) {
							$jwbsis = $jawaban['jawaban'];
							$benarp = 0;
							if ($kunci == strtolower($jawaban_siswa)) {
								$benarp++;
								$benar++;
							} else {
								$salah++;
							}
							$scorepg = $nilaipg / $jumlah * $benarp;
							$scorepg_total += $scorepg;
						}

						if ($soal['status'] == 3) {
							$jwbsis = $jawaban['jawaban'];
							$benarBS = 0;
							if ($kunci == strtolower($jwbsis)) {
								$benarBS++;
								$benar++;
							} else {
								$salah++;
							}
							$score_bs = $nilaipg / $jumlah * $benarBS;
							$score_bs_total += $score_bs;
						}

						if ($soal['status'] == 4) {
							$jwbsis = str_replace(',', '', $jawaban['jawaban']);
							$benarPGK = 0;
							if ($kunci == strtolower($jwbsis)) {
								$benarPGK++;
								$benar++;
							} else {
								$salah++;
							}
							$score_pgk = $nilaipg / $jumlah * $benarPGK;
							$score_pgk_total += $score_pgk;
						}

						if ($soal['status'] == 5) {
							$pilihjod = $jawaban['jawaban'];
							$benarJd = 0;
							if ($kunci == strtolower($pilihjod)) {
								$benarJd++;
								$benar++;
							} else {
								$salah++;
							}
							$score_jd = $nilaipg / $jumlah * $benarJd;
							$score_jd_total += $score_jd;
						}
					}

				}

				$total_score = $scorepg_total + $score_bs_total + $score_uraian_total + $score_jd_total + $score_pgk_total;

				$result_uraian = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status IN ('2') ORDER BY `soal`.`nomersoal` ASC ");
				$rows_uraian = mysqli_num_rows($result_uraian);
				$count_soal = $jumlah + $rows_uraian;
				//$terjwb = $count_soal - $count_jawaban;
				$terjwb = $count_soal;
				// var_dump($count_soal);
				$persen = 100 / $count_soal;
				$persenjawab = $persen * $terjwb;
				echo "
								<tr>
								  <td><h6 style='font-size:12px;'>$i</h6></td>
								  <td><h6 style='font-size:12px;'>$r[kodemapel]</h6></td>
								  <td><h6 style='font-size:10px;'>$r[kodesoal]</h6></td>
								  <td><p style='display:block;width:100%;background:transparent;overflow:show;z-index:9999999999;font-size:10px;margin:0;'>Terjawab $terjwb dari $r[jumlahsoal] Soal </p>
									<div class='progress progress-md' style='background:#ddd;width:100%;height:0.5em;'>
									  <div class='progress-bar progress-bar-success' style='width: $persenjawab%;font-size:10px;'></div>
									</div>
								  </td>
								  <td><h6 style='font-size:10px;'>Selesai</h6></td>
								  <td><h6 style='font-size:10px;'>$benar | $salah</h6></td>
								  <td>$r[waktuselesai]</td>
								</tr>
																";
				$i++;
			}
			?>
		</table>
	</div>
</div>
</div>
</div>
</div>
<script>
	$('.danger').click(function (e) {
		e.preventDefault();
	})
</script>