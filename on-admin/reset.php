<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
if($admin_su == 1)
				        {
				             $username=$_SESSION['admin'];
					   
				        }
				        else
				        {
				             header('location:theme.php?gagal=1');
				             exit;
				        }
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Reset</title>
	<!-- Library CSS -->
	<?php
		include "bundle/bundle_css.php";
	?>
	<style>
	     #cog {
    border-radius:0; 
    background-color:#222d32;
    color:white;
    border:0;
    }
    #cogi {
    border-radius:0; 
    background-color:#ff8f0a;
    color:white;
    border:0;
    }
    #cog:hover {
    border-radius:0; 
    background-color:#ff8f0a;
    color:white;
    border:0;
    }
    .alert-success {
	border-radius:0;
	font-size:12px;	
	position: fixed;
	right: 5px;
	bottom: 0px;
	z-index:9999;
	}
	@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fade-in {
  opacity:0;  /* make things invisible upon start */
  -webkit-animation:fadeIn ease-in 1;  /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}
	</style>
  </head>
  <?php
		include "tema/tema.php";
	?>
  
    <div class="wrapper">
      <?php
        include 'navbar/content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <?php
        include "navbar/userpanel.php";  
      ?> 
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN MENU</li>
                <li><a href="index.php"><i class="fa fa-tachometer"></i><span> Dashboard</span></a></li>
				<li><a href="siswa.php"><i class="fa fa-graduation-cap"></i><span> Management Siswa</span></a></li>

				<li class="treeview">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span> Management Ujian</span>
                      <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                  </a>
                  <ul class="treeview-menu">
                            <li><a href="soal.php"><i class="fa fa-book"></i> Bank Soal</a></li>
    						<li><a href="kartuujian.php"><i class="fa fa-print"></i><span> Kartu Peserta</span></a></li>
    						<li><a href="daftarhadir.php"><i class="fa fa-print"></i><span> Daftar Hadir</span></a></li>
    						<li><a href="beritaacara.php"><i class="fa fa-print"></i><span> Berita Acara</span></a></li>
    						<li><a href="up-gbrsoal.php"><i class="fa fa-upload"></i><span> Upload Gbr / Audio Soal</span></a></li>
                  </ul>
                </li> 
                
				<li><a href="hasiltest.php"><i class="fa fa-area-chart"></i><span> Hasil Test</span></a></li>
				<li><a href="monitor.php"><i class="fa fa-laptop"></i><span> Monitoring Ujian</span></a></li>		
				<li><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li>
      </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php 
                    if (!empty($_GET['sukses'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> Success reset database !!!.
                        </div>
                        "; 
                        echo("<meta http-equiv='refresh' content='2;url=reset.php'>");
                        }
                     ?>
          <h1>
            Reset Database
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-info-circle"></i> Reset</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h4><font color="#FF0000">WARNING : *</font></h4>
                                <ul>
                                    <li>Database yang sudah ter reset tidak bisa dikembalikan</li>
								    <li>Pastikan anda sudah menyimpan semua data sebelum menekan tombol reset </li>
                                </ul>
				    <br><br>
        			<table id="database" class="table table-bordered table-striped">   
                        <thead>
        					<tr>
        					    <th style="text-align:left;"><i class="fa fa-ellipsis-v"></i></th>
        						<th style="text-align:left;" >Database</th>
        						<th style="text-align:left;" >Action</th>
        						<th style="text-align:left;" ><i class="fa fa-ellipsis-v"></i></th>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        					    <td><i class="fa fa-user"></i></td>
        						<td>Siswa</td>
        						<td><button id="clot" type="button" class="btn btn-danger  btn-xs" data-target="#Modal1" data-toggle="modal"><i class="fa fa-trash"></i> reset</button></td>
        					    <td></td>
        					</tr>
        					<tr>
        					    <td><i class="fa fa-book"></i></td>
        						<td>Soal</td>
        						<td><button id="clot" type="button" class="btn btn-danger  btn-xs" data-target="#Modal2" data-toggle="modal"><i class="fa fa-trash"></i> reset</button></td>
        						<td><a href="soalbase.php"><button id="clot" type="button" class="btn btn-primary  btn-xs"><i class="fa fa-info-circle"></i> database soal</button></a></td>
        					</tr>
        					<tr>
        					    <td><i class="fa fa-pencil"></i></td>
        						<td>jawaban</td>
        						<td><button id="clot" type="button" class="btn btn-danger  btn-xs" data-target="#Modal3" data-toggle="modal"><i class="fa fa-trash"></i> reset</button></td>
        						<td><a href="ujianbase.php"><button id="clot" type="button" class="btn btn-primary  btn-xs"><i class="fa fa-info-circle"></i> database ujian aktif siswa</button></a></td>
        					</tr>
        					<tr>
        					    <td><i class="fa fa-laptop"></i></td>
        						<td>Hasil ujian</td>
        						<td><button id="clot" type="button" class="btn btn-danger  btn-xs" data-target="#Modal4" data-toggle="modal"><i class="fa fa-trash"></i> reset</button></td>
        					    <td></td>
        					</tr>
        				</tbody>
        			</table>
				</div><!-- /.box-header -->
              </div><!-- /.box -->
            </div><!-- /.col -->
        <div id="Modal1" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Reset Database Siswa</h4>
					</div>
					<div class="modal-body">
					    
						<h4><font color="#FF0000">WARNING : *</font></h4>
                                <ul>
                                    <li>Database yang sudah ter reset tidak bisa dikembalikan</li>
								    <li>Pastikan anda sudah menyimpan semua data sebelum menekan tombol reset </li>
                                </ul>
				    <br><br>
					<form action="reset/siswadelete.php" method="post" id="form1" name="form1">
				        <input type="checkbox" name="check1" value="Setuju" required ><i> centang jika anda setuju</i><br><br>
							<div class="modal-footer">
								<button id="yakin" type='submit' class='btn btn-danger'> hapus</button>
								<button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">
									batal
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="Modal2" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Reset Database Soal</h4>
					</div>
					<div class="modal-body">
					    
						<h4><font color="#FF0000">WARNING : BANK SOAL AKAN TERHAPUS SEMUA *</font></h4>
                                <ul>
                                    <li>Database yang sudah ter reset tidak bisa dikembalikan</li>
								    <li>Pastikan anda sudah menyimpan semua data sebelum menekan tombol reset </li>
                                </ul>
				    <br><br>
					<form action="reset/soaldelete.php" method="post" id="form1" name="form1">
				        <input type="checkbox" name="check1" value="Setuju" required ><i> centang jika anda setuju</i><br><br>
							<div class="modal-footer">
								<button id="yakin" type='submit' class='btn btn-danger'> hapus</button>
								<button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">
									batal
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> 
		<div id="Modal3" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Reset Database Jawaban</h4>
					</div>
					<div class="modal-body">
					    
						<h4><font color="#FF0000">WARNING : JANGAN RESET DATABASE INI KETIKA UJIAN SEDANG BERLANGSUNG *   </font></h4>
                                <ul>
                                    <li>Jawaban siswa tidak akan tersimpan jika mereset database ini ketika ujian sedang berlangsung</li>
                                    <li>Database yang sudah ter reset tidak bisa dikembalikan</li>
								    <li>Pastikan anda sudah menyimpan semua data sebelum menekan tombol reset </li>
                                </ul>
				    <br><br>
					<form action="reset/jawabandelete.php" method="post" id="form1" name="form1">
				        <input type="checkbox" name="check1" value="Setuju" required ><i> centang jika anda setuju</i><br><br>
							<div class="modal-footer">
								<button id="yakin" type='submit' class='btn btn-danger'> hapus</button>
								<button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">
									batal
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="Modal4" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Reset Database Hasil Ujian</h4>
					</div>
					<div class="modal-body">
					    
						<h4><font color="#FF0000">WARNING : HASIL UJIAN SISWA AKAN TERHAPUS SEMUA*</font></h4>
                                <ul>
                                    <li>Database yang sudah ter reset tidak bisa dikembalikan</li>
								    <li>Pastikan anda sudah menyimpan semua data sebelum menekan tombol reset </li>
                                </ul>
				    <br><br>
					<form action="reset/hasildelete.php" method="post" id="form1" name="form1">
				        <input type="checkbox" name="check1" value="Setuju" required ><i> centang jika anda setuju</i><br><br>
							<div class="modal-footer">
								<button id="yakin" type='submit' class='btn btn-danger'> hapus</button>
								<button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">
									batal
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
	<?php
		include	"navbar/content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle/bundle_script.php";
	?>
  </body>
</html>