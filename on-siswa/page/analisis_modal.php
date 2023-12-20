<?php
include('../conn/cek.php');
include('../../koneksi/koneksi.php');
$id = $_GET["id"];
$query = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE id='$id'");
if ($query == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($r = mysqli_fetch_array($query)) {
	$cari = $r['kodesoal'];
	$querydosen = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$cari'");
	if ($querydosen == false) {
		die("Terjadi Kesalahan : " . mysqli_error($konek));
	}
	$i = 1;
	while ($sr = mysqli_fetch_array($querydosen)) {
		$qq = mysqli_query($konek, "SELECT * FROM profil where id='1'");
		if ($qq == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}
		while ($xx = mysqli_fetch_array($qq)) {
			$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status IN ('1', '3','4','5')");
			$rows = mysqli_num_rows($result);
			$jumlah = $rows;
			$nilaipg = $sr['nilai'];
			$nil = 0;
			$statussoal = $sr['opsi'];
			?>

			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Hasil Ujian Siswa <button class="btn btn-default btn-flat" float:right
								onclick="printDiv('printableArea2')"><i class="fa fa-print"></i></button></h4>
					</div>
					<div class="modal-body" id="printableArea2">
						<center><img src="../aset/foto/<?php echo $xx['logo']; ?>" width=100 alt="...">
							<br>
							<h3><b><u>
										<?php echo $xx['n_sekolah']; ?>
									</u></b></h3><br>
						</center>
						<center>
							<h5 id="tutu">
								<?php echo $xx['sub_n_sekolah']; ?>
							</h5>
						</center>
						<br><br>
						<div class="col-xs-8">
							<table class="cetakan full">
								<br>
								<tr>
									<td width="30px" rowspan="4" valign="top"></td>
									<td width="200px">NAMA</td>
									<td width="10px">:</td>
									<td><span class="full">
											<?php echo $r['nama']; ?>
										</span></td>
								</tr>
								<tr>
									<td>KELAS</td>
									<td>:</td>
									<td><span class="full">
											<?php echo $r['kelas']; ?>
										</span></td>
								</tr>
								<tr>
									<td>MATA PELAJARAN</td>
									<td>:</td>
									<td>
										<span style="width:250px">
											<?php echo $r['kodemapel']; ?>
										</span>
									</td>
								</tr>
								<tr>
									<td>KODE SOAL</td>
									<td>:</td>
									<td>
										<span style="width:250px">
											<?php echo $r['kodesoal']; ?>
										</span>
									</td>
								</tr>
							</table>
						</div>
						<div class="col-xs-4">

						</div>
						<div class="col-xs-12">
							<hr class="style2">
							<tbody>
								<?php
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

								$list_menjodohkan = mysqli_query($konek, "SELECT kunci FROM soal WHERE `status`='5' AND kodesoal = '$r[kodesoal]' ");
								$rows_jodohkan = mysqli_num_rows($list_menjodohkan);

								$array_kuncian = [];
								if ($rows_jodohkan > 0) {
									while ($chek = mysqli_fetch_array($list_menjodohkan)) {
										array_push($array_kuncian, $chek['kunci']);
									}
								}

								while ($soal = mysqli_fetch_array($result)) {

									$queryhistory = mysqli_query($konek, "SELECT * FROM jawabother WHERE kodesoal='$soal[kodesoal]'  AND nis='$r[nis]' AND nomersoal='$soal[nomersoal]'");


									if (!$soal['soal'] == '') {
										$soal_name = "<b>$soal[soal]</b><br><br>";
									} else {
										$soal_name = "";
									}

									if (!$soal['audio'] == '') {
										$audio = "<audio src='images/$soal[audio]' controls controlsList='nodownload'></audio>";
									} else {
										$audio = "";
									}

									if (!$soal['gambarsoal'] == '') {
										$gambarsoal = "<img class='max' src='../gbr/$soal[gambarsoal]' align=center style='max-width:300pk;height:auto' ><br>";
									} else {
										$gambarsoal = "";
									}

									if (!$soal['gambar_a'] == '') {
										$gambar_a = "<img src='../gbr/$soal[gambar_a]' align=center style='max-width:300pk;height:auto' >";
									} else {
										$gambar_a = "";
									}
									if (!$soal['pilihan1'] == '') {
										$pilihan_a = "$soal[pilihan1]";
									} else {
										$pilihan_a = "";
									}
									if (!$soal['gambar_b'] == '') {
										$gambar_b = "<img src='../gbr/$soal[gambar_b]' align=center style='max-width:300pk;height:auto' >";
									} else {
										$gambar_b = "";
									}
									if (!$soal['pilihan2'] == '') {
										$pilihan_b = "$soal[pilihan2]";
									} else {
										$pilihan_b = "";
									}
									if (!$soal['gambar_c'] == '') {
										$gambar_c = "<img src='../gbr/$soal[gambar_c]' align=center style='max-width:300pk;height:auto' >";
									} else {
										$gambar_c = "";
									}
									if (!$soal['pilihan3'] == '') {
										$pilihan_c = "$soal[pilihan3]";
									} else {
										$pilihan_c = "";
									}
									if (!$soal['gambar_d'] == '') {
										$gambar_d = "<img src='../gbr/$soal[gambar_d]' align=center style='max-width:300pk;height:auto' >";
									} else {
										$gambar_d = "";
									}
									if (!$soal['pilihan4'] == '') {
										$pilihan_d = "$soal[pilihan4]";
									} else {
										$pilihan_d = "";
									}

									if (!$ar['gambar_e'] == '') {
										$gambar_e = "<img src='../gbr/$soal[gambar_e]' align=center style='max-width:300pk;height:auto' >";
									} else {
										$gambar_e = "";
									}
									if (!$soal['pilihan5'] == '') {
										$pilihan_e = "$soal[pilihan5]";
									} else {
										$pilihan_e = "";
									}

									while ($jawaban = mysqli_fetch_array($queryhistory)) {

										$jawaban_siswa = strtolower(str_replace(' ', '-', $jawaban['jawaban']));
										$kunci = strtolower(str_replace(' ', '-', $soal['kunci']));

										if ($soal['status'] == 1) {

											$type = "Pilihan Ganda";
											$jwbsis = $jawaban['jawaban'];

											if ($kunci == strtolower($jawaban_siswa)) {
												$benarp++;
												$tanda = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
											} else {
												$salah++;
												$tanda = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
											}

											if ($kunci == "a") {
												$pilihan = "<br>
							 <div class='show'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
									  &emsp;<p class='$statussoal'>e. &emsp;$pilihan_e $gambar_e</p></div>";
											} else if ($kunci == "b") {
												$pilihan = "<br>
							 <div class='show'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
									  &emsp;<p class='$statussoal'>e. &emsp;$pilihan_e $gambar_e</p></div>";
											} else if ($kunci == "c") {
												$pilihan = "<br>
							 <div class='show'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
									  &emsp;<p class='$statussoal'>e. &emsp;$pilihan_e $gambar_e</p></div>";
											} else if ($kunci == "d") {
												$pilihan = "<br>
									 <div class='show'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p class='$statussoal'>e. &emsp;$pilihan_e $gambar_e</p></div>";
											} else if ($kunci == "e") {

												$pilihan = "<br>
									 <div class='show'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p class='$statussoal'>e. &emsp;$pilihan_e $gambar_e</p></div>";
											}

											$scorepg = $nilaipg / $jumlah * $benarp;
											$scorepg_total = $scorepg;

											echo "
									<tr>
									$soal[nomersoal]. <b>$soal[soal] ($type) </b>
								 <br>
									&emsp;$gambarsoal<br>$audio
									$pilihan
									<br><br>
										<div><i><u>Jawaban siswa</u></i> : <i class='show'>$jwbsis $tanda </i>  Skor : $scorepg </div>
										<br>
										<hr class='style1'>
									</tr>";

										}


										if ($soal['status'] == 3) {

											$type = "Soal Benar atau Salah ";

											$benarBS = 0;
											$jwbsis = $jawaban['jawaban'];

											if ($kunci == strtolower($jwbsis)) {
												$jwbsis = "Benar";
												$benarBS++;
												$tanda = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
											} else {
												$salah++;
												$jwbsis = "Salah";
												$tanda = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
											}

											$score_bs = $nilaipg / $jumlah * $benarBS;
											$score_bs_total += $score_bs;

											echo "
								<tr>
								$soal[nomersoal]. <b>$soal[soal] ($type) </b>
								<br>
								&emsp;$gambarsoal<br>$audio
								
								<br><br>
								<div><i><u>Jawaban siswa</u></i> : <i class='show'>$jwbsis </i>  $tanda Skor: $score_bs </div>
								<br>
								<hr class='style1'>
							    </tr>";

										}

										if ($soal['status'] == 4) {

											$score = 0;
											$benarPGK = 0;
											$type = "Pilihan Ganda Komplek ";

											$split_str = str_split($kunci);
											$tanda_a = '';
											$tanda_b = '';
											$tanda_c = '';
											$tanda_d = '';
											$tanda_e = '';

											$jwbsis = str_replace(',', '', $jawaban['jawaban']);

											if ($kunci == strtolower($jwbsis)) {
												$benarPGK++;
												$tanda = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
											} else {
												$salah++;
												$tanda = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
											}

											foreach ($split_str as $l) {
												if ($l == 'a') {
													$tanda_a = "&emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
												}
												if ($l == 'b') {
													$tanda_b = "&emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
												}
												if ($l == 'c') {
													$tanda_c = "&emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
												}
												if ($l == 'd') {
													$tanda_d = "&emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
												}
												if ($l == 'e') {
													$tanda_e = "&emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
												}
											}

											$pilihan = "<br>
							 	<div class='show'>
											  &emsp;<p>a. &emsp;$pilihan_a $gambar_a $tanda_a </p>
											  &emsp;<p>b. &emsp;$pilihan_b $gambar_b $tanda_b</p>  
											  &emsp;<p>c. &emsp;$pilihan_c $gambar_c $tanda_c</p> 
											  &emsp;<p>d. &emsp;$pilihan_d $gambar_d $tanda_d</p> 
											  &emsp;<p class='$statussoal'>e. &emsp;$pilihan_e $gambar_e $tanda_e</p> </div> ";

											$score_pgk = $nilaipg / $jumlah * $benarPGK;
											$score_pgk_total += $score_pgk;

											echo "<tr>
								$soal[nomersoal]. <b>$soal[soal] ($type) </b> <br>
								&emsp;$gambarsoal<br>$audio
								 $pilihan<br><br><div><i><u>Jawaban siswa</u></i> : <i class='show'>$jwbsis $tanda </i> Skor : $score_pgk </div><br><hr class='style1'>
								 </tr>";

										}

										if ($soal['status'] == 5) {
											$type = "Soal Menjodohkan";
											$score = 0;
											$benarJd = 0;

											$pilihjod = $jawaban_siswa;
											$list_array = '';
											$tanda_kunci = '';

											if (count($array_kuncian) > 0) {
												foreach ($array_kuncian as $index) {
													if ($kunci == strtolower($index)) {
														$tanda_kunci = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
														$list_array .= '<li>' . $index . '' . $tanda_kunci . '</li>';
													} else {
														$list_array .= '<li>' . $index . '</li>';
													}
												}

												if ($kunci == strtolower($pilihjod)) {
													$benarJd++;
													$tanda = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
												} else {
													$salah++;
													$tanda = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
												}

												$score_jd = $nilaipg / $jumlah * $benarJd;
												$score_jd_total += $score_jd;
											}

											echo "<tr>
								$soal[nomersoal]. <b>$soal[soal] ($type) </b> <br>
                                        &emsp;$gambarsoal<br>$audio <br>
										$list_array
                                        <br><br><div><i><u>Jawaban siswa</u></i> : <i class='show'> $jawaban[jawaban] </i> $tanda  Skor : $score_jd </div><br><hr class='style1'>
                                    </tr>";

										}

									}

								}

								//uraian singkat 
								$result_uraian = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$r[kodesoal]' AND status IN ('2') ORDER BY `soal`.`nomersoal` ASC ");
								$rows_uraian = mysqli_num_rows($result);

								while ($uraian_singkat = mysqli_fetch_array($result_uraian)) {

									$query2 = mysqli_query($konek, "SELECT * FROM jawaburaian WHERE nama='$r[nama]' AND kodesoal='$uraian_singkat[kodesoal]'");
									$ur = mysqli_fetch_array($query2);

									$score_uraian = $nilaipg / $jumlah * 0;

									$score_uraian_total += $score_uraian;

									$benar = '';
									$type = "Soal Uraian ";
									$jwbsis = $ur['jawaban'];

									echo "
							<tr>
							$uraian_singkat[nomersoal]. <b>$uraian_singkat[soal] ($type) </b>
							 <br>
							  &emsp;$gambarsoal<br>$audio
						<br><br>
						<div><i><u>Jawaban siswa</u></i> : <i class='show'>$jwbsis $benar </i> Skor $score_uraian</div>
						<br><hr class='style1'></tr>";

								}
								
								$total_score = $scorepg_total + $score_bs_total + $score_uraian_total + $score_jd_total + $score_pgk_total;

								?>
							</tbody>
							<div class="btn btn-default"
								style="float: right;display: block;position: absolute;bottom: 100%;left: 78%;">NILAI :
								<h3>
									<?php echo number_format($total_score, 2); ?>
								</h3>
							</div>
						</div>
					</div>
					<div class="modal-footer">

					</div>
				</div>
			</div>


			<?php
		}
	}
}
?>