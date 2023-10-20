<?php
$nis = $_GET['nis'];
$qq = mysqli_query($konek, "SELECT * FROM profil where id='1'");
if ($qq == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($xx = mysqli_fetch_array($qq)) {
	$query = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE nis='$nis'");
	if ($query == false) {
		die("Terjadi Kesalahan : " . mysqli_error($konek));
	}
	while ($cc = mysqli_fetch_array($query)) {
		$cari = $cc['kodesoal'];
		$querydosen = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$cari'");
		if ($querydosen == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}
		$i = 1;
		while ($sr = mysqli_fetch_array($querydosen)) {
			$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status IN ('1', '3', '4','5')");
			$rows = mysqli_num_rows($result);
			$jumlah = $rows;
			$nilaipg = $sr['nilai'];
			$nil = 0;
			?>
			<div class="col-xs-12">
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
			<div id="tuti" class="col-xs-12">
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

					$qu = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$cc[kodesoal]'");
					if ($qu == false) {
						die("Terjadi Kesalahan : " . mysqli_error($konek));
					}

					$list_menjodohkan = mysqli_query($konek, "SELECT kunci FROM soal WHERE `status`='5' AND kodesoal = '$cc[kodesoal]' ");
					$rows_jodohkan = mysqli_num_rows($list_menjodohkan);

					$array_kuncian = [];
					if ($rows_jodohkan > 0) {
						while ($chek = mysqli_fetch_array($list_menjodohkan)) {
							array_push($array_kuncian, $chek['kunci']);
						}
					}

					while ($rr = mysqli_fetch_array($qu)) {
						$query = mysqli_query($konek, "SELECT * FROM soal CROSS JOIN nilaihasil USING (kodesoal) WHERE nama='$cc[nama]' and kodesoal='$cc[kodesoal]' ORDER by nomersoal ASC");
						if ($query == false) {
							die("Terjadi Kesalahan : " . mysqli_error($konek));
						}

						while ($ar = mysqli_fetch_array($query)) {

							$query2 = mysqli_query($konek, "SELECT * FROM jawaburaian WHERE nama='$cc[nama]' AND nomersoal='$ar[nomersoal]' AND kodesoal='$cc[kodesoal]'");

							$ur = mysqli_fetch_array($query2);


							if (!$ar['soal'] == '') {
								$soal = "<b>$ar[soal]</b><br><br>";
							} else {
								$soal = "";
							}

							if (!$ar['audio'] == '') {
								$audio = "<audio src='images/$ar[audio]' controls controlsList='nodownload'></audio>";
							} else {
								$audio = "";
							}

							if (!$ar['gambarsoal'] == '') {
								$gambarsoal = "<img class='max' src='../gbr/$ar[gambarsoal]' align=center style='max-width:300pk;height:auto' ><br>";
							} else {
								$gambarsoal = "";
							}

							if (!$ar['gambar_a'] == '') {
								$gambar_a = "<img src='../gbr/$ar[gambar_a]' align=center style='max-width:300pk;height:auto' >";
							} else {
								$gambar_a = "";
							}
							if (!$ar['pilihan1'] == '') {
								$pilihan_a = "$ar[pilihan1]";
							} else {
								$pilihan_a = "";
							}
							if (!$ar['gambar_b'] == '') {
								$gambar_b = "<img src='../gbr/$ar[gambar_b]' align=center style='max-width:300pk;height:auto' >";
							} else {
								$gambar_b = "";
							}
							if (!$ar['pilihan2'] == '') {
								$pilihan_b = "$ar[pilihan2]";
							} else {
								$pilihan_b = "";
							}
							if (!$ar['gambar_c'] == '') {
								$gambar_c = "<img src='../gbr/$ar[gambar_c]' align=center style='max-width:300pk;height:auto' >";
							} else {
								$gambar_c = "";
							}
							if (!$ar['pilihan3'] == '') {
								$pilihan_c = "$ar[pilihan3]";
							} else {
								$pilihan_c = "";
							}
							if (!$ar['gambar_d'] == '') {
								$gambar_d = "<img src='../gbr/$ar[gambar_d]' align=center style='max-width:300pk;height:auto' >";
							} else {
								$gambar_d = "";
							}
							if (!$ar['pilihan4'] == '') {
								$pilihan_d = "$ar[pilihan4]";
							} else {
								$pilihan_d = "";
							}

							if (!$ar['gambar_e'] == '') {
								$gambar_e = "<img src='../gbr/$ar[gambar_e]' align=center style='max-width:300pk;height:auto' >";
							} else {
								$gambar_e = "";
							}
							if (!$ar['pilihan5'] == '') {
								$pilihan_e = "$ar[pilihan5]";
							} else {
								$pilihan_e = "";
							}

							if ($ar['status'] == 1) {
								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='1'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtoupper($kuncis1);
								$rows = mysqli_num_rows($query3);


								$benarp = 0;


								$type = "Pilihan Ganda";
								$jwbsis = $ar['jawabansiswa'];

								if (substr_count($jwbsis, $kuncis2)) {
									$benar = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
									$jwbsis = $kuncis2;
									$benarp++;
								} else {
									$benar = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
									$jwbsis = '-';
								}

								$scorepg = $nilaipg / $jumlah * $benarp;

								$scorepg_total += $scorepg;


								if ($kuncis2 == "A") {
									$pilihan = "<br>
							 <div class='$statussoal'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
									  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
								} else if ($kuncis2 == "B") {
									$pilihan = "<br>
							 <div class='$statussoal'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
									  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
								} else if ($kuncis2 == "C") {
									$pilihan = "<br>
							 <div class='$statussoal'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
									  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
								} else if ($kuncis2 == "D") {

									$pilihan = "<br>
									 <div class='$statussoal'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
								} else if ($kuncis2 == "E") {

									$pilihan = "<br>
									 <div class='$statussoal'>
									  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
									  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
									  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
									  &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
									  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
								}

								echo "
								<tr>
								$ar[nomersoal]. <b>$ar[soal] ($type) </b>
							 <br>
								&emsp;$gambarsoal<br>$audio
								$pilihan
								<br><br>
									<div><i><u>Jawaban siswa</u></i> : <i class='$statussoal'>$jwbsis $benar </i>  Skor : $scorepg </div>
									<br>
									<hr class='style1'>
								</tr>";

							}

							if ($ar['status'] == 2) {

								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='2'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtoupper($kuncis1);
								$rows = mysqli_num_rows($query3);
								$nilaimaxurai = 100 - $rr['nilai'];
								$nilaipersoal = $nilaimaxurai / $rows;
								$nilaiperbiji = $nilaipersoal / 5;
								$skorurai = $ur['nilai'] * $nilaiperbiji;

								$type = "Soal Uraian  ";

								$jwbsis = $ur['jawaban'];

								$benar = '';

								$score_uraian = $nilaipg / $jumlah * 0;

								$score_uraian_total += $score_uraian;


								echo "
                                    <tr>
                                        $ar[nomersoal]. <b>$ar[soal] ($type) </b>
                                     <br>
                                      &emsp;$gambarsoal<br>$audio
                                <br><br>
                                <div><i><u>Jawaban siswa</u></i> : <i class='$statussoal'>$jwbsis $benar </i> Skor $score_uraian</div>
                                <br><hr class='style1'></tr>";

							}

							if ($ar['status'] == 3) {

								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='3'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtoupper($kuncis1);
								$rows = mysqli_num_rows($query3);


								$type = "Soal Benar atau Salah ";

								$jwbsis = $ar['jawabansiswa'];

								$benarBS = 0;

								if (substr_count($jwbsis, 'T')) {

									$jwbsis = "Benar";
									$benarBS++;
									$benar = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
								}

								if (substr_count($jwbsis, 'F')) {

									$jwbsis = "Salah";
									$benarBS++;
									$benar = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
								}

								$score_bs = $nilaipg / $jumlah * $benarBS;
								$score_bs_total += $score_bs;

								echo "
								<tr>
								$ar[nomersoal]. <b>$ar[soal] ($type) </b>
								<br>
								&emsp;$gambarsoal<br>$audio
								
								<br><br>
								<div><i><u>Jawaban siswa</u></i> : <i class='$statussoal'>$jwbsis </i>  $benar Skor: $score_bs </div>
								<br>
								<hr class='style1'>
							    </tr>";

							}

							if ($ar['status'] == 4) {

								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='4'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtoupper($kuncis1);
								$rows = mysqli_num_rows($query3);

								$score = 0;
								$benarPGK = 0;

								$type = "Pilihan Ganda Komplek ";

								if ($kuncis1 == "ABC") {
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p> 
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
									$jwbsis = 'ABC';
									$benarPGK++;
								} else if ($kuncis1 == "ABD") {
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div>  ";
									$jwbsis = 'ABD';
									$benarPGK++;
								} else if ($kuncis1 == "ABE") {
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p> 
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>  
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
									$jwbsis = 'ABE';
									$benarPGK++;
								} else if ($kuncis1 == "BCD") {
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
									$jwbsis = 'BCD';
									$benarPGK++;
								} else if ($kuncis1 == "BCE") {
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
									$jwbsis = 'BCE';
									$benarPGK++;
								} else if ($kuncis1 == "ACD") {
									$jwbsis = 'ACD';
									$benarPGK++;
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
								} else if ($kuncis1 == "ACE") {
									$jwbsis = 'ACE';
									$benarPGK++;
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "CDE") {
									$jwbsis = 'CDE';
									$benarPGK++;
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "AD") {
									$jwbsis = 'AD';
									$benarPGK++;
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c </p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "AB") {
									$jwbsis = 'AB';
									$benarPGK++;
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c </p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "AC") {
									$benarPGK++;
									$jwbsis = 'AC';
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b  </p>
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "AE") {
									$jwbsis = 'AE';
									$benarPGK++;
									$pilihan = "<br>
									  <div class='show'>
												  &emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
												  &emsp;<p>b. &emsp;$pilihan_b $gambar_b  </p>
												  &emsp;<p>c. &emsp;$pilihan_c $gambar_c  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
												  &emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
												  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								}

								$score_pgk = $nilaipg / $jumlah * $benarPGK;
								$score_pgk_total += $score_pgk;

								echo "<tr>
                                        $ar[nomersoal]. <b>$ar[soal] ($type) </b><br>
                                        &emsp;$gambarsoal<br>$audio
                                        $pilihan<br><br><div><i><u>Jawaban siswa</u></i> : <i class='$statussoal'>$jwbsis $benar </i> Skor : $score_pgk </div><br><hr class='style1'>
                                    </tr>";

							}

							if ($ar['status'] == 5) {
								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='5'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtolower($kuncis1);
								$rows = mysqli_num_rows($query3);

								$type = "Soal Menjodohkan";

								$score = 0;
								$benarJd = 0;

								$pilihjod = '';
								$list_array = '';
								$benar = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";

								if (count($array_kuncian) > 0) {
									foreach ($array_kuncian as $index) {
										$jawaban_list = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $index)));
										$jawaban_kunci = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ar['kunci'])));
										if (strstr($jawaban_list, $jawaban_kunci)) {
											$pilihjod = $index;
											$benar = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
											$benarJd++;
										}

										$list_array .= '<li>' . $index . '</li>';
									}

									$score_jd = $nilaipg / $jumlah * $benarJd;
									$score_jd_total += $score_jd;
								}

								echo "<tr>
                                        $ar[nomersoal]. <b>$ar[soal] ($type) </b><br>
                                        &emsp;$gambarsoal<br>$audio <br>
										$list_array
                                        <br><br><div><i><u>Jawaban siswa</u></i> : <i class='$statussoal'> $pilihjod </i> $benar  Skor : $score_jd </div><br><hr class='style1'>
                                    </tr>";

							}

						}

						$total_score = $scorepg_total + $score_bs_total + $score_uraian_total + $score_jd_total + $score_pgk_total;

						?>
						<hr class="style2">
						<center>
							<h5><b> --------- &copy;
									<?php echo date('Y') ?>
									<?php echo $xx['n_sekolah']; ?> ---------
								</b></h5>
						</center>
					</tbody>
				</div>
				<a class="btn btn-default" style="float:right;">NILAI : <h3>
						<?php echo number_format($total_score, 2); ?>
					</h3></a>
			<?php }
		}
	}
} ?>