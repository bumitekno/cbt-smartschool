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
                            <div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="tgl" autocomplete="off" name="tgl" type="text" placeholder="TANGGAL" required />
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
    <button id="ti" class="btn btn-warning" float:right onclick="printDiv('printableArea2')"><i class="fa fa-print"></i> Cetak <?php echo $_POST['ruang']; ?> | Sesi <?php echo $_POST['sesi']; ?></button>
       <br>
            <div class="table-responsive" id="printableArea2">    
                <div class="page">
				            <table width="100%" class="kartu">
                				<tr>
                				    <td style="padding: 4px"><img src="../aset/foto/<?php echo $xx['logo'];?>" height="90"></td>
                					<td align="center" style="font-weight:bold; padding: 4px;"><h3>DAFTAR HADIR PESERTA UJIAN BERBASIS KOMPUTER <br> <u><?php echo $xx['n_sekolah'];?> <?php echo date ('Y') ?></u></h3></td>
                				    <td style="padding: 0px"><img src="../aset/foto/<?php echo $xx['logo_kota'];?>" height="94"></td>
                				</tr>
                			</table>
                			<br>
                			<table width="100%" class="kartu">
                				<tr>
                					<td align="left">&emsp;KOTA/KABUPATEN</td>
                					<td align="left">: <?php echo $xx['kota'];?></td>
                					<td align="left"></td>
                				</tr>
                			    <tr>
                					<td align="left">&emsp;SEKOLAH</td>
                					<td align="left">: <?php echo $xx['n_sekolah'];?></td>
                					<td align="center"></td>
                				</tr>
                				<tr>
                					<td align="left">&emsp;ID SERVER / RUANG</td>
                					<td align="left">: <?php echo $_POST['ruang']; ?> | Sesi <?php echo $_POST['sesi']; ?></td>
                					<td align="center"></td>
                				</tr>
                				<tr>
                					<td align="left">&emsp;HARI/TANGGAL</td>
                					<td align="left">: <?php echo $_POST['tgl']; ?></td>
                					<td align="center"></td>
                				</tr>
                				<tr>
                					<td align="left">&emsp;MATA PELAJARAN</td>
                					<td align="left">: <?php echo $_POST['mapel']; ?></td>
                					<td align="center"></td>
                				</tr>
                			</table>
			                <br>
			<table class="table" width="100%">
				<tr style="height:30px">
					<th id="garis" >No.</th>
					<th id="garis" >Username</th>
					<th id="garis" >Nama Peserta<BR> </th>
					<th id="garis" >Tanda Tangan</th>
					<th id="garis" >Ket</th>
				</tr>
					<?php
					    $ruang = $_POST['ruang'];
					    $sesi = $_POST['sesi'];
						$querydosen = mysqli_query ($konek, "SELECT * FROM siswa WHERE ruang='$ruang' and sesi='$sesi' ORDER by nis ASC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						?>						
								<tr>
					<td id="garis" width="15" align="center"><?php echo $i; ?></td>
					<td id="garis" width="100" align="center"><?php echo $ar[nis]; ?></td>
					<td id="garis" width="*"><?php echo $ar[nama]; ?></td>
					<td id="garis" width="150"><span style="float:left;width:80px;"><?php echo $i; ?>.</span></td>
					<td id="garis" width="100"></td>
				</tr>
				<?php $i++; } ?>
					</table>
						<BR><BR>
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