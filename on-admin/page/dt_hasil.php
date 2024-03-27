<style>
	table thead tr {
		background-color: #364247;
		color: white;
	}

	table tfoot tr {
		background-color: #192227;
		color: black;
	}

	tfoot {
		display: table-header-group;
	}

	#foo {
		pointer-events: none;
		cursor: default;
		opacity: 0;
	}
</style>
<div id="printableArea">
	<form action="#" method="post">
		<label>Pilih kode soal</label>
		<br>
		<select class="form-control" id="mySelect" name="cari" onchange="this.form.submit()" style='width:50%;'>
			<option value="<?php echo $ar['kodesoal']; ?>"><i class="fa fa-angle-down"></i>Kode Soal
				<?php echo $cari; ?>
			</option>
			<?php
			$kelas = mysqli_query($konek, "SELECT DISTINCT kodesoal FROM nilaihasil");
			if ($kelas == false) {
				die("Terjadi Kesalahan : " . mysqli_error($konek));
			}
			$i = 1;
			while ($ar = mysqli_fetch_array($kelas)) {
				?>
				<option value="<?php echo $ar['kodesoal']; ?>">
					<?php echo $ar['kodesoal']; ?>
				</option>

			<?php } ?>
		</select>
		<input type="hidden" name="show" value="1" />
</div>
</div>
</div>
</div>
</form>

