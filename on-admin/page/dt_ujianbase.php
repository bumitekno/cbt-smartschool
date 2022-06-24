				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="15%">nis</th>
						<th width="25%">nama</th>
						<th width="4%">kelas</th>
						<th width="10%">kode mapel</th>
						<th width="4%">jumlah soal</th>
						<th width="20%">siswa waktu</th>
						<th width="10%">Waktu mulai ujian</th>
						<th width="10%">lama ujian</th>
						<th width="10%">Jawaban sementara siswa</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM jawaban");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($vv = mysqli_fetch_array ($querydosen)){
						$sisa=$vv[sisawaktu]/60;
						$sisawaktu = number_format($sisa, 2, '.', '');
							echo "
								<tr>
									<td align=center>$i</td>
									<td>$vv[nis]</td>
									<td>$vv[nama]</td>
									<td>$vv[kelas]</td>
									<td>$vv[kodemapel]</td>
									<td>$vv[jumlahsoal]</td>
									<td>$sisawaktu Menit</td>
									<td>$vv[mulaiujian]</td>
									<td>$vv[lamaujian]</td>
									<td>$vv[jawabansiswa]</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>