				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="15%">No Peserta</th>
						<th width="25%">Nama</th>
						<th width="4%">Kelas</th>
						<th width="10%">Password</th>
						<th width="6%">Sesi</th>
						<th width="10%">Ruang</th>
						<th width="30%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM siswa ORDER by kelas ASC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
							
							echo "
								<tr>
									<td align=center>$i</td>
									<td>$ar[nis]</td>
									<td>$ar[nama]</td>
									<td>$ar[kelas]</td>
									<td>$ar[pass]</td>
									<td>$ar[sesi]</td>
									<td>$ar[ruang]</td>
									<td align=center>
									<a class='open_modal' style='font-decoration:none;color:#222;' id='$ar[id]'><button type='button' class='btn btn-success'><i class='fa fa-pencil-square-o'></i></button></a>
									<a style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/siswa_delete.php?id=$ar[id]\")'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a> 
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>