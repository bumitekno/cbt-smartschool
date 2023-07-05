				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="50%">Pengumuman</th>
						<th width="10%">Author</th>
						<th width="10%">Waktu Post</th>
						<th width="25%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM article ORDER BY id DESC limit 10");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
							
							echo "
								<tr>
									<td align=center>$i</td>
									<td>$ar[content]</td>
									<td>$ar[author]</td>
									<td>$ar[tanggal]</td>
									<td align=center>
									<a href='#'  style='font-decoration:none;color:#222;' class='open_modal' id='$ar[id]'><button class='btn btn-success' ><i class='fa fa-edit'></i></button></a>
									<a href='#' style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/article_delete.php?id=$ar[id]\")'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a> 
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>