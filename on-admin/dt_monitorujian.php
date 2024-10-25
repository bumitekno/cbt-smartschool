<table id="data2" class="table table-hover table-striped">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="25%">No Peserta</th>
			<th width="30%">Nama</th>
			<th width="10%">Tingkat</th>
			<th width="10%">action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		session_start();
		include('../koneksi/koneksi.php');
		include('conn/cek.php');
		include('conn/fungsi.php');
		$querydosen = mysqli_query($konek, "SELECT * FROM siswa WHERE statuslogin='1' ORDER by nis ASC");
		if ($querydosen == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}
		$i = 1;
		while ($ar = mysqli_fetch_array($querydosen)) {
			if (!$ar['statuslogin'] == '1') {
				$aktif = "<span style=color:red>Sudah Selesai</span>";
			} else {
				$aktif = "<span style=color:green>Sedang Mengerjakan</span>";
			}

			echo "
							<tr>
									<td align=center>$i</td>
									<td>$ar[nis]</td>
									<td>$ar[nama]</td>
									<td>$ar[kelas]</td>
									<td align=center>
                                    <a href='#' style='font-decoration:none;color:#ffffff;' onClick='confirm_delete(\"page/siswa_reset_login.php?id=$ar[id]\")'><button id='reset' type='button' class='btn btn-danger btn-xs'><i class='fa fa-history'></i> RESET </button></a>
                                    </td>
							</tr>";
			$i++;
		}
		?>
	</tbody>
</table>