</div>
</div>
<br>
<?php
$cari = $_POST['cari'];
$show = $_POST['show'];
if (!$show == '') {
	$cul = "1";
} else {
	$cul = "";
}
?>
<div class="col-xs-12">
	<button id="reset" class="btn btn-default btn-flat" type="button" data-toggle="collapse"
		data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		<i class="fa fa-bar-chart" aria-hidden="true"></i> Statistik nilai
		<?php echo $cari; ?>
	</button>
	<div class="collapse" id="collapseExample">
		<div class="card card-body">
			<div class="box-header">
				<div style="width: 700px;margin: 0px auto;">
					<canvas id="myChart"></canvas>
				</div>
				<div style="width: 700px;margin: 0px auto;">
					<canvas id="myChart2"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12" style="overflow-x:auto;">
	<div id="ndelik<?php echo $cul ?>">
		<table id="data" class="table table-bordered table-striped">
			<thead style="font-size:10px;">
				<tr>
					<th id="garis" width="3%">No</th>
					<th id="garis" width="20%">Nama</th>
					<th id="garis" width="3%">Kelas</th>
					<th id="garis" width="3%">Mapel</th>
					<th id="garis" width="3%">Jmlh Soal</th>
					<th id="garis" width="3%">Benar</th>
					<th id="garis" width="3%">Salah</th>
					<th id="garis" width="3%">kosong</th>
					<th id="garis" width="5%">Nilai</th>
					<!-- <th id="garis" width="5%">Nilai urai</th> -->
					<th id="garis" width="5%">Total Nilai</th>
					<th id="garis" width="5%">Jawaban siswa</th>
					<th id="garis" width="5%">Kunci Jawaban</th>
					<th id="garis" width="12%">Waktu</th>
					<th id="garis" width="30%">Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th id="foo"></th>
					<th id="foo"></th>
					<th>kelas</th>
					<th id="foo"></th>
					<th id="foo"></th>
					<th id="foo"></th>
					<th id="foo"></th>
					<th id="foo"></th>
					<!-- <th id="foo"></th> -->
					<th id="foo"></th>
					<th id="foo"></th>
					<th id="foo"></th>
					<th id="foo"></th>
					<th id="foo"></th>
					<th id="foo"></th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				$querydosen = mysqli_query($konek, "SELECT * FROM nilaihasil where kodesoal='$cari' ORDER by nilai DESC");
				if ($querydosen == false) {
					die("Terjadi Kesalahan : " . mysqli_error($konek));
				}
				$i = 1;

				while ($r = mysqli_fetch_array($querydosen)) {
					$querydosen2 = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$cari'");
					if ($querydosen2 == false) {
						die("Terjadi Kesalahan : " . mysqli_error($konek));
					}
					while ($sr = mysqli_fetch_array($querydosen2)) {
						$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status IN ('1','3', '4','5')");
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

						$list_menjodohkan = mysqli_query($konek, "SELECT kunci FROM soal WHERE `status`='5' AND kodesoal = '$cari' ");
						$rows_jodohkan = mysqli_num_rows($list_menjodohkan);

						$array_kuncian = [];
						if ($rows_jodohkan > 0) {
							while ($chek = mysqli_fetch_array($list_menjodohkan)) {
								array_push($array_kuncian, $chek['kunci']);
							}
						}

						$list_jawaban = '';
						$list_kunci = '';

						while ($soal = mysqli_fetch_array($result)) {
							$queryhistory = mysqli_query($konek, "SELECT * FROM jawabother WHERE kodesoal='$cari'  AND nis='$r[nis]' AND nomersoal='$soal[nomersoal]'");

							while ($jawaban = mysqli_fetch_array($queryhistory)) {

								$jawaban_siswa = strtolower(str_replace(' ', '-', $jawaban['jawaban']));
								$kunci = strtolower(str_replace(' ', '-', $soal['kunci']));

								$list_jawaban .= $jawaban['jawaban'];
								$list_kunci .= $soal['kunci'];

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
									$pilihjod = $jawaban_siswa;
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


						//calculation uraian
						$result_uraian = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status = '2' ORDER BY `soal`.`nomersoal` ASC ");
						$rows_uraian = mysqli_num_rows($result_uraian);

						if ($rows_uraian > 0) {
							$jumlah = $rows_uraian;

							if ($r['statuskoreksi'] > 1) {
								$koreksi = "<a class='open_modal2' style='font-decoration:none;color:#222;' nama='$r[nama]' nis='$r[nis]' kelas='$r[kelas]' kodesoal='$r[kodesoal]'><button id='ti' type='button' class='btn btn-danger btn-xs'><i class='fa fa-refresh'></i> edit koreksi</button></a>";
							} else {
								$koreksi = "<a class='open_modal2' style='font-decoration:none;color:#222;' nama='$r[nama]' nis='$r[nis]' kelas='$r[kelas]'  kodesoal='$r[kodesoal]'><button id='ti' type='button' class='btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i> koreksi</button></a>";
							}

							while ($uraian_singkat = mysqli_fetch_array($result_uraian)) {
								$query2 = mysqli_query($konek, "SELECT * FROM jawaburaian WHERE nis='$r[nis]' AND kodesoal='$uraian_singkat[kodesoal]' AND nomersoal= $uraian_singkat[nomersoal]");
								$ur = mysqli_fetch_array($query2);
								$score_max = $rows_uraian * 5; // point skore 5 * jumlah soal
				
								$score_uraian = $ur['nilai'];

								$score_uraian_total += $score_uraian;
								$total_score = $score_uraian_total / $score_max * 100;
							}
						}

						if (!empty($r['nis'])) {
							echo "
								<tr style='font-size:13px;'>
								<td id='garis' align=center>$i</td>
								<td id='garis'>$r[nama]</td>
								<td id='garis'>$r[kelas]</td>
								<td id='garis'>$r[kodemapel] | $r[kodesoal]</td>
								<td id='garis' align=center>$jumlah</td>
								<td id='garis' align=center>$benar</td>
								<td id='garis' align=center>$salah</td>
								<td id='garis' align=center>$xhasil</td>
								<td id='garis' align=center style='background-color:grey;color:white'><b>$total_score</b></td>
								<td id='garis' align=center style='background-color:#2764aa;color:white'><b>$total_score</b></td>
								<td id='garis'><h6>" . str_replace(',', '', $list_jawaban) . "</h6></td>
								<td id='garis'><h6>" . str_replace(',', '', $list_kunci) . "</h6></td>
								<td id='garis'><h6>$r[waktuselesai]</h6></td>
								<td id='garis' align=center>
								<a class='noprint' href='analisa-soal.php?nis=$r[nis]&kodesoal=$r[kodesoal]'><button id='ti' type='button' class='btn btn-success btn-xs'><i class='fa fa-eye'></i> Lihat Hasil</button></a>
								$koreksi
								<a style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/hasil_delete.php?id=$r[id]&kodesoal=$r[kodesoal]&nama=$r[nama]\")'><button id='ti' type='button' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button></a> 
								</td>
								</tr>";
						}
						$i++;
					}
				}
				?>
			</tbody>
		</table>


	</div>
</div>