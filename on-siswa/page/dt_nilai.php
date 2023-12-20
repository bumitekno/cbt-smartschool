<thead>
	<tr>
		<th width="3%">No</th>
		<th width="20%">Mapel</th>
		<th width="5%">Jumlah Soal</th>
		<th width="5%">Jawaban Benar</th>
		<th width="5%">Jawaban Salah</th>
		<th width="5%">Nilai</th>
		<!-- <th width="5%">Nilai Uraian</th> -->
		<th width="5%">Total Nilai</th>
		<th width="10%">analisa</th>
		<th width="30%">Jawaban Siswa</th>
	</tr>
</thead>
<tbody>
	<?php
	$querydosen = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE nama='$nama'");
	if ($querydosen == false) {
		die("Terjadi Kesalahan : " . mysqli_error($konek));
	}
	$i = 1;
	while ($r = mysqli_fetch_array($querydosen)) {
		$cari = $r['kodesoal'];
		$querydosen2 = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$cari'");
		if ($querydosen2 == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}
		$i = 1;
		while ($sr = mysqli_fetch_array($querydosen2)) {
			$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status IN ('1', '3', '4','5')");
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

			while ($soal = mysqli_fetch_array($result)) {
				$queryhistory = mysqli_query($konek, "SELECT * FROM jawabother WHERE kodesoal='$cari'  AND nis='$r[nis]' AND nomersoal='$soal[nomersoal]'");
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
				$result_uraian = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status IN ('2') ORDER BY `soal`.`nomersoal` ASC ");
				$rows_uraian = mysqli_num_rows($result_uraian);
				$xhasil = $rows_uraian;
			}

			$total_score = $scorepg_total + $score_bs_total + $score_uraian_total + $score_jd_total + $score_pgk_total;

			echo "
								<tr>
									<td align=center><h6 style='font-size:12px;'>$i</h6></td>
									<td><h6 style='font-size:12px;'>$r[kodemapel] | $r[kodesoal]</h6></td>
									<td><h6 style='font-size:12px;'>$jumlah</h6></td>
									<td><h6 style='font-size:12px;'>$benar</h6></td>
									<td><h6 style='font-size:12px;'>$salah</h6></td>
									<td><h6 style='font-size:12px;'>$total_score</h6></td>
									
									<td><button id='co' class='btn btn-success' style='font-size:11px;width:50px;'><b>$total_score</b></button></td>
									<td>
									<a class='open_modal' style='font-decoration:none;color:#222;' id='$r[id]'><button  type='button' class='btn btn-flat btn-success btn-sm' style='font-size:10px;width:50px;'><i class='fa fa-pencil-square-o'></i></button></a>
									</td>
									<td><h6 style='font-size:10px;'>$r[jawabansiswa]</h6></td>
									";
			$i++;
		}
	}
	?>
</tbody>