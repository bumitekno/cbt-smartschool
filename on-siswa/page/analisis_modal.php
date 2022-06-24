<?php
include ('../conn/cek.php');
include ('../../koneksi/koneksi.php');
$id	= $_GET["id"];
$query = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE id='$id'");
if($query == false){
die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($r = mysqli_fetch_array($query)){
	$cari=$r['kodesoal'];
							$querydosen = mysqli_query ($konek, "SELECT * FROM ujian where kodesoal='$cari'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($sr = mysqli_fetch_array ($querydosen)){
    $qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){
	$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$cari' AND status='1'");
						$rows = mysqli_num_rows($result);
						    	$x=$r['jawabansiswa'];
						$xhasil=substr_count($x, "X");
						$nilaipg=$sr['nilai'];
						$kuncisoal=$r['kuncisoal'];
						$kuncis=strtoupper($kuncisoal);
						$key=$kuncis;
						$jumlah=$rows;
						$score=0;
                        $benar=0;
                        $salaht=0;
                        $kosong=0;
						
                    for ($no=0;$no<$jumlah;$no++){
                        
                    if($key[$no]==$x[$no]){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }
					else
					{
                        //jika salah
                        $salaht++;
                    
                    }  
					$salah=$salaht-$xhasil;
}
$score = $nilaipg/$jumlah*$benar; 
$pg=number_format($score,2);
						$urai=$r['nilaiurai'];
						$nil=$score+$urai;           
?>

<!-- Modal Popup siswa edit -->
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Hasil Ujian Siswa <button class="btn btn-default btn-flat" float:right onclick="printDiv('printableArea2')"><i class="fa fa-print"></i></button></h4>
					</div>
						
					<div class="modal-body" id="printableArea2">
				
                    <center><img src="../aset/foto/<?php echo $xx['logo'];?>"  width=100 alt="...">
                    <br><h3><b><u><?php echo $xx['n_sekolah'];?></u></b></h3><br></center>
                    <center><h5 id="tutu"><?php echo $xx['sub_n_sekolah'];?></h5></center>
                    <br><br>
                <div class="col-xs-8">
                    <table class="cetakan full">
					<br>
            			<tr>
            				<td width="30px" rowspan="4" valign="top"></td>
            				<td width="200px">NAMA</td>
            				<td width="10px">:</td>
            				<td><span class="full"><?php echo $r['nama'];?></span></td>
            			</tr>
            			<tr>
            				<td>KELAS</td>
            				<td>:</td>
            				<td><span class="full"><?php echo $r['kelas'];?></span></td>
            			</tr>
            			<tr>
            				<td>MATA PELAJARAN</td>
            				<td>:</td>
            				<td>
            				<span style="width:250px"><?php echo $r['kodemapel'];?></span></td>
            			</tr>
            			<tr>
            				<td>KODE SOAL</td>
            				<td>:</td>
            				<td>
            				<span style="width:250px"><?php echo $r['kodesoal'];?></span></td>
            			</tr>
                	</table>
                </div>
                <div class="col-xs-4">
				<br>
                    <a class="btn btn-default" style="float:right;">NILAI : <h3><?php echo number_format($nil,0);?></h3></a>
                </div>
            <div class="col-xs-12">
                <hr class="style2">
                <tbody>
					<?php
					$qu = mysqli_query ($konek, "SELECT * FROM ujian where kodesoal='$r[kodesoal]'");
						if($qu == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($rr = mysqli_fetch_array ($qu)){
						$query = mysqli_query ($konek, "SELECT * FROM soal WHERE kodesoal='$r[kodesoal]' ORDER by nomersoal ASC");
						if($query == false){
						die ("Terjadi Kesalahan : ". mysqli_error($konek));
						$i=1;
						}
						while ($ar = mysqli_fetch_array ($query)){
						$query2 = mysqli_query ($konek, "SELECT * FROM jawaburaian WHERE nama='$r[nama]' AND nomersoal='$ar[nomersoal]' AND kodesoal='$ar[kodesoal]'");
						$ur = mysqli_fetch_array ($query2);
$kuncis1=$ar[kunci];
						$kuncis2=strtoupper($kuncis1);						
$query3 = mysqli_query ($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]' AND status='2'");
$rows = mysqli_num_rows($query3);
$nilaimaxurai=100-$rr['nilai'];
$nilaipersoal=$nilaimaxurai/$rows ;
$nilaiperbiji=$nilaipersoal/5;						
$skorurai=$ur['nilai']*$nilaiperbiji;						
						
						    if(!$ar['audio']=='')
				        {
					    $audio = "<audio src='../gbr/$ar[audio]' controls controlsList='nodownload'></audio>";
				        }
				        else
				        {
					    $audio = "";
				        }	
						if(!$ar['soal']=='')
				        {
					    $soal = "<b>$ar[soal]</b><br><br>";
				        }
				        else
				        {
					    $soal = "";
				        }
						$jwbsis=$r[jawabansiswa][($ar[nomersoal]-1)];
				        if(!$ar['gambarsoal']=='')
				        {
					    $gambarsoal = "<img class='max' src='../gbr/$ar[gambarsoal]' align=center style='max-width:300px;height:auto' ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
				        }
				        
				        if(!$ar['gambar_a']=='')
				        {
					    $gambar_a = "<img src='../gbr/$ar[gambar_a]' align=center style='max-width:150px;height:auto' >";
				        }
				        else
				        {
					    $gambar_a = "";
				        }
				        if(!$ar['pilihan1']=='')
				        {
					    $pilihan_a = "$ar[pilihan1]";
				        }
				        else
				        {
					    $pilihan_a = "";
				        }
				        if(!$ar['gambar_b']=='')
				        {
					    $gambar_b = "<img src='../gbr/$ar[gambar_b]' align=center style='max-width:150px;height:auto' >";
				        }
				        else
				        {
					    $gambar_b = "";
				        }
				        if(!$ar['pilihan2']=='')
				        {
					    $pilihan_b = "$ar[pilihan2]";
				        }
				        else
				        {
					    $pilihan_b = "";
				        }
				        if(!$ar['gambar_c']=='')
				        {
					    $gambar_c = "<img src='../gbr/$ar[gambar_c]' align=center style='max-width:150px;height:auto' >";
				        }
				        else
				        {
					    $gambar_c = "";
				        }
				        if(!$ar['pilihan3']=='')
				        {
					    $pilihan_c = "$ar[pilihan3]";
				        }
				        else
				        {
					    $pilihan_c = "";
				        }
				        if(!$ar['gambar_d']=='')
				        {
					    $gambar_d = "<img src='../gbr/$ar[gambar_d]' align=center style='max-width:150px;height:auto' >";
				        }
				        else
				        {
					    $gambar_d = "";
				        }
				        if(!$ar['pilihan4']=='')
				        {
					    $pilihan_d = "$ar[pilihan4]";
				        }
				        else
				        {
					    $pilihan_d = "";
				        }
				        if(!$ar['gambar_e']=='')
				        {
					    $gambar_e = "<img src='../gbr/$ar[gambar_e]' align=center style='max-width:150px;height:auto' >";
				        }
				        else
				        {
					    $gambar_e = "";
				        }
				        if(!$ar['pilihan5']=='')
				        {
					    $pilihan_e = "$ar[pilihan5]";
				        }
				        else
				        {
					    $pilihan_e = "";
				        }
						if($ar['status']>1)
				        {
					    $statussoal = "hidden";
				        }
				        else
				        {
					    $statussoal = "show";
				        }
				        if($jwbsis==$kuncis2)
				        {
					    $benar = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
				        }
				        else
				        {
					    $benar = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
				        }
						if($ur[jawaban]=="")
				        {
					    $nillai = "";
				        }
				        else
				        {
					    $nillai = "<p><i>skor = $skorurai</i><ul>$ur[jawaban]</ul></p>";
				        }
				        if($kuncis2=="A")
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
				        }
				        else if($kuncis2=="B")
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
				        }
				        else if($kuncis2=="C")
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
				        }
				        else if($kuncis2=="D")
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p></div>";
				        }
				        else
				        {
					    $pilihan = "<br>
						<div class='$statussoal'>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
    								&emsp;<p>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p></div>";
				        }

							echo "

								<tr>
								$ar[nomersoal]. <b>$ar[soal]</b>
							    <br>
								&emsp;$gambarsoal<br>$audio
								$pilihan
								<br>
								 <div><i><u>Jawaban siswa</u></i> : <i class='$statussoal'>$jwbsis $benar </i> $nillai</div>
                                <br>
                                <hr class='style1'>
								</tr>";
						}
					?>
					<hr class="style2">
					<center><h5><b> --------- &copy; <?php echo date ('Y') ?> <?php echo $xx['n_sekolah'];?> --------- </b></h5></center>
				</tbody>
			</div>
							<div class="modal-footer">

							</div>
						</form>
					</div>
				</div>
			</div>
			
			
<?php
}}}}
?>