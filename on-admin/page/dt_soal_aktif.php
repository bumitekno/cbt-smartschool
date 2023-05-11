<?php
session_start();
include ('conn/cek.php');
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
					    <div  id='pew' class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
                                          <div  id='pew' class='panel panel-primary'>
                                             <div  id='pew' class='panel-heading'>
                                                <div class='row'>
                                                   <div class='col-xs-8'>
                                                      $ar[kodesoal]
                                                      <br>
                                                      $num_rows Soal
                                                   </div>
                                                   <div class='col-xs-4 text-right'>
                                                      $ar[waktu]' Menit
                                                   </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-xs-12 text-right'>
                                                        <h2><b>$hasil</b></h2><h5> <i class='fa fa-users' aria-hidden='true'></i> Peserta Ujian</h5>
                                                        $hsil Peserta Selesai
                                                    </div>
                                                </div>
                                             </div>
                                             <a href='preview-soal.php?matpel=$ar[mapel]&kode=$ar[kodesoal]&jenis=$ar[jenis]'>
                                                <div  id='pow' class='panel-footer'>
                                                   <span class='pull-left'> $ar[mapel]</span>
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