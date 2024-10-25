				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="10%">Username </th>
						<th width="20%">Nama</th>
						<th width="10%">Jabatan</th>
						<!-- <th width="5%">phone</th> -->
						<th width="10%">Password</th>
						<th width="15%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM users WHERE NOT admin_su=1 ORDER by nip ASC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						$adminsu =$ar['admin_su'];
						    $adminsu = str_replace("0", "Dosen", $adminsu);
                            $adminsu = str_replace("2", "Pengawas", $adminsu);	
							echo "
								<tr>
									<td align=center>$i</td>
									<td>$ar[nip]</td>
									<td>$ar[nama]</td>
									<td>$adminsu</td>
									<td>$ar[pass]</td>
									<td align=center>
									<a id='alert$i' href='page/resetpass.php?id=$ar[id]'><button type='button' class='btn btn-success btn-flat' onclick='myFunction2()'><i class='fa fa-refresh'></i> Reset Password</button></a>
									<a style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/user_delete.php?id=$ar[id]\")'><button type='button' class='btn btn-danger btn-flat'><i class='fa fa-trash-o'></i></button></a> 
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>