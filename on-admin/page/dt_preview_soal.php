<?php
$mapel = $_GET['matpel'];
$jenis = $_GET['jenis'];
$kode = $_GET['kode'];
$qq = mysqli_query($konek, "SELECT * FROM profil where id='1'");
if ($qq == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($xx = mysqli_fetch_array($qq)) {
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
		<div class="col-xs-9">
			<table class="cetakan full">
				<tr>
					<td width="30px" rowspan="3" valign="top"></td>
					<td width="200px">JENIS UJIAN</td>
					<td width="10px">:</td>
					<td><span class="full">
							<?php echo $jenis; ?>
						</span></td>
				</tr>
				<tr>
					<td>MATA PELAJARAN</td>
					<td>:</td>
					<td>
						<span style="width:250px">
							<?php echo $mapel; ?>
						</span>
					</td>
				</tr>
				<tr>
					<td>KODE SOAL</td>
					<td>:</td>
					<td>
						<span style="width:250px">
							<?php echo $kode; ?>
						</span>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-xs-12">
			<hr class="style2">
			<tbody>
				<?php
				$qu = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$kode'");
				if ($qu == false) {
					die("Terjadi Kesalahan : " . mysqli_error($konek));
				}

				$list_menjodohkan = mysqli_query($konek, "SELECT kunci FROM soal WHERE `status`='5' AND kodesoal='$kode' ");
				$rows_jodohkan = mysqli_num_rows($list_menjodohkan);

				$array_kuncian = [];
				if ($rows_jodohkan > 0) {
					while ($chek = mysqli_fetch_array($list_menjodohkan)) {
						array_push($array_kuncian, $chek['kunci']);
					}
				}

				while ($rr = mysqli_fetch_array($qu)) {
					$querydosen = mysqli_query($konek, "SELECT * FROM soal where kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode' ORDER BY nomersoal ASC");
					if ($querydosen == false) {
						die("Terjadi Kesalahan : " . mysqli_error($konek));
					}
					while ($ar = mysqli_fetch_array($querydosen)) {

						if (!$ar['audio'] == '') {
							$audio = "<audio src='../gbr/$ar[audio]' controls controlsList='nodownload'></audio>";
						} else {
							$audio = "";
						}

						if (!$ar['soal'] == '') {
							$soal = "<b>$ar[soal]</b><br>";
						} else {
							$soal = "<br>";
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
							$gambar_c = "<img src='../gbr/$ar[gambar_c]' style='max-width:300pk;height:auto' >";
						} else {
							$gambar_c = "";
						}
						if (!$ar['pilihan3'] == '') {
							$pilihan_c = "$ar[pilihan3]";
						} else {
							$pilihan_c = "";
						}
						if (!$ar['gambar_d'] == '') {
							$gambar_d = "<img src='../gbr/$ar[gambar_d]' style='max-width:300pk;height:auto' >";
						} else {
							$gambar_d = "";
						}
						if (!$ar['pilihan4'] == '') {
							$pilihan_d = "$ar[pilihan4]";
						} else {
							$pilihan_d = "";
						}

						if (!$ar['gambar_e'] == '') {
							$gambar_e = "<img src='../gbr/$ar[gambar_e]' style='max-width:300pk;height:auto' >";
						} else {
							$gambar_e = "";
						}
						if (!$ar['pilihan5'] == '') {
							$pilihan_e = "$ar[pilihan5]";
						} else {
							$pilihan_e = "";
						}

						if ($ar['status'] == 1) {

							if ($ar['kunci'] == "A") {
								$pilihan = "<br>
							 <div class='$statussoal'>
											  &emsp;<p>a. &emsp;$pilihan_a $gambar_a  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>  
											  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p> 
											  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p> 
											  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
							} else if ($ar['kunci'] == "B") {
								$pilihan = "<br>
						 		<div class='$statussoal'>
											  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>  
											  &emsp;<p>b. &emsp;$pilihan_b $gambar_b  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>  
											  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>  
											  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div>  ";
							} else if ($ar['kunci'] == "C") {
								$pilihan = "<br>
						 		<div class='$statussoal'>
											  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>  
											  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>  
											  &emsp;<p>c. &emsp;$pilihan_c $gambar_c  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											  &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>  
											  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
							} else if ($ar['kunci'] == "D") {
								$pilihan = "<br>
								 <div class='$statussoal'>
											  &emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>  
											  &emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>  
											  &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p> 
											  &emsp;<p>d. &emsp;$pilihan_d $gambar_d   &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
											  &emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
							}

							echo "
								<tr>
								<hr style='height:1px;border:none;color:#d3d1d1;background-color:#d3d1d1;' />
								$ar[nomersoal].&emsp;$soal
								&emsp;$gambarsoal (Pilihan Ganda )  <br>$audio
								$pilihan
								<br>
		
									   <td align=center>
									   </td>
								</tr>";


						}

						if ($ar['status'] == 2) {
							echo "
							<tr>
								   <hr style='height:1px;border:none;color:#d3d1d1;background-color:#d3d1d1;' />
								   $ar[nomersoal].&emsp;$soal
								   &emsp;$gambarsoal ( Soal Uraian   )<br> $audio
								   <td>
									 - 
								   </td>  
							</tr>";
						}

						if ($ar['status'] == 3) {

							$checked_true = $ar['kunci'] == "T" ? 'checked' : '';
							$checked_false = $ar['kunci'] == "F" ? 'checked' : '';

							$pilihan_benar_salah = "<br>
											  <div class='show'>
												<div class='form-check'>
												<input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1' " . $checked_true . "  disabled>
												<label class='form-check-label' for='flexRadioDefault1'>
													Benar
												</label>
											</div>
											<div class='form-check'>
												<input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault2' " . $checked_false . " disabled>
												<label class='form-check-label' for='flexRadioDefault2'>
													Salah
												</label>
											</div>
									</div> ";

							echo "
								<tr>
								<hr style='height:1px;border:none;color:#d3d1d1;background-color:#d3d1d1;' />
								$ar[nomersoal].&emsp;$soal
								&emsp;$gambarsoal ( Benar atau Salah  ) <br>$audio
								$pilihan_benar_salah
								<br>
									   <td align=center>
									   </td>
								</tr>";

						}

						if ($ar['status'] == 4) {

							if ($ar['kunci'] == "ABC") {
								$pilihan = "<br>
									   <div class='show'>
															&emsp;<p>a. &emsp;$pilihan_a $gambar_a  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
															&emsp;<p>b. &emsp;$pilihan_b $gambar_b  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>c. &emsp;$pilihan_c $gambar_c  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
															&emsp;<p>d. &emsp;$pilihan_d $gambar_d</p> 
															&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
							} else if ($ar['kunci'] == "ABD") {
								$pilihan = "<br>
									   <div class='show'>
															&emsp;<p>a. &emsp;$pilihan_a $gambar_a  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>b. &emsp;$pilihan_b $gambar_b  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
															&emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>  
															&emsp;<p>d. &emsp;$pilihan_d $gambar_d  &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div>  ";
							} else if ($ar['kunci'] == "ABE") {
								$pilihan = "<br>
									   <div class='show'>
															&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>c. &emsp;$pilihan_c $gambar_c</p> 
															&emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>  
															&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
							} else if ($ar['kunci'] == "BCD") {
								$pilihan = "<br>
									   <div class='show'>
															&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p> 
															&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
															&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
							} else if ($ar['kunci'] == "BCE") {
								$pilihan = "<br>
									   <div class='show'>
															&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p> 
															&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
															&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
							} else if ($ar['kunci'] == "ACD") {
								$pilihan = "<br>
									   <div class='show'>
															&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
															&emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
															&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>
															&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p> </div> ";
							} else if ($ar['kunci'] == "ACE") {
								$pilihan = "<br>
									   <div class='show'>
															&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
															&emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
															&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
															&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
							} else if ($ar['kunci'] == "CDE") {
								$pilihan = "<br>
									   <div class='show'>
															&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> 
															&emsp;<p>b. &emsp;$pilihan_b $gambar_b </p>  
															&emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p>  
															&emsp;<p>d. &emsp;$pilihan_d $gambar_d </p>
															&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-check-circle' style='font-size:20px;color:green'></i></p> </div> ";
							}

							echo "
							<tr>
							<hr style='height:1px;border:none;color:#d3d1d1;background-color:#d3d1d1;' />
							$ar[nomersoal].&emsp;$soal
							&emsp;$gambarsoal (Pilihan Ganda Komplek )  <br>$audio
							$pilihan
							<br>
								   <td align=center>
								   </td>
							</tr>";

						}


						if ($ar['status'] == 5) {

							$pilihjod = '';
							$list_array = '';

							if (count($array_kuncian) > 0) {
								foreach ($array_kuncian as $index) {
									$jawaban_list = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $index)));
									$jawaban_kunci = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ar['kunci'])));
									if (strstr($jawaban_list, $jawaban_kunci)) {
										$pilihjod = $index;
									}

									$list_array .= '<li>' . $index . '</li>';
								}
							}

							echo "
								   <tr>
										  <hr style='height:1px;border:none;color:#d3d1d1;background-color:#d3d1d1;' />
										  $ar[nomersoal].&emsp;$soal
										  &emsp;$gambarsoal ( Soal Menjodohkan dengan jawaban yang benar )<br> $audio
										  <br>
										  $list_array
										  <br>
										  $pilihjod
										  <td>
										  </td>  
								   </tr>";
						}



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
} ?>