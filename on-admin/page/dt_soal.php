				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="20%">Mapel</th>
						<th width="10%">Jumlah Soal PG</th>
						<th width="5%">Jumlah Soal Uraian</th>
						<th width="10%">Waktu</th>
						<!-- <th width="5%">opsi jwb</th>
						<th width="5%">tampil soal</th> -->
						<th width="10%">Kelas</th>
						<th width="10%">Bobot Nilai</th>
						<!-- <th width="5%">bobot nilai uraian</th> -->
						<th width="20%">Editor Soal</th>
						<th width="30%">Status Soal</th>
						<th width="30%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT DISTINCT jenissoal, kodemapel, soal.kodesoal, aktif, /*opsi, acak,*/ kelas, nilai, waktu FROM soal CROSS JOIN ujian USING (kodesoal) ORDER by id DESC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						$opsi =$ar['opsi'];
						$opsi = str_replace("hidden", "4 opsi", $opsi);
                        $opsi = str_replace("show", "5 opsi", $opsi);
                        $acak =$ar['acak'];
						$acak = str_replace("1", "acak", $acak);
                        $acak = str_replace("2", "urut", $acak);
						$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]' and status='1'");
						$num_rows = mysqli_num_rows($result);
						$result2 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]' and status='2'");
						$num_rows2 = mysqli_num_rows($result2);
				        if(!$ar['aktif']=='1')
				        {
					    $aktif = "<span style=color:red>Non Aktif</span>";
				        }
				        else
				        {
					    $aktif = "<span style=color:green>Aktif</span>";
				        }
					    if(!$ar['aktif']=='1')
				        {
					    $tombol = "<a href='edit-soal.php?matpel=$ar[kodemapel]&kode=$ar[kodesoal]&jenis=$ar[jenissoal]'><button id='clot' type='button' class='btn btn-warning btn-xs'><i class='fa fa-pencil-square-o'></i> Input</button></a>
									</td>";
				        }
				        else
				        {
					    $tombol = "<a href='#'><button id='clot' type='button' class='btn btn-default btn-xs' disabled><i class='fa fa-pencil-square-o'></i> Input</button></a>";
				        }
				        if(!$ar['aktif']=='1')
				        {
					    $tombolon = "<button id='cloti' type='button' class='btn btn-danger'>OFF</button><a href='page/aktif-set.php?matpel=$ar[kodemapel]&kode=$ar[kodesoal]&jenis=$ar[jenissoal]'><button id='clot3d' type='button' class='btn btn-default'>ON</button></a>";
				        }
				        else
				        {
					    $tombolon = "<a href='page/aktif-off.php?matpel=$ar[kodemapel]&kode=$ar[kodesoal]&jenis=$ar[jenissoal]'><button id='clot3d2' type='button' class='btn btn-default'></i>OFF</button></a><button id='cloti' type='button' class='btn btn-success'></i>ON</button>";
				        }
				        if(!$ar['aktif']=='1')
				        {
					    $tomboldel = "<a style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/delete-soal.php?matpel=$ar[kodemapel]&kode=$ar[kodesoal]&jenis=$ar[jenissoal]\")'><button id='clot' type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></button></a";
				        }
				        else
				        {
					    $tomboldel = "<a style='font-decoration:none;color:#222;'><button id='clot' type='button' class='btn btn-default btn-sm' disabled><i class='fa fa-trash-o'></i></button></a";
				        }
				        
				        if(!$ar['aktif']=='1')
				        {
					    $tomboledit = "<a class='open_modal2' style='font-decoration:none;color:#222;' id='$ar[kodesoal]'><button type='button' class='btn btn-danger btn-xs btn-flat'><i class='fa fa-pencil-square-o'></i> option</button></a>";
				        }
				        else
				        {
					    $tomboledit = "<a href='#'><button type='button' class='btn btn-default btn-xs btn-flat' disabled><i class='fa fa-pencil-square-o'></i> option</button></a>";
				        }
						$boboturai=100-$ar[nilai];
							echo "
								<tr>
		<td align=center>$i</td>
		<td align=left>$ar[jenissoal]<br>$ar[kodemapel]<br>
		$ar[kodesoal]</td>
		<td align=center>$num_rows</td>
		<td align=center>$num_rows2</td>
		<td align=center>$ar[waktu]'</td>
		
		<td align=center>$ar[kelas]</td>
		<td align=center>$ar[nilai]</td>
		
		<td align=center>
		
        <a href='preview-soal.php?matpel=$ar[kodemapel]&kode=$ar[kodesoal]&jenis=$ar[jenissoal]'><button id='clot' type='button' class='btn bg-navy btn-xs'><i class='fa fa-print'></i></button></a>
                                    $tomboledit
                                    $tombol
									</td>
									<td align=center>
                                    $tombolon
									</td>
							        <td align=center>
							        <a href='page/exportsoal.php?matpel=$ar[kodemapel]&kode=$ar[kodesoal]&jenis=$ar[jenissoal]'><button id='clot' type='button' class='btn btn-default btn-sm'><i class='fa fa-download'></i></button></a>
                                    $tomboldel 
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>