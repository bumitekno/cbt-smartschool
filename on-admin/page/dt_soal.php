<thead>
	<tr>
		<th width="5%">No</th>
		<th width="20%">Mapel</th>
		<th width="5%">Jumlah Soal PG</th>
		<th width="5%">Jumlah Soal Uraian</th>
		<th width="10%">Jumlah Soal Benar Salah</th>
		<th width="5%">Jumlah Soal PG Kompleks</th>
		<th width="5%">Jumlah Soal Menjodohkan</th>
		<th width="5%">Waktu</th>
		<!-- <th width="5%">opsi jwb</th>
						<th width="5%">tampil soal</th> -->
		<th width="5%">Kelas</th>
		<th width="5%">Jurusan</th>
		<th width="5%">Identitas Mapel</th>
		<th width="5%">Bobot Nilai</th>
		<!-- <th width="5%">bobot nilai uraian</th> -->
		<th width="20%">Editor Soal</th>
		<th width="30%">Status Soal</th>
		<th width="30%">Action</th>
	</tr>
</thead>
<tbody>
	<?php
	//$querydosen = mysqli_query($konek, "SELECT DISTINCT jenissoal, kodemapel, soal.kodesoal, aktif, /*opsi, acak,*/ kelas, nilai, waktu FROM soal CROSS JOIN ujian USING (kodesoal)");
	$querydosen = mysqli_query($konek, "SELECT * FROM ujian WHERE kodesoal=(kodesoal)");
		if ($querydosen == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}
	$i = 1;
	while ($ar = mysqli_fetch_array($querydosen)) {
		// Ambil data soal dan kelompkkan berdasarkan status
		$queryGetType = mysqli_query($konek, "SELECT COUNT(id) as jumlah, status FROM soal WHERE kodesoal='$ar[kodesoal]' AND status != 0 GROUP BY status ORDER BY status");
		if ($queryGetType == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}

		$dataSoal = [];
		while ($typeSoal = mysqli_fetch_array($queryGetType)) {
			$dataSoal[$typeSoal['status']] = $typeSoal['jumlah'];
		}

		$opsi = $ar['opsi'];
		$opsi = str_replace("hidden", "4 opsi", $opsi);
		$opsi = str_replace("show", "5 opsi", $opsi);
		$acak = $ar['acak'];
		$acak = str_replace("1", "acak", $acak);
		$acak = str_replace("2", "urut", $acak);
		if (!$ar['aktif'] == '1') {
			$aktif = "<span style=color:red>Non Aktif</span>";
		} else {
			$aktif = "<span style=color:green>Aktif</span>";
		}
		if (!$ar['aktif'] == '1') {
			$tombol = "<a href='edit-soal.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&jenis=$ar[jenis]'><button id='clot' type='button' class='btn btn-warning btn-xs'><i class='fa fa-pencil-square-o'></i> Input</button></a>
									</td>";
		} else {
			$tombol = "<a href='#'><button id='clot' type='button' class='btn btn-default btn-xs' disabled><i class='fa fa-pencil-square-o'></i> Input</button></a>";
		}
		if (!$ar['aktif'] == '1') {
			$tombolon = "<button id='cloti' type='button' class='btn btn-danger'>OFF</button><a href='page/aktif-set.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&jenis=$ar[jenis]'><button id='clot3d' type='button' class='btn btn-default'>ON</button></a>";
		} else {
			$tombolon = "<a href='page/aktif-off.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&jenis=$ar[jenis]'><button id='clot3d2' type='button' class='btn btn-default'></i>OFF</button></a><button id='cloti' type='button' class='btn btn-success'></i>ON</button>";
		}
		if (!$ar['aktif'] == '1') {
			$tomboldel = "<a style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/delete-soal.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&jenis=$ar[jenis]\")'><button id='clot' type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></button></a";
		} else {
			$tomboldel = "<a style='font-decoration:none;color:#222;'><button id='clot' type='button' class='btn btn-default btn-sm' disabled><i class='fa fa-trash-o'></i></button></a";
		}

		if (!$ar['aktif'] == '1') {
			$tomboledit = "<a class='open_modal2' style='font-decoration:none;color:#222;' id='$ar[kodesoal]'><button type='button' class='btn btn-danger btn-xs btn-flat'><i class='fa fa-pencil-square-o'></i> option</button></a>";
		} else {
			$tomboledit = "<a href='#'><button type='button' class='btn btn-default btn-xs btn-flat' disabled><i class='fa fa-pencil-square-o'></i> option</button></a>";
		}
		$boboturai = 100 - $ar['nilai'];
		echo "
								<tr>
		<td align=center>$i</td>
		<td align=left>$ar[jenis]<br>$ar[mapel]<br>
		$ar[kodesoal]</td>
		<td align=center>$dataSoal[1]</td>
		<td align=center>$dataSoal[2]</td>
		<td align=center>$dataSoal[3]</td>
		<td align=center>$dataSoal[4]</td>
		<td align=center>$dataSoal[5]</td>
		<td align=center>$ar[waktu]'</td>
		
		<td align=center>$ar[kelas]</td>
		<td align=center>$ar[jurusan]</td>
		<td align=center>$ar[agama]</td>
		<td align=center>$ar[nilai]</td>
		
		<td align=center>
		
        <a href='preview-soal.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&jenis=$ar[jenis]'><button id='clot' type='button' class='btn bg-navy btn-xs'><i class='fa fa-print'></i></button></a>
                                    $tomboledit
                                    $tombol
									</td>
									<td align=center>
                                    $tombolon
									</td>
							        <td align=center>
							        <a href='page/exportsoal.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&jenis=$ar[jenis]'><button id='clot' type='button' class='btn btn-default btn-sm'><i class='fa fa-download'></i></button></a>
                                    $tomboldel 
									</td>
								</tr>";
		$i++;
	
	}
	?>
</tbody>