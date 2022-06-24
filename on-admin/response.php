<?php
session_start();
include ('../conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
						$querydosen = mysqli_query ($konek, "SELECT * FROM ujian where aktif=1");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
						$num_rows = mysqli_num_rows($result);
						$hm = mysqli_query($konek, "SELECT * FROM jawaban WHERE kodesoal='$ar[kodesoal]'");
						$num = mysqli_num_rows($hm);
                                						if ($num > 0)
                                						{
                                						$hasil=mysqli_num_rows($hm);
                                						}
                                						else
                                						{
                                						$hasil="0";    
                                						}
                        $hs = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE kodesoal='$ar[kodesoal]'");
						$nm = mysqli_num_rows($hs);
						if ($nm > 0)
                                						{
                                						$hsil=mysqli_num_rows($hs);
                                						}
                                						else
                                						{
                                						$hsil="0";    
                                						}
						if(!$ar['aktif']=='1')
				        {
					    $aktif = "";
				        }
				        else
				        {
					    $aktif = "
					    <div  id='pew' class='col-xs-6 col-sm-4 col-md-2 col-lg-2'>
                                          <div  id='pew' class='panel panel-primary'>
                                             <div  id='pew' class='panel-heading'>
                                                <div class='row'>
                                                   <div class='col-xs-8' style='font-size:10px'>
                                                      $ar[kodesoal]
                                                      <br>
                                                      $num_rows Soal
                                                   </div>
                                                   <div class='col-xs-4 text-right'>
                                                      <i id='blink' class='fa fa-circle' style='color:#90ff00;font-size:10px;'></i>$ar[waktu]'
                                                   </div>
                                                </div>
                                                <div class='row text-right'>
                                                    <div class='col-xs-12 text-right'>
                                                        <h6><b>$hasil</b> Peserta Ujian
                                                        <br>$hsil Peserta Selesai</h6>
                                                    </div>
                                                </div>
                                             </div>
                                             <a href='../preview/ujianstart.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&jenis=$ar[jenis]' style='font-size:10px'>
                                                <div  id='pow' class='panel-footer'>
                                                   <span class='pull-left'>$ar[mapel] </span>
                                                   <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                                   <div class='clearfix'></div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>";
				        }

							echo "
								
								$aktif
								";
						$i++;		
						}
					?>