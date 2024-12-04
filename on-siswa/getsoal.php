<?php
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');
?>
<?php

// Ambil soal yang sedang dikerjakan
$querydosen = mysqli_query($konek, "SELECT kodesoal FROM jawaban WHERE nis='$username'");
if ($querydosen == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}



while ($ar = mysqli_fetch_array($querydosen)) {
	// Ambil ujian
	$qu = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$ar[kodesoal]'");
	if ($qu == false) {
		die("Terjadi Kesalahan : " . mysqli_error($konek));
	}

	// Ambil kunci jawaban
	$list_menjodohkan = mysqli_query($konek, "SELECT kunci FROM soal WHERE `status`='5' AND kodesoal='$ar[kodesoal]' ");
	$rows_jodohkan = mysqli_num_rows($list_menjodohkan);

	// Simpan kunci jawaban menjodohkan
	$array_kuncian = [];
	if ($rows_jodohkan > 0) {
		while ($chek = mysqli_fetch_array($list_menjodohkan)) {
			array_push($array_kuncian, $chek['kunci']);
		}
	}

	// Ujian
	while ($rr = mysqli_fetch_array($qu)) {
		// Setting soal acak atau urut dari tabel ujian

		if ($rr['acak'] > 1) {
			$acak = "nomersoal ASC";
		} else {
			$acak = "RAND ()";
		}


		$query = mysqli_query($konek, "SELECT * FROM soal CROSS JOIN jawaban USING (kodesoal) WHERE nis='$username' AND soal.status != 5 ORDER by nomersoal ASC, $acak");

		//uraian 
		$queryuraian = mysqli_query($konek, "SELECT * FROM jawaburaian WHERE nis='$username' AND kodesoal='$ar[kodesoal]'");
		$dataUraian = [];
		while ($jawabs = mysqli_fetch_array($queryuraian)) {
			$dataUraian[$jawabs['nomersoal']] = $jawabs;
		}

		$queryjawaban = mysqli_query($konek, "SELECT id,nomersoal,jawaban,tipe FROM jawabother WHERE kodesoal='$ar[kodesoal]' AND nis='$username'");
		$dataJawaban = [];
		$dataJawabOther = [];

		while ($jawab = mysqli_fetch_array($queryjawaban)) {
			$dataJawaban[$jawab['nomersoal']] = $jawab;
			$dataJawabOther[] = $jawab['id'];
		}

		$_SESSION["unix"] = $dataJawabOther;
		
		if ($query == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
			$i = 1;
		}

		while ($ar = mysqli_fetch_array($query)) {
			// $ar berisi soal yang akan ditampilkan
			//var_dump($ar["soal"], $dataJawaban[$ar['nomersoal']]['jawaban']);

			$ks = $ar["kodesoal"];
			$km = $ar["kodemapel"];
			$ip = $ar["kunci"];


			// Pilihan addons media soal

				if (!$ar['audio'] == '') {
					$audio = "<audio src='../gbr/$ar[audio]' controls controlsList='nodownload'></audio>";
				} else {
					$audio = "";
				}

				if (!$ar['gambarsoal'] == '') {
					$gambarsoal = "<img src='../gbr/$ar[gambarsoal]' alt='Nature' class='responsive' align=center style='max-width:450px;height:auto' ><br>";
				} else {
					$gambarsoal = "";
				}

				if (!$ar['gambar_a'] == '') {
					$gambar_a = "<img src='../gbr/$ar[gambar_a]' class='responsive' align=center style='max-width:200px;height:auto' >";
				} else {
					$gambar_a = "";
				}
				if (!$ar['pilihan1'] == '') {
					$pilihan_a = "$ar[pilihan1]";
				} else {
					$pilihan_a = "";
				}
				if (!$ar['gambar_b'] == '') {
					$gambar_b = "<img src='../gbr/$ar[gambar_b]' class='responsive' align=center style='max-width:200px;height:auto' >";
				} else {
					$gambar_b = "";
				}
				if (!$ar['pilihan2'] == '') {
					$pilihan_b = "$ar[pilihan2]";
				} else {
					$pilihan_b = "";
				}
				if (!$ar['gambar_c'] == '') {
					$gambar_c = "<img src='../gbr/$ar[gambar_c]' class='responsive'  align=center style='max-width:200px;height:auto' >";
				} else {
					$gambar_c = "";
				}
				if (!$ar['pilihan3'] == '') {
					$pilihan_c = "$ar[pilihan3]";
				} else {
					$pilihan_c = "";
				}
				if (!$ar['gambar_d'] == '') {
					$gambar_d = "<img src='../gbr/$ar[gambar_d]' class='responsive' align=center style='max-width:200px;height:auto' >";
				} else {
					$gambar_d = "";
				}
				if (!$ar['pilihan4'] == '') {
					$pilihan_d = "$ar[pilihan4]";
				} else {
					$pilihan_d = "";
				}
				if (!$ar['gambar_e'] == '') {
					$gambar_e = "<img src='../gbr/$ar[gambar_e]' class='responsive' align=center style='max-width:200px;height:auto' >";
				} else {
					$gambar_e = "";
				}
				if (!$ar['pilihan5'] == '') {
					$pilihan_e = "$ar[pilihan5]";
				} else {
					$pilihan_e = "";
				}

			// End media soal

			$i++;

			// Rows berisi jumlah soal yang ada ditabel soal
			// Jika jumlahnya sama akan menampilkan Finis ujian
			if ($i == $rows) {
				$sampun = "<button id='done' type='button' class='btn btn-success' data-target='#ModalImport' data-toggle='modal'>
					                <span class='hidden-lg hidden-md'><i class='fa fa-check'></i> FINISH</span>
                                    <span class='hidden-xs hidden-sm'><i class='fa fa-check'></i> MENYELESAIKAN UJIAN</span>
					               </button>";
			} else {
				$sampun = "";
			}

			

			if ($ar['status'] == 1) {
				$kategori_soal = 'Soal Pilihan Ganda  ';
				$statussoal = "show";
				$simpanjawab = "jawabansiswa";
				$statussoalbs = "hidden";
				$statussoaljd = "hidden";
				$statussoalpgk = "hidden";
				$statussoalurai = "hidden";

				$area = "<script>
						function nilaiPilihanGanda$ar[nomersoal](tokenjd)
						{
						var dataStringx = 'nomersoal=$ar[nomersoal]&unik=$ks-$ar[nomersoal]-$nis&kodemapel=$ks&tipe=$ar[status]&tokenjd=' + tokenjd; 
						$.ajax({type:'post',url:'jawabother.php',data:dataStringx,cache:false,
							success: function(html) {
							}});
						return true;
						}
					</script> ";

			}

			if ($ar['status'] == 2) {
				$kategori_soal = 'Soal Uraian';
				$statussoal = "hidden";
				$statussoalbs = "hidden";
				$statussoaljd = "hidden";
				$statussoalpgk = "hidden";
				$statussoalurai = "show";
				$simpanjawab = "jawabanuraian";
				$jawaban = $dataUraian[$ar['nomersoal']]['jawaban'];
				$area = "
				<form>
				<div class='mb-3'>	
					<label>Upload file</label>
					<input class='form-control' type='file' id='fileInput$i' name='file' />
					<label><small>*Unggah file jika diperlukan, tipe file yang diterima : pdf, jpg, jpeg, png, file doc, file excel </small></label>
				</div>
				<textarea class='form-control' rows='5' id='token$i' name='token$ar[nomersoal]' type='text'>$jawaban</textarea>
				<p id='result$i' style='font-size:11px;font-style: italic;font-style: bold;background-image: linear-gradient(to right, green , white);color:white'></p>
				<script>
					function nilaiUH$ar[nomersoal]()
					{
						var token= document.getElementById('token$i').value;
						var dataString = 'nomersoal=$ar[nomersoal]&unik=$ks-$ar[nomersoal]-$nis&kodemapel=$ks&token=' + token; 
						const formData = new FormData();

					
						formData.append('nomersoal', '$ar[nomersoal]');
						formData.append('unik', '$ks' + '-' + '$ar[nomersoal]' + '-' + '$nis');
						formData.append('kodemapel', '$ks');
						formData.append('token', token);

						if (fileInput$i.files.length > 0) {
							formData.append('file', fileInput$i.files[0]); // Menambahkan file ke FormData
						}

						

						$.ajax({
							type:'post',
							url:'jawaburaian.php',
							data: formData,
							processData: false, // Jangan memproses data secara otomatis
							contentType: false, // Jangan menetapkan jenis konten (biarkan browser yang menentukan)
							success: function(html) {
								$('#result$i').html(html);
								$('#result$i').html('&#10004; jawaban tersimpan');
							},
							error: function(xhr, status, error) {
								alert('Error menyimpan jawaban');
							}
						});

						return false;
					}
				</script> 
				";
			}

			if ($ar['status'] == 3) {
				$kategori_soal = 'Soal Benar atau Salah  ';
				$simpanjawab = "jawabansiswa";
				$statussoalbs = "show";
				$statussoal = 'hidden';
				$statussoaljd = "hidden";
				$statussoalpgk = "hidden";
				$statussoalurai = "hidden";

				$area = "<script>
						function nilaiUHTF$ar[nomersoal](tokenjd)
						{
						var dataStringx = 'nomersoal=$ar[nomersoal]&unik=$ks-$ar[nomersoal]-$nis&kodemapel=$ks&tipe=$ar[status]&tokenjd=' + tokenjd; 
						$.ajax({type:'post',url:'jawabother.php',data:dataStringx,cache:false,
							success: function(html) {
							}});
						return false;
						}
					</script> ";

			}

			if ($ar['status'] == 4) {
				$kategori_soal = 'Soal Pilihan Ganda Komplek ';
				$statussoalpgk = "show";
				$simpanjawab = "jawabansiswa";
				$statussoal = "hidden";
				$statussoalbs = "hidden";
				$statussoaljd = "hidden";
				$statussoalurai = "hidden";

				$area = "<script>
						function nilaiUHPGK$ar[nomersoal]()
						{
						var arr = $('input[type=checkbox][name=$simpanjawab$ar[nomersoal]]:checked ').map(function () {
								return this.value;
						 }).get();

						 console.log(arr);

						var dataStringx = 'nomersoal=$ar[nomersoal]&unik=$ks-$ar[nomersoal]-$nis&kodemapel=$ks&tipe=$ar[status]&tokenjd=' + arr; 
						$.ajax({type:'post',url:'jawabother.php',data:dataStringx,cache:false,
							success: function(html) {
							}});
						return false;
						}
					</script> ";

			}

			$botton_choice = '';
			if ($ar['status'] == 5) {
				$kategori_soal = 'Soal Menjodohkan';
				$statussoaljd = "show";
				$simpanjawab = "tokenjd";
				$statussoal = "show";
				$statussoalbs = "hidden";
				$statussoalpgk = "hidden";
				$statussoalurai = "hidden";

				if (count($array_kuncian) > 0) {
					foreach ($array_kuncian as $index) {
						$botton_choice .= '<label class="custom-radio-button"><div class="col-xs-12" id="opsi"' . $statussoaljd . '">
							<input type="radio" name="' . $simpanjawab . $ar['nomersoal'] . '" value="' . $index . '" onclick="nilaiUHJD' . $ar["nomersoal"] . '(`' . $index . '`);" id="tokenjd' . $i . '"/>
							<span class="helping-el"></span> <p id="cho"> ' . $index . ' </p>
							</div></label>';
					}

					$area = "<script>
						function nilaiUHJD$ar[nomersoal](tokenjd)
						{
						var dataStringx = 'nomersoal=$ar[nomersoal]&unik=$ks-$ar[nomersoal]-$nis&kodemapel=$ks&tipe=$ar[status]&tokenjd=' + tokenjd; 
						$.ajax({type:'post',url:'jawabother.php',data:dataStringx,cache:false,
							success: function(html) {
							}});
						return false;
						}
					</script> ";
				}
			}

			?>

			<div class="soalnye cls<?php echo $i; ?>" data-id="<?php echo $i; ?>">

				<button id="keto" type="button" class="no btn-primary"><b>NOMER SOAL</b></button>
				<!-------no soal------>
				<button id="nomer" type="button" class="soal btn-default"><b>
						<?php echo "$i"; ?>
					</b></button></br></br>
				<span class="resizable-content">
					<p><b>
							<?php echo "$ar[soal]"; ?>
						</b> (
						<?php echo $kategori_soal; ?> )
					</p>
					
					<!-------gambar soal------>
					<a class='open_modal' style='font-decoration:none;color:#222;' id='<?php echo "$ar[id]"; ?>'>
						<?php echo "$gambarsoal"; ?>
					</a>
					<?php echo "$audio"; ?>

					<!-------pilihan------>

					<input type="hidden" name="jumlah<?php echo "$ar[nomersoal]"; ?>" id="jumlah<?php echo "$ar[nomersoal]"; ?>"
						value="<?php echo $rows; ?>">
					<input type="hidden" name="km<?php echo "$ar[nomersoal]"; ?>" id="km<?php echo "$ar[nomersoal]"; ?>"
						value="<?php echo $km; ?>">
					<input type="hidden" name="ks<?php echo "$ar[nomersoal]"; ?>" id="ks<?php echo "$ar[nomersoal]"; ?>"
						value="<?php echo $ks; ?>">

					<?php echo "$area"; ?>

					<!-- PG Kompleks -->

						<label class="custom-checkbox-button">
							<div class="col-xs-12" id="opsi<?php echo $statussoalpgk; ?>">
								<input type="checkbox" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
									onclick='nilaiUHPGK<?php echo $ar["nomersoal"]; ?>();' id='jawabansiswaAPK<?php echo "$i"; ?>'
									value="A" <?php echo (strpos($dataJawaban[$ar['nomersoal']]['jawaban'], 'A')) !== false ? 'checked="checked"' : '' ?> />
								<span class="helping-el"></span>
								<span class="label-text">a</span>
								<p id="cho">
									<?php echo "$pilihan_a"; ?>
									<?php echo "$gambar_a"; ?>
								</p>
							</div>
						</label>
						<br>
						<label class="custom-checkbox-button">
							<div class="col-xs-12" id="opsi<?php echo $statussoalpgk; ?>">
								<input type="checkbox" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
									onclick='nilaiUHPGK<?php echo $ar["nomersoal"]; ?>();' id='jawabansiswaBPK<?php echo "$i"; ?>'
									value="B" <?php echo (strpos($dataJawaban[$ar['nomersoal']]['jawaban'], 'B')) !== false ? 'checked="checked"' : '' ?> />
								<span class="helping-el"></span>
								<span class="label-text">b </span>
								<p id="cho">
									<?php echo "$pilihan_b"; ?>
									<?php echo "$gambar_b"; ?>
								</p>
							</div>
						</label>
						<br>
						<label class="custom-checkbox-button">
							<div class="col-xs-12" id="opsi<?php echo $statussoalpgk; ?>">
								<input type="checkbox" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
									onclick='nilaiUHPGK<?php echo $ar["nomersoal"]; ?>();' id='jawabansiswaCPK<?php echo "$i"; ?>'
									value="C" <?php echo (strpos($dataJawaban[$ar['nomersoal']]['jawaban'], 'C')) !== false ? 'checked="checked"' : '' ?> />
								<span class="helping-el"></span>
								<span class="label-text">c </span>
								<p id="cho">
									<?php echo "$pilihan_c"; ?>
									<?php echo "$gambar_c"; ?>
								</p>
							</div>
						</label>
						<br>
						<label class="custom-checkbox-button">
							<div class="col-xs-12" id="opsi<?php echo $statussoalpgk; ?>">
								<input type="checkbox" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
									onclick='nilaiUHPGK<?php echo $ar["nomersoal"]; ?>();' id='jawabansiswaDPK<?php echo "$i"; ?>'
									value="D" <?php echo (strpos($dataJawaban[$ar['nomersoal']]['jawaban'], 'D')) !== false ? 'checked="checked"' : '' ?> />
								<span class="helping-el"></span>
								<span class="label-text">d</span>
								<p id="cho">
									<?php echo "$pilihan_d"; ?>
									<?php echo "$gambar_d"; ?>
								</p>
							</div>
						</label>
						<br>
						<label id="opsi<?php echo $rr['opsi']; ?>" class="custom-checkbox-button">
							<div class="col-xs-12" id="opsi<?php echo $statussoalpgk; ?>">
								<input type="checkbox" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
									onclick='nilaiUHPGK<?php echo $ar["nomersoal"]; ?>();' id='jawabansiswaEPK<?php echo "$i"; ?>'
									value="E" <?php echo (strpos($dataJawaban[$ar['nomersoal']]['jawaban'], 'E')) !== false ? 'checked="checked"' : '' ?> />
								<span class="helping-el"></span>
								<span class="label-text">e</span>
								<p id="cho">
									<?php echo "$pilihan_e"; ?>
									<?php echo "$gambar_e"; ?>
								</p>
							</div>
						</label>

					<!-- End PG Kompleks -->

					<br>

					<!-- Jodohkan Soal -->

						<?php if ($ar['status'] == 5) { ?>

							<?php echo $botton_choice; ?>

						<?php } ?>
						<br>

					<!-- End Jodohkan Soal -->

					<!-- BenarSalah -->
						<label class="custom-radio-button">
							<div class="col-xs-12" id="opsi<?php echo $statussoalbs; ?>">
								<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
									onclick="nilaiUHTF<?php echo $ar['nomersoal']; ?>(`T`);" id='jawabansiswaT<?php echo "$i"; ?>'
									value="T" <?php echo ($dataJawaban[$ar['nomersoal']]['jawaban'] == 'T') ? 'checked="checked"' : '' ?> />
								<span class="helping-el"></span>
								<span class="label-text"></span>
								<p id="cho">Benar</p>
							</div>
						</label>
						<br>
						<label class="custom-radio-button">
							<div class="col-xs-12" id="opsi<?php echo $statussoalbs; ?>">
								<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
									onclick="nilaiUHTF<?php echo $ar['nomersoal']; ?>(`F`);" id='jawabansiswaF<?php echo "$i"; ?>'
									value="F" <?php echo ($dataJawaban[$ar['nomersoal']]['jawaban'] == 'F') ? 'checked="checked"' : '' ?> />
								<span class="helping-el"></span>
								<span class="label-text"></span>
								<p id="cho">Salah</p>
							</div>
						</label>
					<!-- End BenarSalah -->

					<br>

					<!-- PG -->
						<?php
						if ($ar['status'] == 1) { ?>
							<label class="custom-radio-button">
								<div class="col-xs-12" id="opsi<?php echo $statussoal; ?>">
									<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
										onclick="nilaiPilihanGanda<?php echo $ar['nomersoal']; ?>(`A`);"
										id='jawabansiswaA<?php echo "$i"; ?>' value="A" <?php echo ($dataJawaban[$ar['nomersoal']]['jawaban'] == 'A') ? 'checked="checked"' : '' ?> />
									<span class="helping-el"></span>
									<span class="label-text">a</span>
									<p id="cho">
										<?php echo "$pilihan_a"; ?>
										<?php echo "$gambar_a"; ?>
									</p>
								</div>
							</label>
							<br>
							<label class="custom-radio-button">
								<div class="col-xs-12" id="opsi<?php echo $statussoal; ?>">
									<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
										onclick="nilaiPilihanGanda<?php echo $ar['nomersoal']; ?>(`B`);"
										id='jawabansiswaB<?php echo "$i"; ?>' value="B" <?php echo ($dataJawaban[$ar['nomersoal']]['jawaban'] == 'B') ? 'checked="checked"' : '' ?> />
									<span class="helping-el"></span>
									<span class="label-text">b</span>
									<p id="cho">
										<?php echo "$pilihan_b"; ?>
										<?php echo "$gambar_b"; ?>
									</p>
								</div>
							</label>
							<br>
							<label class="custom-radio-button">
								<div class="col-xs-12" id="opsi<?php echo $statussoal; ?>">
									<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
										onclick="nilaiPilihanGanda<?php echo $ar['nomersoal']; ?>(`C`);"
										id='jawabansiswaC<?php echo "$i"; ?>' value="C" <?php echo ($dataJawaban[$ar['nomersoal']]['jawaban'] == 'C') ? 'checked="checked"' : '' ?> />
									<span class="helping-el"></span>
									<span class="label-text">c</span>
									<p id="cho">
										<?php echo "$pilihan_c"; ?>
										<?php echo "$gambar_c"; ?>
									</p>
								</div>
							</label>
							<br>
							<label class="custom-radio-button">
								<div class="col-xs-12" id="opsi<?php echo $statussoal; ?>">
									<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
										onclick="nilaiPilihanGanda<?php echo $ar['nomersoal']; ?>(`D`);"
										id='jawabansiswaD<?php echo "$i"; ?>' value="D" <?php echo ($dataJawaban[$ar['nomersoal']]['jawaban'] == 'D') ? 'checked="checked"' : '' ?> />
									<span class="helping-el"></span>
									<span class="label-text">d</span>
									<p id="cho">
										<?php echo "$pilihan_d"; ?>
										<?php echo "$gambar_d"; ?>
									</p>
								</div>
							</label>
							<br>
							<label id="opsi<?php echo $rr['opsi']; ?>" class="custom-radio-button">
								<div class="col-xs-12" id="opsi<?php echo $statussoal; ?>">
									<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
										onclick="nilaiPilihanGanda<?php echo $ar['nomersoal']; ?>(`E`);"
										id='jawabansiswaE<?php echo "$i"; ?>' value="E" <?php echo ($dataJawaban[$ar['nomersoal']]['jawaban'] == 'E') ? 'checked="checked"' : '' ?> />
									<span class="helping-el"></span>
									<span class="label-text">e</span>
									<p id="cho">
										<?php echo "$pilihan_e"; ?>
										<?php echo "$gambar_e"; ?>
									</p>
								</div>
							</label>

						<?php } ?>

					<!-- End PG -->

					<br><br>
					<label id="ragu" class="btn btn-warning mb-1"><input type="checkbox" id="test<?php echo $i; ?>" value="supress">
						<span class='d-block d-sm-none'><b>RAGU</b></span>
						<span class='d-none d-sm-block'><b>RAGU - RAGU</b></span>
					</label>
				</span>

				<div id="garistom" class="list-group-item top-heading">
					<div class="tombol">
						<a data-id="<?= $i; ?>" class="prev">
							<?php if ($ar['status'] == 2) { ?>
								<div id="prev" class='btn btn-primary xxxx' onclick="nilaiUH<?= $ar['nomersoal'] ?>(); showPage(<?= $i ?>)">
							<?php }else { ?>
								<div id="prev" class='btn btn-primary xxxx'>
							<?php } ?>

							<span class="d-block d-sm-none"><i class="fa fa-chevron-left"></i> PREV</span>
							<span class="d-none d-sm-block"><i class="fa fa-chevron-left"></i> SOAL SEBELUMNYA</span>
							</div></a>
						<a id="done"> 
							<div id="done" class='btn btn-success xxxx' data-bs-target='#ModalImport' data-bs-toggle='modal'
							style="border-radius:0;"> <span class='d-block d-sm-none'><i class='fa fa-check'></i> FINISH</span>
							<span class='d-none d-sm-block'><i class='fa fa-check'></i> MENYELESAIKAN UJIAN</span> 
							</div>
						</a>
						<a data-id="<?= $i; ?>" class="next">
							<?php if ($ar['status'] == 2) { ?>
								<div id="next" class='btn btn-primary xxxx' onclick="nilaiUH<?= $ar['nomersoal'] ?>(); showPage(<?= $i ?>)">
							<?php }else { ?>
								<div id="next" class='btn btn-primary xxxx'>
							<?php } ?>

								<span class="d-block d-sm-none">NEXT <i class="fa fa-chevron-right"></i></span>
								<span class="d-none d-sm-block">SOAL BERIKUTNYA <i class="fa fa-chevron-right"></i></span>
							</div>
						</a>
					</div>
				</div>

			</div>

			

			
			<?php
		}

		?>

		<?php
		
		// Soal menjodohkan
		$i++;
		$end_page = $i;
			$query = mysqli_query($konek, "SELECT * FROM soal CROSS JOIN jawaban USING (kodesoal) WHERE nis='$username' AND soal.status = 5 ORDER by status ASC, $acak");
			if ($query == false) {
				die("Terjadi Kesalahan : " . mysqli_error($konek));
				$i = 1;
			}
			?>

		<div class="soalnye cls<?php echo $i; ?>" data-id="<?php echo $i; ?>">

			<button id="keto" type="button" class="no btn-primary"><b>Soal Menjodohkan</b></button>

			</br></br>
			<span class="resizable-content">

				<div class="container row d-flex" style="display: flex;">

					<div class="col-6">

						<?php

							while ($ar = mysqli_fetch_array($query)) {
								// $ar berisi soal yang akan ditampilkan
								$ks = $ar["kodesoal"];
								$km = $ar["kodemapel"];
								$ip = $ar["kunci"];

								// Pilihan addons media soal

									if (!$ar['audio'] == '') {
										$audio = "<audio src='../gbr/$ar[audio]' controls controlsList='nodownload'></audio>";
									} else {
										$audio = "";
									}

									if (!$ar['gambarsoal'] == '') {
										$gambarsoal = "<img src='../gbr/$ar[gambarsoal]' alt='Nature' class='responsive' align=center style='max-width:450px;height:auto' ><br>";
									} else {
										$gambarsoal = "";
									}

									if (!$ar['gambar_a'] == '') {
										$gambar_a = "<img src='../gbr/$ar[gambar_a]' class='responsive' align=center style='max-width:200px;height:auto' >";
									} else {
										$gambar_a = "";
									}
									if (!$ar['pilihan1'] == '') {
										$pilihan_a = "$ar[pilihan1]";
									} else {
										$pilihan_a = "";
									}
									if (!$ar['gambar_b'] == '') {
										$gambar_b = "<img src='../gbr/$ar[gambar_b]' class='responsive' align=center style='max-width:200px;height:auto' >";
									} else {
										$gambar_b = "";
									}
									if (!$ar['pilihan2'] == '') {
										$pilihan_b = "$ar[pilihan2]";
									} else {
										$pilihan_b = "";
									}
									if (!$ar['gambar_c'] == '') {
										$gambar_c = "<img src='../gbr/$ar[gambar_c]' class='responsive'  align=center style='max-width:200px;height:auto' >";
									} else {
										$gambar_c = "";
									}
									if (!$ar['pilihan3'] == '') {
										$pilihan_c = "$ar[pilihan3]";
									} else {
										$pilihan_c = "";
									}
									if (!$ar['gambar_d'] == '') {
										$gambar_d = "<img src='../gbr/$ar[gambar_d]' class='responsive' align=center style='max-width:200px;height:auto' >";
									} else {
										$gambar_d = "";
									}
									if (!$ar['pilihan4'] == '') {
										$pilihan_d = "$ar[pilihan4]";
									} else {
										$pilihan_d = "";
									}
									if (!$ar['gambar_e'] == '') {
										$gambar_e = "<img src='../gbr/$ar[gambar_e]' class='responsive' align=center style='max-width:200px;height:auto' >";
									} else {
										$gambar_e = "";
									}
									if (!$ar['pilihan5'] == '') {
										$pilihan_e = "$ar[pilihan5]";
									} else {
										$pilihan_e = "";
									}

								// End media soal

								$i++;

								// Rows berisi jumlah soal yang ada ditabel soal
								// Jika jumlahnya sama akan menampilkan Finis ujian
								if ($i == $rows) {
									$sampun = "<button id='done' type='button' class='btn btn-success' data-target='#ModalImport' data-toggle='modal'>
													<span class='hidden-lg hidden-md'><i class='fa fa-check'></i> FINISH</span>
													<span class='hidden-xs hidden-sm'><i class='fa fa-check'></i> MENYELESAIKAN UJIAN</span>
												</button>";
								} else {
									$sampun = "";
								}

								$botton_choice = '';
								$alphachar = range('A', 'Z'); 
								$peryataan2 = '<ol type="A">';
								$dropdown = '<select onchange="nilaiUHJD' . $ar["nomersoal"] . '(this.value);" class="form-select" aria-label="Default select example">
								<option selected>Pilih</option>';
								

								if ($ar['status'] == 5) {
									$kategori_soal = 'Soal Menjodohkan';
									$statussoaljd = "show";
									$simpanjawab = "tokenjd";
									$statussoal = "show";
									$statussoalbs = "hidden";
									$statussoalpgk = "hidden";
									$statussoalurai = "hidden";

									if (count($array_kuncian) > 0) {
										foreach ($array_kuncian as $key => $index) {
											$botton_choice .= '<label class="custom-radio-button"><div class="col-xs-12" id="opsi"' . $statussoaljd . '">
												<input type="radio" name="' . $simpanjawab . $ar['nomersoal'] . '" value="' . $index . '" onclick="nilaiUHJD' . $ar["nomersoal"] . '(`' . $index . '`);" id="tokenjd' . $i . '"/>
												<span class="helping-el"></span> <p id="cho"> ' . $index . ' </p>
												</div></label>';

											$dropdown .= '
											<option value="' . $index . '" id="tokenjd' . $i . '">
											'.$alphachar[$key].'
											</option>
											';
											
											$peryataan2 .= '<li class="mb-4">' . $index . '</li>';
											
										}

										$peryataan2 .= '</ol>';
										$dropdown .= '</select>';

										$area = "<script>
											function nilaiUHJD$ar[nomersoal](tokenjd)
											{
												
											var dataStringx = 'nomersoal=$ar[nomersoal]&unik=$ks-$ar[nomersoal]-$nis&kodemapel=$ks&tipe=$ar[status]&tokenjd=' + tokenjd; 
											$.ajax({type:'post',url:'jawabother.php',data:dataStringx,cache:false,
												success: function(html) {
												}});
											return false;
											}
										</script> ";
									}
								}
								?>

								<div class="row mb-1">
									<div class="col-8">
										<!-------gambar soal------>
										<a class='open_modal' style='font-decoration:none;color:#222;' id='<?php echo "$ar[id]"; ?>'>
											<?php echo "$gambarsoal"; ?>
										</a>
										<?php echo "$audio"; ?>
										

									
										<p>
											<b>
												<?php echo "$i . $ar[soal]"; ?>
											</b>
										</p>


										<!-------pilihan------>

										<input type="hidden" name="jumlah<?php echo "$ar[nomersoal]"; ?>" id="jumlah<?php echo "$ar[nomersoal]"; ?>"
											value="<?php echo $rows; ?>">
										<input type="hidden" name="km<?php echo "$ar[nomersoal]"; ?>" id="km<?php echo "$ar[nomersoal]"; ?>"
											value="<?php echo $km; ?>">
										<input type="hidden" name="ks<?php echo "$ar[nomersoal]"; ?>" id="ks<?php echo "$ar[nomersoal]"; ?>"
											value="<?php echo $ks; ?>">

										<?php echo "$area"; ?>

									</div>

									<div class="col-3">
										<!-- <?= $botton_choice ?> -->
										<?= $dropdown ?>
									</div>
								</div>
											
								<?php
							}
						?>

					</div>

					<div class="col-6">
						<!-- Jodohkan Soal -->
						<!-- <?php echo $botton_choice; ?> -->

						<?= $peryataan2 ?>
						
					</div>

				</div>

			<br><br>

			<label id="ragu" class="btn btn-warning mb-1"><input type="checkbox" id="test<?php echo $i; ?>" value="supress">
			<span class='d-block d-sm-none'><b>RAGU</b></span>
			<span class='d-none d-sm-block'><b>RAGU - RAGU</b></span>
			</label>
			</span>

			<div id="garistom" class="list-group-item top-heading">
				<div class="tombol">
					<a data-id="<?= $end_page; ?>" class="prev">
						<div id="prev" class='btn btn-primary xxxx'>
						<span class="d-block d-sm-none"><i class="fa fa-chevron-left"></i> PREV</span>
						<span class="d-none d-sm-block"><i class="fa fa-chevron-left"></i> SOAL SEBELUMNYA</span>
						</div></a>
					<a id="done"> 
						<div id="done" class='btn btn-success xxxx' data-bs-target='#ModalImport' data-bs-toggle='modal'
						style="border-radius:0;"> <span class='d-block d-sm-none'><i class='fa fa-check'></i> FINISH</span>
						<span class='d-none d-sm-block'><i class='fa fa-check'></i> MENYELESAIKAN UJIAN</span> 
						</div>
					</a>
				</div>
			</div>

		</div>


			<?php
		// End soal menjodohkan

	}
} ?>