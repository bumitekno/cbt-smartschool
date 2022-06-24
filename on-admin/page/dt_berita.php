                            <form action="#" method="post"> 
                            <div class="col-sm-3" id="Select"> 
                                 <select class="form-control" id="mySelect" name="ruang" required >  
                                     <option value="<?php echo $ar[ruang]; ?>"><i class="fa fa-angle-down"></i><?php echo $ar[ruang]; ?>PILIH RUANG - </option>
                       <?php
						$kelas = mysqli_query ($konek, "SELECT DISTINCT ruang FROM siswa");
						if($kelas == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($kelas)){
						?>
                                        <option value="<?php echo $ar[ruang]; ?>"><?php echo $ar[ruang]; ?></option>
                        <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-3" id="Select">
                                <select class="form-control" id="mySelect" name="sesi" required >  
                                    <option value="<?php echo $ar[ruang]; ?>"><i class="fa fa-angle-down"></i><?php echo $ar[ruang]; ?>PILIH SESI - </option>
                       <?php
						$kelas = mysqli_query ($konek, "SELECT DISTINCT sesi FROM siswa");
						if($kelas == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($kelas)){
						?>
                                     <option value="<?php echo $ar[sesi]; ?>"><?php echo $ar[sesi]; ?></option>
                        <?php } ?>
                                </select> 
                                <input type="hidden" name="show" value="1" />
                            </div>
                            <div class="col-sm-3" id="Select">   
                                 <select class="form-control" id="mySelect" name="mapel" required >  
                                     <option value="<?php echo $ar[mapel]; ?>"><i class="fa fa-angle-down"></i><?php echo $ar[mapel]; ?>PILIH MAPEL - </option>
                       <?php
						$kelas = mysqli_query ($konek, "SELECT DISTINCT mapel FROM ujian");
						if($kelas == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($kelas)){
						?>
                                        <option value="<?php echo $ar[mapel]; ?>"><?php echo $ar[mapel]; ?></option>
                        <?php } ?>
                                </select> 
                            </div>
                            <div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="tgl" name="tgl" autocomplete="off" type="text" placeholder="TANGGAL" required />
									</div>
							</div>
                            <div class="col-sm-3" id="Select">
                                <button id="ti" class="btn btn-success" type="submit" value="Pilih"><i class="fa fa-check" aria-hidden="true"></i> Proses</button>
                            </form>
                            </div>
                            <br><br><br>
<?php $show               = $_POST['show']; 
if(!$show=='')
				        {
					    $cul = "1";
				        }
				        else
				        {
					    $cul = "";
				        }
?>
<div id="ndelik<?php echo $cul ?>">
    <br><br>
<?php
						$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){	

						?>
    <button id="ti" class="btn btn-warning" float:right onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Cetak <?php echo $_POST['ruang']; ?> | Sesi <?php echo $_POST['sesi']; ?></button>
        <br>
            <div class="table-responsive" id="printableArea">    
                <div class="page">
				            <table width="100%" class="kartu">
                				<tr>
                				    <td style="padding: 4px"><img src="../aset/foto/<?php echo $xx['logo'];?>" height="90"></td>
                					<td align="center" style="font-weight:bold; padding: 4px;"><h3>BERITA ACARA UJIAN BERBASIS KOMPUTER <br> <u><?php echo $xx['n_sekolah'];?> <?php echo date ('Y') ?></u></h3></td>
                				    <td style="padding: 0px"><img src="../aset/foto/<?php echo $xx['logo_kota'];?>" height="94"></td>
                				</tr>
                			</table>
                			<br>
        <table class="cetakan full">
			<tr>
				<td width="30px" rowspan="11" valign="top"></td>
				<td width="200px">Kode Sekolah</td>
				<td width="10px">:</td>
				<td><span class="full"><?php echo $xx['kode_sekolah'];?></span></td>
			</tr>
			<tr>
				<td>Sekolah/Madrasah</td>
				<td>:</td>
				<td><span class="full"><?php echo $xx['n_sekolah'];?></span></td>
			</tr>
			<tr>
				<td>Server</td>
				<td>:</td>
				<td>
				<span style="width:250px"><?php echo $_POST['ruang']; ?></span>
			</tr>
			<tr>
				<td>Sesi</td>
				<td>:</td>
				<td><span class="full"><?php echo $_POST['sesi']; ?></span></td>
			</tr>
			<tr>
				<td>Mata Pelajaran</td>
				<td>:</td>
				<td><span class="full"></span><?php echo $_POST['mapel']; ?></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><span class="full"></span><?php echo $_POST['tgl']; ?></td>
			</tr>
			<tr>
				<td>Jumlah Peserta Seharusnya</td>
				<td>:</td>
				<td><span class="full"></span>............................................................</td>
			</tr>
			<tr>
				<td>Jumlah Hadir (Ikut Ujian)</td>
				<td>:</td>
				<td><span class="full"></span>............................................................</td>
			</tr>
			<tr>
				<td>Jumlah Tidak Hadir</td>
				<td>:</td>
				<td><span class="full"></span>............................................................</td>
			</tr>
			<tr>
				<td>Peserta Tidak Hadir</td>
				<td>:</td>
				<td><span class="full"></span>........................................................................................................................</td>
			</tr>
			<br><br>
	</table>
		<table class="cetakan" width="100%">
			<tr>
				<td width="30px" rowspan="6" valign="top"></td>
				<td>Catatan selama Ujian Nasional Berbasis Komputer (UNBK) :</td>
			</tr>
			<tr height="120px"><td class="isi" style="border:solid 1px black"></td></tr>
		</table>
		<table class="cetakan">
			<tr height="80px">
				<td colspan="4">&emsp;&emsp;Yang membuat berita acara :</td>
			</tr>
			<tr align="center" style="font-weight:bold">
				<td width="200px" colspan="2"></td>
				<td width="200px"></td>
				<td width="200px">TTD</td>
			</tr>
			<tr>
				<td rowspan="2" valign="top"></td>
				<td>&emsp;&emsp;Proktor</td>
				<td valign="bottom"><span style="width:170px">............................................................</span></td>
				<td rowspan="2" valign="middle" align="center">1.<span style="width:170px;float:right">............................................................</span></td>
			</tr>
			<tr><td>&emsp;&emsp;NIP</td><td valign="bottom"><span style="width:170px">............................................................</span></td></tr>
			<tr>
				<td rowspan="2" valign="top"></td>
				<td>&emsp;&emsp;Pengawas</td>
				<td valign="bottom"><span style="width:170px">............................................................</span></td>
				<td rowspan="2" valign="middle" align="center">2.<span style="width:170px;float:right">............................................................</span></td>
			</tr>
			<tr><td>&emsp;&emsp;NIP</td><td valign="bottom"><span style="width:170px">............................................................</span></td></tr>
			<tr>
				<td rowspan="2" valign="top"></td>
				<td>&emsp;&emsp;Kepala Sekolah</td>
				<td valign="bottom"><span style="width:170px">............................................................</span></td>
				<td rowspan="2" valign="middle" align="center">3.<span style="width:170px;float:right">............................................................</span></td>
			</tr>
			<tr><td>&emsp;&emsp;NIP</td><td valign="bottom"><span style="width:170px">............................................................</span></td></tr>
		</table>
		<br>
		<table style="border:solid 1px black" class="cetakan">
		<tr>
			<td style="border-bottom:1px solid black"><i><b>Catatan:</b></i></td>
		</tr>
		<tr>
			<td class="isi2">
				<ul style="list-style-type:none;">
					<li style="font-size:12px">- Dibuat rangkap 3 (tiga)
					<li style="font-size:12px">- Ditanda tangani oleh Proktor, Pengawas dan Kepala sekolah
				</ul>
			</td>
		</tr>
		</table><BR><BR>
			<div class="footer">
				<table width="100%" height="30">
				<tr>
					<td width="25px" style="border:1px solid black"></td>
					<td width="5px">&nbsp;</td>
					<td style="border:1px solid black;font-weight:bold;font-size:14px;text-align:center;"><?php echo $xx['n_sekolah'];?></td>
					<td width="5px">&nbsp;</td>
					<td width="25px" style="border:1px solid black"></td>
				</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>