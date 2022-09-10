					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM siswa ORDER by nis ASC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){	

						?>
<div id='border' class="col-xs-6" style='max-width:450px;'>
	            <table>
		                <td colspan="3" style="border-bottom:1px solid #666; padding: 0;">
                			<table width="100%" class="kartu">
                				<tr>
                				    <td align='center' style='padding: 4px'><img src='../aset/foto/<?php echo $xx['logo'];?>' height='40'></td>
                                    <td id="cilik" align='center' style='font-weight:bold; padding: 4px; text-transform: uppercase;'>KARTU PESERTA <BR> UJIAN SEKOLAH BERBASIS KOMPUTER<BR>
									<?php echo $xx['n_sekolah'];?><BR>TAHUN AJARAN 2022/2023 </td>
                                    <td align='center' style='padding: 4px'><img src='../aset/foto/<?php echo $xx['logo_kota'];?>' height='45'></td>
                				</tr>
                			</table>
                		</td>
<tr><td id="cilik"><b>Nama</b></td><td id="cilik" width="1"> :</td><td id="cilik" width="290"> <b>&emsp;<?php echo $ar[nama]; ?></b></td></tr>
<tr><td id="cilik"><b>Kelas</b></td><td id="cilik"> :</td><td id="cilik">&emsp;<b><?php echo $ar[kelas]; ?></b></td></tr>
<tr><td id="cilik"><b>Sesi / Ruang</b></td><td id="cilik"> :</td><td id="cilik"><b>&emsp;<?php echo $ar[sesi]; ?> / <?php echo $ar[ruang]; ?></b></td></tr>
<tr><td id="cilik"><b>Username</b></td><td id="cilik"> :</td><td id="cilik"><b>&emsp;<?php echo $ar[nis]; ?></b></td></tr>
<tr><td id="cilik"><b>Password</b></td><td id="cilik"> :</td><td id="cilik"><b>&emsp;<?php echo $ar[pass]; ?></b></td></tr>
<tr><td></td><td></td><td id="cilik">&nbsp;&nbsp;&nbsp;<?php echo $xx['kota'];?>, <?php echo $xx['tanggal'];?></td></tr>
<tr><td></td><td></td><td id="cilik" width="290">&nbsp;&nbsp;&nbsp;Kepala Sekolah</td></tr>
<tr><td></td><td></td><td id="cilik" height="40" width="115">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='../images/<?php echo $xx['bg_login'];?>' width=70px height=auto/></td></tr>
<tr><td></td><td></td><td id="cilik" width="290">&nbsp;&nbsp;&nbsp;<u><?php echo $xx['kepsek'];?></u></td></tr>
<tr><td></td><td></td><td id="cilik" width="290">&nbsp;&nbsp;&nbsp;NIP.<?php echo $xx['nip'];?></td></tr>
	            </table>
	            <img id='plotro' src='../aset/foto/avatar.gif' width=70px height=auto/>
</div>
<?php }} ?>