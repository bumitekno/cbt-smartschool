<?php
session_start();
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');
?>
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
<table id="dataonline" class="table table-hover table-striped">
	<thead>
		<tr>
			<th width="4%">No</th>
			<th width="15%">No Peserta</th>
			<th width="25%">Nama</th>
			<th width="4%">Kelas</th>
			<th width="4%">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$querydosen = mysqli_query($konek, "SELECT * FROM siswa WHERE online='1' ORDER by nis ASC");
		if ($querydosen == false) {
			die("Terjadi Kesalahan : " . mysqli_error($konek));
		}
		$z = 1;
		while ($ar = mysqli_fetch_array($querydosen)) {
			$num_rows = mysqli_num_rows($querydosen);
			if ($num_rows > 0) {
				$online = mysqli_num_rows($querydosen);
			} else {
				$online = "0";
			}

			echo "
    <tr>
									<td align=center>$z</td>
									<td>$ar[nis]</td>
									<td>$ar[nama]</td>
									<td>$ar[kelas]</td>
									<td style='background-color:#364247;'><a href='#' style='text-decoration:none;color:white;'><i id='on' class='fa fa-circle' style='color:#90ff00;font-size:10px;'></i> Online</a></td>
								</tr>
";
			$z++;

		} ?>
	</tbody>
</table>
<br><br>
<h5 style="color:grey;font-size:10px;">Jumlah siswa online :
	<?php echo $online; ?> orang
</h5>
<script>
	$(document).ready(function () {
		$('#dataonline').DataTable();
	});
</script>