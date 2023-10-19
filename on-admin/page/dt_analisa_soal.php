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
		$i = 1;
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
			$nilaipg = $sr['nilai'];
			$x = $cc['jawabansiswa'];
			$xhasil = substr_count($x, "X");

			$kuncisoal = $cc['kuncisoal'];
			$kuncis = strtoupper($kuncisoal);
			$key = $kuncis;

			$jumlah = $rows;
			$score = 0;
			$benar = 0;
			$salaht = 0;
			$kosong = 0;

			for ($no = 0; $no < $jumlah; $no++) {

				$jawaban_siswa = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $x[$no])));

				$jawaban_kunci = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $key[$no])));

				if ($jawaban_kunci == $jawaban_siswa) {
					//jika jawaban cocok (benar)
					$benar++;
				} else {
					//jika salah
					$salaht++;
				}
				$salah = $salaht - $xhasil;
			}
			$score = $nilaipg / $jumlah * $benar;

			$urai = $cc['nilaiurai'];
			$nil = $score + $urai;
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
					<a class="btn btn-default" style="float:right;">NILAI : <h3>
							<?php echo number_format($nil, 2); ?>
						</h3></a>
				</div>
			</div>
			<div class="col-xs-12">
				<hr class="style2">
				<tbody>
					<?php
					$qu = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$cc[kodesoal]'");
					if ($qu == false) {
						die("Terjadi Kesalahan : " . mysqli_error($konek));
					}
					while ($rr = mysqli_fetch_array($qu)) {
						$query = mysqli_query($konek, "SELECT * FROM soal CROSS JOIN nilaihasil USING (kodesoal) WHERE nama='$cc[nama]' and kodesoal='$cc[kodesoal]' ORDER by nomersoal ASC");
						if ($query == false) {
							die("Terjadi Kesalahan : " . mysqli_error($konek));
							$i = 1;
						}
						while ($ar = mysqli_fetch_array($query)) {
							$query2 = mysqli_query($konek, "SELECT * FROM jawaburaian WHERE nama='$cc[nama]' AND nomersoal='$ar[nomersoal]' AND kodesoal='$cc[kodesoal]'");
							$ur = mysqli_fetch_array($query2);
							if (!$ar['audio'] == '') {
								$audio = "<audio src='images/$ar[audio]' controls controlsList='nodownload'></audio>";
							} else {
								$audio = "";
							}


							if ($ar['status'] == 1) {

								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='1'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtoupper($kuncis1);
								$rows = mysqli_num_rows($query3);
								$nilaimaxurai = 100 - $rr['nilai'];
								$nilaipersoal = $nilaimaxurai / $rows;
								$nilaiperbiji = $nilaipersoal / 5;
								$skorurai = $ur['nilai'] * $nilaiperbiji;

								$type = "Pilihan Ganda";

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

							}

							if ($ar['status'] == 3) {

								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='3'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtoupper($kuncis1);
								$rows = mysqli_num_rows($query3);
								$nilaimaxurai = 100 - $rr['nilai'];
								$nilaipersoal = $nilaimaxurai / $rows;
								$nilaiperbiji = $nilaipersoal / 5;
								$skorurai = $ur['nilai'] * $nilaiperbiji;

								$type = "Soal Benar atau Salah ";

							}

							if ($ar['status'] == 4) {

								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='4'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtoupper($kuncis1);
								$rows = mysqli_num_rows($query3);
								$nilaimaxurai = 100 - $rr['nilai'];
								$nilaipersoal = $nilaimaxurai / $rows;
								$nilaiperbiji = $nilaipersoal / 5;
								$skorurai = $ur['nilai'] * $nilaiperbiji;

								$type = "Pilihan Ganda Komplek ";

							}

							if ($ar['status'] == 5) {

								$query3 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cc[kodesoal]' AND status='5'");
								$kuncis1 = $ar['kunci'];
								$kuncis2 = strtolower($kuncis1);
								$rows = mysqli_num_rows($query3);
								$nilaimaxurai = 100 - $rr['nilai'];
								$nilaipersoal = $nilaimaxurai / $rows;
								$nilaiperbiji = $nilaipersoal / 5;
								$skorurai = $ur['nilai'] * $nilaiperbiji;

								$type = "Soal Menjodohkan";

							}

							if ($ur['jawaban'] == "") {
								$nillai = "";
							} else {
								$nillai = "<p><i>skor = $skorurai</i><ul>$ur[jawaban]</ul></p>";
							}
							if (!$ar['soal'] == '') {
								$soal = "<b>$ar[soal]</b><br><br>";
							} else {
								$soal = "";
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

							if ($ar['status'] == 5) {
								$jwbsis = strtolower($ar['jawabansiswa']);
								if (strstr($jwbsis, $kuncis2)) {
									$benar = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
									$jwbsis = $kuncis1;
								} else {
									$benar = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
									$jwbsis = '-';
								}
							}

							if ($ar['status'] == 3) {
								if ($jwbsis == "T") {
									$jwbsis = "Benar";
								} else if ($jwbsis == "F") {
									$jwbsis = "Salah";
								}
							}

							if ($ar['status'] == 1) {

								$jwbsis = $ar['jawabansiswa'][$ar['nomorsoal']];

								if (strtolower($jwbsis) == strtolower($kuncis2)) {
									$benar = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
								} else {
									$benar = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
								}

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
								} else if ($kuncis2 == "T") {

									$pilihan = "<br>
								  <div class='$statussoal'>
										&emsp;<p> &emsp;Benar &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
										&emsp;<p> &emsp;Salah </p>
										</div>";

								} else if ($kuncis2 == "F") {

									$pilihan = "<br>
								  <div class='$statussoal'>
										&emsp;<p> &emsp;Benar </p>
										&emsp;<p> &emsp;Salah &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
										</div>";

								} else {

									$pilihan = "<br>
									<div class='$statussoal'>
										  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
										  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
										  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
										  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
										  &emsp;<p>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p></div>";
								}

							}

							if ($ar['status'] == 4) {

								if ($kuncis1 == "ABC") {
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d</p> 
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
									$jwbsis = 'ABC';
								} else if ($kuncis1 == "ABD") {
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div>  ";
									$jwbsis = 'ABD';
								} else if ($kuncis1 == "ABE") {
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c</p> 
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>  
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
									$jwbsis = 'ABE';
								} else if ($kuncis1 == "BCD") {
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p> 
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
									$jwbsis = 'BCD';
								} else if ($kuncis1 == "BCE") {
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p> 
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
									$jwbsis = 'BCE';
								} else if ($kuncis1 == "ACD") {
									$jwbsis = 'ACD';
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
								} else if ($kuncis1 == "ACE") {
									$jwbsis = 'ACE';
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "CDE") {
									$jwbsis = 'CDE';
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "AD") {
									$jwbsis = 'AD';
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c </p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "AB") {
									$jwbsis = 'AB';
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c </p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								} else if ($kuncis1 == "AC") {
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
									$pilihan = "<br>
									  <div class='show'>
											&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
											&emsp;<p>b. &emsp;$pilihan_b $gambar_b  </p>
											&emsp;<p>c. &emsp;$pilihan_c $gambar_c  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
											&emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
											&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
								}

							}

							if ($ar['status'] == 5) {
								$pilihan = $kuncis1;
							}

							echo "
								<tr>
								$ar[nomersoal]. <b>$ar[soal] ($type) </b>
							    <br>
								&emsp;$gambarsoal<br>$audio
								$pilihan
								<br><br>
                                <div><i><u>Jawaban siswa</u></i> : <i class='$statussoal'>$jwbsis $benar </i> $nillai</div>
                                <br>
                                <hr class='style1'>
								</tr>";


						}


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
			<?php }
		}
	}
} ?>