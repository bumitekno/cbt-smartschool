<?php
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
?>
            <div class="box-body">
                
<?php
$kelasx=preg_replace('/[^0-9\  ]/', '', $kelas);
						$querydosen = mysqli_query ($konek, "SELECT * FROM ujian where aktif=1 and kelas='$kelasx' ");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
			            $hs = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE nama='$nama' AND kodesoal='$ar[kodesoal]'");
						$nm = mysqli_num_rows($hs);
						if ($nm > 0)
                                						{
                                						$hsil='danger';
                                						}
                                						else
                                						{
                                						$hsil='primary';    
                                						}
                        if ($nm > 0)
                                						{
                                						$nope='';
                                						}
                                						else
                                						{
                                						$nope='disabled';    
                                						}

							echo "
								
								<div  id='pew' class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
                                          <div  id='pew' class='panel panel-$hsil'>
                                             <div  id='pew' class='panel-heading'>
                                                <div class='row'>
                                                   <div class='col-xs-8'>
                                                      <h6>$ar[kodesoal]
                                                      <br>$num_rows Soal</h6>
                                                   </div>
                                                   <div class='col-xs-4 text-right'>
                                                      <i class='fa fa-clock-o fa-spin'></i>$ar[waktu]'
                                                   </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-xs-12'>
                                                        <h6><b>$ar[mapel]</b></h6>
                                                    </div>
                                                </div>
                                             </div>
                                             <a class='$hsil' href='confirm.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&waktu=$ar[waktu]'>
                                                <div  id='pow' class='panel-footer' style='border:0;border-radius:0;'>
                                                   <span class='pull-left'><i class='fa fa-check'></i> Kerjakan</span>
                                                   <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                                   <div class='clearfix'></div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>
								";
						$i++;		
						}
					?>
					</div>
					<h4><font color="#FF0000">Keterangan: *</font></h4>
<ul>
<li>Tombol ujian aktif akan muncul diatas, klik untuk memulai ujian</li>
<li>Hubungi Admin / Proktor jika tidak ada Ujian yang aktif</li>
<li>Jika tidak ada tombol ujian maka soal tidak bisa dikerjakan</li>
<br>
</ul> 
		<div class='box'>
            <div class='box-header'>
              <h6 class='box-title'>Finished Exam <i class="fa fa-calendar-check-o"></i></h6>
			  <br><h6 style='font-size:12px;'>Kamu sudah mengerjakan ujian dibawah ini</h6>
            </div>
            <div class='box-body no-padding'>
              <table class='table table-condensed'>
                <tr>
                  <th style='width: 3%'>No</th>
				  <th style='width: 20%'>Mapel</th>
                  <th style='width: 20%'>Kode Soal</th>
                  <th style='width: 40%'>Progress</th>
				  <th style='width: 7%'>Status</th>
                  <th style='width: 17%'>Waktu Selesai</th>
                </tr>
<?php
						$queryn = mysqli_query ($konek, "SELECT * FROM nilaihasil WHERE nama='$nama'");
						if($queryn == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($r = mysqli_fetch_array ($queryn)){ 
						$ok=$r["kodesoal"];
						$x=$r['jawabansiswa'];
						$xhasil=substr_count($x, "X");
						$terjwb=$r["jumlahsoal"]-$xhasil;
						$persen=100/$r["jumlahsoal"];
						$persenjawab=$persen*$terjwb;
							echo "
								<tr>
								  <td><h6 style='font-size:12px;'>$i</h6></td>
								  <td><h6 style='font-size:12px;'>$r[kodemapel]</h6></td>
								  <td><h6 style='font-size:10px;'>$r[kodesoal]</h6></td>
								  <td><p style='display:block;width:100%;background:transparent;overflow:show;z-index:9999999999;font-size:10px;margin:0;'>Terjawab $terjwb dari $r[jumlahsoal] Soal</p>
									<div class='progress progress-md' style='background:#ddd;width:100%;height:0.5em;'>
									  <div class='progress-bar progress-bar-success' style='width: $persenjawab%;font-size:10px;'></div>
									</div>
								  </td>
								  <td><h6 style='font-size:10px;'>Selesai</h6></td>
								  <td><h6 style='font-size:10px;'>$r[benar] | $r[salah]</h6></td>
								</tr>
																";
						$i++;		
						}
					?>
					</table>
            </div>
          </div>
                </div>
					</div>
                </div>
                <script>
                    $('.danger').click(function(e){
                        e.preventDefault();
                    })
                </script>