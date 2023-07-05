				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="15%">Jenis Ujian</th>
						<th width="25%">Mapel</th>
						<th width="40%">Kode Soal</th>
						<th width="4%">Status</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM ujian");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($vv = mysqli_fetch_array ($querydosen)){
						    $aktif =$vv['aktif'];
						    $aktif = str_replace("0", "Nonaktif", $aktif);
                            $aktif = str_replace("1", "Aktif", $aktif);
							echo "
								<tr>
									<td align=center>$i</td>
									<td>$vv[jenis]</td>
									<td>$vv[mapel]</td>
									<td>$vv[kodesoal]</td>
									<td>$aktif</td>
									<td>
									<a style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/soalbase_delete.php?id=$vv[Urut]\")'><button type='button' class='btn btn-danger btn-flat btn-sm'><i class='fa fa-trash-o'></i> Hapus</button></a> 
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>