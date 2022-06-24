				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT jenis, mapel, kodesoal, aktif, waktu FROM ujian where aktif=1");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						$result = mysql_query("SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
						$num_rows = mysql_num_rows($result);
							echo "
							
								<tr>
								    <td align=center>$i</td>
								    <td align=left>
<a href='confirm.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&waktu=$ar[waktu]'><button id='oke' type='button' class='btn btn-success'><i class='fa fa-cog fa-spin'></i> | soal $ar[mapel] | $ar[jenis] | $ar[kodesoal] | Jumlah Soal $num_rows</button><button id='oke' type='button' class='btn btn-warning'><i class='fa fa-check'></i> Kerjakan</button></a>									
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>