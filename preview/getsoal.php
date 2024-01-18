<?php
session_start();
include('../koneksi/koneksi.php');
include('../on-admin/conn/fungsi.php');
include('../on-admin/conn/cek.php');
$mapel = $_GET['matpel'];
$jenis = $_GET['jenis'];
$kode = $_GET['kode'];
?>
<?php
$qu = mysqli_query($konek, "SELECT * FROM ujian where kodesoal='$kode'");
if ($qu == false) {
	die("Terjadi Kesalahan : " . mysqli_error($konek));
}

$list_menjodohkan = mysqli_query($konek, "SELECT kunci FROM soal WHERE `status`='5' AND kodesoal='$kode'");
$rows_jodohkan = mysqli_num_rows($list_menjodohkan);


$array_kuncian = [];
if ($rows_jodohkan > 0) {
	while ($chek = mysqli_fetch_array($list_menjodohkan)) {
		array_push($array_kuncian, $chek['kunci']);
	}
}

while ($rr = mysqli_fetch_array($qu)) {
	if ($rr['acak'] > 1) {
		$acak = "nomersoal ASC";
	} else {
		$acak = "RAND ()";
	}

	$query = mysqli_query($konek, "SELECT * FROM soal WHERE kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode' AND soal.status != 5 ORDER by status ASC, $acak");
	if ($query == false) {
		die("Terjadi Kesalahan : " . mysqli_error($konek));
		$i = 1;
	}


	// Ujian

	while ($ar = mysqli_fetch_array($query)) {

		$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$kode'");
		$rows = mysqli_num_rows($result);
		$ks = $ar["kodesoal"];
		$km = $ar["kodemapel"];
		$ip = $ar["kunci"];
		$status = $ar["status"];

		// Pilihan addons media soal

			if (!$ar['audio'] == '') {
				$audio = "<audio src='../gbr/$ar[audio]' controls controlsList='nodownload'></audio>";
			} else {
				$audio = "";
			}

			if (!$ar['gambarsoal'] == '') {
				$gambarsoal = "<img src='../gbr/$ar[gambarsoal]' alt='Nature' class='responsive' align=center style='max-width:500px;height:auto' ><br>";
			} else {
				$gambarsoal = "";
			}
			// =====================================================================================================================================
			// Untuk PG

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
				$gambar_e = "<img src='../gbr/$ar[gambar_e]' class='responsive' align=centerstyle='max-width:300px;height:auto' >";
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

		// Button sampun
		if ($i == $rows) {
			$sampun = "<button id='done' type='button' class='btn btn-success' data-bs-target='#ModalImport' data-toggle='modal'>
					                <span class='hidden-lg hidden-md'><i class='fa fa-check'></i> FINISH</span>
                                    <span class='hidden-xs hidden-sm'><i class='fa fa-check'></i> MENYELESAIKAN UJIAN</span>
					               </button>";
		} else {
			$sampun = "";
		}

		//Condition Soal dan Jawaban
		$botton_choice = '';

		if ($ar['status'] == 5) {
			$kategori_soal = 'Soal Menjodohkan';
			$statussoaljd = "show";
			$simpanjawab = "jawabansiswa";
			$statussoal = "show";
			$statussoalbs = "hidden";
			$statussoalpgk = "hidden";
			$statussoalurai = "hidden";
			$area = "<div class='col-xs-12' id='opsi$statussoaljd'>
					<input  hidden type='checkbox' name='$simpanjawab$ar[nomersoal]' id='X$i' value='X' checked='checked' ></div>";
			if (count($array_kuncian) > 0) {
				foreach ($array_kuncian as $index) {

					$botton_choice .= '<label class="custom-radio-button"><div class="col-xs-12" id="opsi"' . $statussoaljd . '">
					<input type="radio" name="' . $simpanjawab . $ar['nomersoal'] . '" value="' . $index . '">
					<span class="helping-el"></span> <p id="cho"> ' . $index . ' </p>
					</div></label>';

				}
			}
		}

		if ($status == 4) {
			$kategori_soal = 'Soal Pilihan Ganda Komplek ';
			$statussoalpgk = "show";
			$simpanjawab = "jawabansiswa";
			$statussoal = "hidden";
			$statussoalbs = "hidden";
			$statussoaljd = "hidden";
			$statussoalurai = "hidden";
			$area = "<div class='col-xs-12' id='opsi$statussoalpgk'>
                                <input  hidden type='checkbox' name='$simpanjawab$ar[nomersoal]' id='X$i' value='X' checked='checked' ></div>";
		}

		if ($status == 3) {
			$kategori_soal = 'Soal Benar atau Salah  ';
			$simpanjawab = "jawabansiswa";
			$statussoalbs = "show";
			$statussoal = 'hidden';
			$statussoaljd = "hidden";
			$statussoalpgk = "hidden";
			$statussoalurai = "hidden";
			$area = "<div class='col-xs-12' id='opsi$statussoal'>
                                <input  hidden type='radio' name='$simpanjawab$ar[nomersoal]' id='X$i' value='X' checked='checked' ></div>";
		}

		if ($status == 2) {
			$kategori_soal = 'Soal Uraian';
			$statussoal = "hidden";
			$statussoalbs = "hidden";
			$statussoaljd = "hidden";
			$statussoalpgk = "hidden";
			$statussoalurai = "show";
			$simpanjawab = "jawabanuraian";
			$area = "
			<textarea class='form-control' rows='5' id='token$i' name='token$ar[nomersoal]' type='text' onchange='return nilaiUH$ar[nomersoal]()'></textarea>
						";
		}

		if ($status == 1) {
			$kategori_soal = 'Soal Pilihan Ganda  ';
			$statussoal = "show";
			$simpanjawab = "jawabansiswa";
			$statussoalbs = "hidden";
			$statussoaljd = "hidden";
			$statussoalpgk = "hidden";
			$statussoalurai = "hidden";
			$area = "<div class='col-xs-12' id='opsi$statussoal'>
                                <input  hidden type='radio' name='$simpanjawab$ar[nomersoal]' id='X$i' value='X' checked='checked' ></div>";
		}

		?>

		<div class="soalnye cls<?php echo $i; ?>">

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

				<?php
				if ($status == 4) { ?>

					<!-- PG Kompleks -->
					<label class="custom-checkbox-button">
						<div class="col-xs-12" id="opsi<?php echo $statussoalpgk; ?>">
							<input type="checkbox" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
								id='jawabansiswaA<?php echo "$i"; ?>' value="A" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'A') ? 'checked="checked"' : '' ?> />
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
								id='jawabansiswaB<?php echo "$i"; ?>' value="B" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'B') ? 'checked="checked"' : '' ?> />
							<span class="helping-el"></span>
							<span class="label-text">b</span>
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
								id='jawabansiswaC<?php echo "$i"; ?>' value="C" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'C') ? 'checked="checked"' : '' ?> />
							<span class="helping-el"></span>
							<span class="label-text">c</span>
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
								id='jawabansiswaD<?php echo "$i"; ?>' value="D" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'D') ? 'checked="checked"' : '' ?> />
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
								id='jawabansiswaE<?php echo "$i"; ?>' value="E" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'E') ? 'checked="checked"' : '' ?> />
							<span class="helping-el"></span>
							<span class="label-text">e</span>
							<p id="cho">
								<?php echo "$pilihan_e"; ?>
								<?php echo "$gambar_e"; ?>
							</p>
						</div>
					</label>

				<?php } ?>

				<!-- Jodohkan Soal -->

				<?php
				if ($status == 5) { ?>

					<?php echo $botton_choice; ?>

				<?php } ?>

				<!-- BenarSalah -->
				<label class="custom-radio-button">
					<div class="col-xs-12" id="opsi<?php echo $statussoalbs; ?>">
						<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
							id='jawabansiswaT<?php echo "$i"; ?>' value="T" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'T') ? 'checked="checked"' : '' ?> />
						<span class="helping-el"></span>
						<span class="label-text"></span>
						<p id="cho">Benar</p>
					</div>
				</label>
				<br>
				<label class="custom-radio-button">
					<div class="col-xs-12" id="opsi<?php echo $statussoalbs; ?>">
						<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
							id='jawabansiswaF<?php echo "$i"; ?>' value="F" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'F') ? 'checked="checked"' : '' ?> />
						<span class="helping-el"></span>
						<span class="label-text"></span>
						<p id="cho">Salah</p>
					</div>
				</label>
				<br>

				<?php
				if ($status == 1) { ?>

					<!-- Buat PG -->
					<label class="custom-radio-button">
						<div class="col-xs-12" id="opsi<?php echo $statussoal; ?>">
							<input type="radio" name='<?php echo "$simpanjawab"; ?><?php echo "$ar[nomersoal]"; ?>'
								id='jawabansiswaA<?php echo "$i"; ?>' value="A" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'A') ? 'checked="checked"' : '' ?> />
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
								id='jawabansiswaB<?php echo "$i"; ?>' value="B" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'B') ? 'checked="checked"' : '' ?> />
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
								id='jawabansiswaC<?php echo "$i"; ?>' value="C" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'C') ? 'checked="checked"' : '' ?> />
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
								id='jawabansiswaD<?php echo "$i"; ?>' value="D" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'D') ? 'checked="checked"' : '' ?> />
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
								id='jawabansiswaE<?php echo "$i"; ?>' value="E" <?php echo ($ar['jawabansiswa'][$ar['nomersoal'] - 1] == 'E') ? 'checked="checked"' : '' ?> />
							<span class="helping-el"></span>
							<span class="label-text">e</span>
							<p id="cho">
								<?php echo "$pilihan_e"; ?>
								<?php echo "$gambar_e"; ?>
							</p>
						</div>
					</label>

				<?php } ?>

				<!-- Footer Soal -->
				
				<!-- <div id="ragu" class="btn btn-warning"><input type="checkbox" id="test<?php echo $i; ?>" value="supress"> -->
				

				<div class=""></div>

				<div id="garistom" class="list-group-item top-heading mt-3 text-center">
				<div id="ragu" style="position: static !important; height: auto" class="btn btn-warning mb-1 rounded"><input type="checkbox" id="test<?php echo $i; ?>" value="supress">
					<div class='d-block d-sm-none'><b>RAGU</b></div>
					<div class='d-none d-sm-block'><b>RAGU - RAGU</b></div>
				</div>
					<div class="tombol">
						<a data-id="<?= $i; ?>" class="prev">
							<!-- Jika ada soal uraian -->
							<?php if ($ar['status'] == 2) { ?>
								<div id="prev" class='btn btn-primary xxxx' onclick="nilaiUH<?= $ar['nomersoal'] ?>(); showPage(<?= $i ?>)">
							<?php }else { ?>
								<div id="prev" class='btn btn-primary xxxx'>
							<?php } ?>

							<span class="d-block d-sm-none"><i class="fa fa-chevron-left"></i> PREV</span>
							<span class="d-none d-sm-block"><i class="fa fa-chevron-left"></i> SOAL SEBELUMNYA</span>
							</div></a>
						<a id="done" class="" style="position:static !important;"> 
							<div class='btn btn-success' data-bs-target='#ModalImport' data-bs-toggle='modal'
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


			</span>


			<?php echo "$sampun"; ?>
		</div>
		<?php 
	}
	?>

	<?php

	// Soal menjodohkan
	$i++;
	$end_page = $i;
		$query = mysqli_query($konek, "SELECT * FROM soal WHERE kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode' AND soal.status = 5 ORDER by status ASC, $acak");
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

										$area = "";
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
								<?= $dropdown ?>
							</div>
						</div>

					<?php
						}
					?>

					</div>
				

					<div class="col-6">
						<?= $peryataan2 ?>	
					</div>

					<div id="garistom" class="list-group-item top-heading mt-3">
						<div class="tombol">
							<a data-id="<?= $end_page; ?>" class="prev">
								<div id="prev" class='btn btn-primary xxxx'>
								<span class="d-block d-sm-none"><i class="fa fa-chevron-left"></i> PREV</span>
								<span class="d-none d-sm-block"><i class="fa fa-chevron-left"></i> SOAL SEBELUMNYA</span>
								</div>
							</a>
							
						</div>
					</div>


				</div>


		</span>
		
	</div>

	
	<?php 
	// End soal menjodohkan
	}

?>