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
				             header('location:index.php?gagal=1');
				             exit;
				        }
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>SYNC</title>
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
      <aside class="main-sidebar">
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

        </section>

        <!-- Main content -->
    <section class="content">
		<div class="row">
            <div class="col-xs-12">
              <div class="box">
				   <div class="box-header">
				       <h4>
          </h4>
				   <?php 
		                    if(isset($_GET['pesan'])){
			                if($_GET['pesan'] == "sukses"){
				            echo    "
			<div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-check'></i> Success Syncron soal !!!.
            </div>";
                            }}?>
                    <?php 
		                    if(isset($_GET['pesan'])){
			                if($_GET['pesan'] == "patch"){
				            echo    "
			<div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-check'></i> Success Patch database !!!.
            </div>";
                            }}?>
                            <div class='col-lg-4'>
                                            <div class='inner'>
                                        <h1><b>SOAL</b></h1>
                                            </div>
                                                <form action="soalsql.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <label> Upload database soal</label>
					                <div class="input-group">
										<input type="file" id="files" name="files" required multiple/>
										<button id="clot" class="btn btn-sm btn-flat btn-success" type="submit" name="submit_file" value="Submit"><i class="fa fa-cog fa-spin" style="font-size:15px"></i>  Proses</button> 
									</div>
					        
					        </form>
                            </div>
                            <div class='col-lg-4'>
                                            <div class='inner'>
                                        <h1><b>UJIAN</b></h1>
                                            </div>
                                                <form action="ujiansql.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data" name="form4" id="form4">
                                <label> Upload database soal</label>
					                <div class="input-group">
										<input type="file" id="files" name="files" required multiple/>
										<button id="clot" class="btn btn-sm btn-flat btn-success" type="submit" name="submit_file" value="Submit"><i class="fa fa-cog fa-spin" style="font-size:15px"></i>  Proses</button> 
									</div>
					        
					        </form>
                            </div>
							<div class='col-lg-4'>
                                            <div class='inner'>
                                        <h1><b>GAMBAR</b></h1>
                                            </div>
                                                <form action="gambarsql.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data" name="form2" id="form2">
                                <label> Upload database gambar</label>
					                <div class="input-group">
										<input type="file" id="files" name="files" required />
										<button id="clot" class="btn btn-sm btn-flat btn-success" type="submit" name="submit_file" value="Submit"><i class="fa fa-cog fa-spin" style="font-size:15px"></i>  Proses</button> 
									</div>
					        </form>
                            </div>
					
                            <div class='col-lg-4'>
                                            <div class='inner'>
                                        <h1><b>SISWA</b></h1>
                                            </div>
                                                <form action="siswasql.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data" name="form3" id="form3">
                                <label> Upload database siswa</label>
					                <div class="input-group">
										<input type="file" id="files" name="files" required />
										<button id="clot" class="btn btn-sm btn-flat btn-success" type="submit" name="submit_file" value="Submit"><i class="fa fa-cog fa-spin" style="font-size:15px"></i>  Proses</button> 
									</div>

					        </form>
                            </div>      

			  </div>
			</div>
		</div>
	</section>
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