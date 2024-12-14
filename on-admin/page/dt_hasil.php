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

$kunciSoal = null;
$jumlahsoal = 0;
$bobot = 0;

if($cari != '' || $cari != null){
	$queryKunciJawaban = mysqli_query ($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND `status` IN('1','3','4','5') ORDER BY `nomersoal` ASC");
	$queryujian = mysqli_query ($konek, "SELECT * FROM ujian where kodesoal='$cari'");

	if($queryKunciJawaban == false || $queryujian == false){
		die ("Terjadi Kesalahan : ". mysqli_error($konek));
	}

	$jumlahsoal = mysqli_num_rows($queryKunciJawaban);

	while ($ujian = mysqli_fetch_array ($queryujian)){
		$bobot = $ujian['nilai'];
	}


	$kunciSoal = [];
	while ($kunci = mysqli_fetch_array ($queryKunciJawaban)){
		$kunciSoal[$kunci['nomersoal']] = str_replace("\n","",$kunci['kunci']);
	}

}



?>
<div class="col-xs-12">
	<button id="reset" class="btn btn-default btn-flat" type="button" data-toggle="collapse"
		data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		<i class="fa fa-bar-chart" aria-hidden="true"></i> Statistik nilai
		<?php echo $cari; ?>
	</button>
	<a href="analisa-soal-all.php?kodesoal=<?php echo $cari; ?>" class="btn btn-info">
		<i class="fas fa-vote-yea"></i>
		Lihat Hasil Semua Siswa
	</a>
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
					<th id="garis" width="3%">Total Soal</th>
					<th id="garis" width="3%">Soal Uraian</th>
					<th id="garis" width="3%">Benar</th>
					<th id="garis" width="3%">Benar rechecking</th>
					<th id="garis" width="3%">Salah</th>
					<th id="garis" width="5%">Nilai PG</th>
					<th id="garis" width="5%">Nilai Rechecking</th>
					<!-- <th id="garis" width="5%">Nilai urai</th> -->
					<th id="garis" width="5%">Total Nilai</th>
					<th id="garis" width="5%">Jawaban siswa</th>
					<th id="garis" width="5%">Kunci Jawaban</th>
					<th id="garis" width="12%">Waktu</th>
					<th id="garis" width="25%">Action</th>
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
			
						//calculation uraian
						$result_uraian = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status = '2' ORDER BY `soal`.`nomersoal` ASC ");
						$rows_uraian = mysqli_num_rows($result_uraian);

						if ($rows_uraian > 0) {
							
							if ($r['statuskoreksi'] > 1) {
								$koreksi = "<a class='open_modal2' style='font-decoration:none;color:#222;' nama='$r[nama]' nis='$r[nis]' kelas='$r[kelas]' kodesoal='$r[kodesoal]'><button id='ti' type='button' class='btn btn-danger btn-xs'><i class='fa fa-refresh'></i> edit koreksi</button></a>";
							} else {
								$koreksi = "<a class='open_modal2' style='font-decoration:none;color:#222;' nama='$r[nama]' nis='$r[nis]' kelas='$r[kelas]'  kodesoal='$r[kodesoal]'><button id='ti' type='button' class='btn btn-success btn-xs'><i class='fa fa-pencil-square-o'></i> koreksi</button></a>";
							}

						
						}

						$jawabanSiswa = [];
			
						// Koreksi Baru
						$hilang = str_replace("\n","",$r['jawabansiswa']);
						$dataJawabanSiswa = json_decode($hilang, true);
						foreach ($dataJawabanSiswa as $item) {
							foreach ($item as $key => $value) {
								$jawabanSiswa[$key] =  $value;
							}
						}

						if($kunciSoal != null) {
							$benar = 0;
							$salah = 0;
							$soalBenar = '';
							foreach ($jawabanSiswa as $key => $jawaban){
								$jawaban = str_replace(' ','', $jawaban);
								$kunci = str_replace(' ','', $kunciSoal[$key]);
								if($jawaban == $kunci){
									$benar++;
									$soalBenar .= $key . ',';
								}
							}

							$score = number_format($benar / $jumlahsoal * (int) $bobot,1);
						}
	

						$total_score = $r['nilai'] + $r['nilaiurai'];
						$status = number_format($r['nilai'],1) == $score ? '' : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';

						if (!empty($r['nis'])) {
							echo "
								<tr style='font-size:13px;'>
								<td id='garis' align=center>$i</td>
								<td id='garis'>$r[nama]</td>
								<td id='garis'>$r[kelas]</td>
								<td id='garis'>$r[kodemapel] | $r[kodesoal]</td>
								<td id='garis' align=center>$r[jumlahsoal]</td>
								<td id='garis' align=center>$rows_uraian</td>
								<td id='garis' align=center>$r[benar]</td>
								<td id='garis' align=center>$benar - $soalBenar</td>
								<td id='garis' align=center>$r[salah]</td>
								<td id='garis' align=center style='background-color:grey;color:white'><b>$status " .number_format($r['nilai'],1) ."</b></td>
								<td id='garis' align=center style='background-color:grey;color:white'><b>$score</b></td>
								<td id='garis' align=center style='background-color:#2764aa;color:white'><b>$total_score</b></td>
								<td id='garis'><h6>" . str_replace(',', '', $list_jawaban) . "</h6></td>
								<td id='garis'><h6>" . str_replace(',', '', $list_kunci) . "</h6></td>
								<td id='garis'><h6>$r[waktuselesai]</h6></td>
								<td id='garis' align=center>
								<a class='noprint' href='analisa-soal.php?nis=$r[nis]&kodesoal=$r[kodesoal]'><button id='ti' type='button' class='btn btn-success btn-xs'><i class='fa fa-eye'></i> Lihat Hasil</button></a>
								<a class='noprint' onClick='koreksi_ulang(`$r[nis]`,`$r[kodesoal]`)'><button id='ti' type='button' class='btn btn-warning btn-xs'><i class='fa fa-refresh'></i> Koreksi Ulang</button></a>
								$koreksi
								<a style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/hasil_delete.php?id=$r[id]&kodesoal=$r[kodesoal]&nama=$r[nama]\")'><button id='ti' type='button' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button></a> 
								</td>
								</tr>";
						}
						$i++;
					
				}
				?>
			</tbody>
		</table>

		<!-- <a class='noprint' href='koreksi_ulang.php?nis=$r[nis]&kodesoal=$r[kodesoal]'><button id='ti' type='button' class='btn btn-warning btn-xs'><i class='fa fa-refresh'></i> Koreksi Ulang</button></a> -->


	</div>
</div>