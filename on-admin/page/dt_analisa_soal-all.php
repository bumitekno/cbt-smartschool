<?php
$nis = $_GET['nis'];
$kodesoal = $_GET['kodesoal'];
$qq = mysqli_query($konek, "SELECT * FROM profil where id='1'");
if ($qq == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($xx = mysqli_fetch_array($qq)) {
	$query = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE kodesoal='$kodesoal' ");
	if ($query == false) {
		die("Terjadi Kesalahan : " . mysqli_error($konek));
	}

	while ($cc = mysqli_fetch_array($query)) {
		$cari = $kodesoal;
		$querydosen = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$cari'");
		if ($querydosen == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}
		$i = 1;

		
		

		while ($sr = mysqli_fetch_array($querydosen)) {

			$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status IN ('1', '3','4','5') ORDER BY nomersoal ");
			$rows = mysqli_num_rows($result);
			$jumlah = $rows;
			$nilaipg = $sr['nilai'];
			$nilaiurai = 100 - $nilaipg;
			$nil = 0;
			$statussoal = $sr['opsi'];

			?>

			

			
			<div class="col-xs-12 kop">
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
			</div>
			<div id="tuti" class="col-xs-12 data-diri">
				<div class="col-xs-8">
					<table class="cetakan full">
						<tr>
							<td width="30px" rowspan="4" valign="top"></td>
							<td width="200px">NAMA</td>
							<td width="10px">:</td>
							<td><span class="full">
									<?php echo $cc['nama']; ?>
								</span></td>
						</tr>
						<tr>
							<td>KELAS</td>
							<td>:</td>
							<td><span class="full">
									<?php echo $cc['kelas']; ?>
								</span></td>
						</tr>
						<tr>
							<td>MATA PELAJARAN</td>
							<td>:</td>
							<td>
								<span style="width:250px">
									<?php echo $cc['kodemapel']; ?>
								</span>
							</td>
						</tr>
						<tr>
							<td>KODE SOAL</td>
							<td>:</td>
							<td>
								<span style="width:250px">
									<?php echo $cc['kodesoal']; ?>
								</span>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-xs-4">
				</div>
			</div>
			<div class="col-xs-12 jawaban">
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

					$list_menjodohkan = mysqli_query($konek, "SELECT kunci FROM soal WHERE `status`='5' AND kodesoal = '$cc[kodesoal]' ");
					$rows_jodohkan = mysqli_num_rows($list_menjodohkan);

					$array_kuncian = [];
					if ($rows_jodohkan > 0) {
						while ($chek = mysqli_fetch_array($list_menjodohkan)) {
							array_push($array_kuncian, $chek['kunci']);
						}
					}

					$benarp = 0;
					$benarBS = 0;
					$benarPGK = 0;
					$salah = 0;

					while ($soal = mysqli_fetch_array($result)) {


						$queryhistory = mysqli_query($konek, "SELECT * FROM jawabother WHERE kodesoal='$soal[kodesoal]'  AND nis='$cc[nis]' AND nomersoal='$soal[nomersoal]'");

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
									$pilihan = "
							 <div class='show jawaban'>
									  <p>a. $pilihan_a $gambar_a <i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  <p>b. $pilihan_b $gambar_b</p>
									  <p>c. $pilihan_c $gambar_c</p>
									  <p>d. $pilihan_d $gambar_d</p>
									  <p class='$statussoal'>e. $pilihan_e $gambar_e</p></div>";
								} else if ($kunci == "b") {
									$pilihan = "
							 <div class='show jawaban'>
									  <p>a. $pilihan_a $gambar_a</p>
									  <p>b. $pilihan_b $gambar_b <i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  <p>c. $pilihan_c $gambar_c</p>
									  <p>d. $pilihan_d $gambar_d</p>
									  <p class='$statussoal'>e. $pilihan_e $gambar_e</p></div>";
								} else if ($kunci == "c") {
									$pilihan = "
							 <div class='show jawaban'>
									  <p>a. $pilihan_a $gambar_a</p>
									  <p>b. $pilihan_b $gambar_b</p>
									  <p>c. $pilihan_c $gambar_c <i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  <p>d. $pilihan_d $gambar_d</p>
									  <p class='$statussoal'>e. $pilihan_e $gambar_e</p></div>";
								} else if ($kunci == "d") {
									$pilihan = "
									 <div class='show jawaban'>
									  <p>a. $pilihan_a $gambar_a</p>
									  <p>b. $pilihan_b $gambar_b</p>
									  <p>c. $pilihan_c $gambar_c</p>
									  <p>d. $pilihan_d $gambar_d <i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  <p class='$statussoal'>e. $pilihan_e $gambar_e</p></div>";
								} else if ($kunci == "e") {

									$pilihan = "
									 <div class='show jawaban'>
									  <p>a. $pilihan_a $gambar_a</p>
									  <p>b. $pilihan_b $gambar_b</p>
									  <p>c. $pilihan_c $gambar_c</p>
									  <p>d. $pilihan_d $gambar_d</p>
									  <p class='$statussoal'>e. $pilihan_e $gambar_e <i class='fa fa-star' style='font-size:15px;color:green'></i></p></div>";
								}

								// echo 'AAA'.$nilaipg;	echo '<br/>';		
								// echo 'BBB'.$jumlah;		echo '<br/>';
								// echo 'CCC'.$benarp;		echo '<br/>';
		
								$scorepg = $nilaipg / $jumlah * $benarp;
								$scorepg_total = $scorepg;
								var_dump($benarp);

								echo "
									<tr>
									$soal[nomersoal]. <b>$soal[soal] ($type) </b>
								 <br>
									&emsp;$gambarsoal<br>$audio
									$pilihan
										<div><i><u>Jawaban siswa</u></i> : <i class='show'>$jwbsis $tanda </i>  Skor : $scorepg </div>
										<br>
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
								<div><i><u>Jawaban siswa</u></i> : <i class='show'>$jwbsis $tanda</i>   Skor: $score_bs </div>
								<br>
							    </tr>";

							}

							if ($soal['status'] == 4) {

								$score = 0;
								$benarPGK = 0;
								$type = "Pilihan Ganda Kompleks ";

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
										$tanda_a = "<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
									}
									if ($l == 'b') {
										$tanda_b = "<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
									}
									if ($l == 'c') {
										$tanda_c = "<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
									}
									if ($l == 'd') {
										$tanda_d = "<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
									}
									if ($l == 'e') {
										$tanda_e = "<i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
									}
								}

								$pilihan = "
							 	<div class='show jawaban'>
											  <p>a. $pilihan_a $gambar_a $tanda_a </p>
											  <p>b. $pilihan_b $gambar_b $tanda_b</p>  
											  <p>c. $pilihan_c $gambar_c $tanda_c</p> 
											  <p>d. $pilihan_d $gambar_d $tanda_d</p> 
											  <p class='$statussoal'>e. $pilihan_e $gambar_e $tanda_e</p> </div> ";

								$score_pgk = $nilaipg / $jumlah * $benarPGK;
								$score_pgk_total += $score_pgk;

								echo "<tr>
								$soal[nomersoal]. <b>$soal[soal] ($type) </b> <br>
								&emsp;$gambarsoal<br>$audio
								 $pilihan<div><i><u>Jawaban siswa</u></i> : <i class='show'>$jwbsis $tanda </i> Skor : $score_pgk </div><br>
								 </tr>";

							}

							if ($soal['status'] == 5) {
								$type = "Soal Menjodohkan";
								$score = 0;
								$benarJd = 0;

								$pilihjod = $jawaban_siswa;
								$pilihjod = $jawaban_siswa;
								$list_array = '';
								$tanda_kunci = '';
								if (count($array_kuncian) > 0) {
									foreach ($array_kuncian as $index) {
										if ($kunci == strtolower($index)) {
											$tanda_kunci = " <i class='fa fa-check-circle' style='font-size:20px;color:green'></i>";
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
								$soal[nomersoal]. <b>$soal[soal] ($type) </b>
                                        &emsp;$gambarsoal<br>$audio <br>
										<div class='jawaban'>
										$list_array
										</div>
                                        <div><i><u>Jawaban siswa</u></i> : <i class='show'> $jawaban[jawaban] $tanda</i>  Skor : $score_jd </div><br>
                                    </tr>";

							}

						}

						// echo $scorepg_total.'-'.$score_bs_total.'-'.$score_uraian_total.'-'.$score_jd_total.'-'.$score_pgk_total;
						$total_score = $scorepg_total + $score_bs_total + $score_uraian_total + $score_jd_total + $score_pgk_total;
					}

					// Urain
					$result_uraian = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status = '2' ORDER BY `soal`.`nomersoal` ASC ");
					$rows_uraian = mysqli_num_rows($result_uraian);

					$score_max = 0;
					while ($uraian_singkat = mysqli_fetch_array($result_uraian)) {

						$query2 = mysqli_query($konek, "SELECT * FROM jawaburaian WHERE nama='$cc[nama]' AND kodesoal='$uraian_singkat[kodesoal]' AND nomersoal= $uraian_singkat[nomersoal]");
						$ur = mysqli_fetch_array($query2);

						$score_max = $rows_uraian * 5; // point skore 5 * jumlah soal
		
						$score_uraian = $ur['nilai'];

						$score_uraian_total += $score_uraian;
						//$total_score = $score_uraian_total / $score_max * 100;

						$benar = '';
						$type = "Soal Uraian ";
						$jwbsis = $ur['jawaban'];

						echo "
						<tr>
							$uraian_singkat[nomersoal]. <b>$uraian_singkat[soal] ($type) </b>
						 <br>
						  &emsp;$gambarsoal<br>$audio
							<div><i><u>Jawaban siswa</u></i> : <i class='show'>$jwbsis $benar </i> Skor : $score_uraian</div>
							<br>
						</tr>";

					}

					

					
					$score_uraian_final = 0;
					if ($rows_uraian > 0) {
						$score_uraian_final = ($score_uraian_total/$score_max)*($nilaiurai);
						echo " Keterangan Uraian<br>";
						echo " =============================================== <br>";
						echo " Jumlah Soal Essay :  " . $rows_uraian . '<br>';
						echo " Skala Skor 1-5 <br>";
						echo " Skor yang diperoleh : " . $score_uraian_total . '<br>';
						echo " Total Skor Maksimal :  " . $score_max . " ( Jumlah Soal x skor maksimal )  <br>";
						echo " Nilai Uraian = Skor yang diperoleh / Total Skor Maksimal x Bobot Uraian  ";
						echo " <br>               <span style='padding-left:90px'>" .$score_uraian_total." / " . $score_max . " x ".$nilaiurai."%<span>  ";
						echo " <br>               <span style='padding-left:90px'>" .number_format($score_uraian_final,2)."";
					}

					$score_akhir = $total_score + $score_uraian_final;

					echo "<br> Nilai Lain = " . number_format($total_score, 2) . '<br>';

					?>
				</tbody>

				<div class="btn btn-default" style="float: right;display: block;position: absolute;bottom: 100%;left: 78%;">NILAI :
					<h3>
						<?php echo number_format($score_akhir, 2); ?>
					</h3>
				</div>
				<center>
					<h5><b> --------- &copy;
							<?php echo date('Y') ?>
							<?php echo $xx['n_sekolah']; ?> ---------
						</b></h5>
				</center>

				<div style="padding: 100px 0;"></div>
				<div class="page-break"></div>

			</div>
			

		<?php }
	}
} ?>