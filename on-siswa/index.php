<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-CBT Smartschool</title>
	<!-- Library CSS -->
	<?php
		include "bundle/bundle_css.php";
	?>
	<style>
	.alert-danger {
  border-radius:0;
  font-size:12px; 
  position: fixed;
  right: 5px;
  bottom: 0px;
  z-index:9999;
  }
    #cog {
    border-radius:0; 
    background-color:#222d32;
    color:white;
    border:0;
    }
    #cog:hover {
    border-radius:0; 
    background-color:#ff8f0a;
    color:white;
    border:0;
    }
    .sidebar-form {
        border:0px !important;
    }
     #on {
	        animation: blink 1s ease-in infinite;
	    }

@keyframes blink {
  from, to { opacity: 1 }
  50% { opacity: 0 }
}
	</style>
  </head>
<?php
include "tema/tema.php";
?>
    <div class="wrapper">
      <?php
        include "navbar/content_header.php";  
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../aset/foto/avatar.gif" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
			  <a href="#"><i id='on' class='fa fa-circle' style='color:#90ff00;font-size:10px;'></i> Online</a>
			  <h5 style="color:white"><?php echo $kelas;?></h5>
			</div>
		  </div>
		  <form action="#" method="get" class="sidebar-form">
                 <h5 style="color:white"><?php echo $nama;?></h5>
            </form>
		  <div class="user-panel">
            <div class="pull-left image">
			<a href="profil.php" data-toggle="tooltip" data-placement="right" title="Profil"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-user"></i></button></a>
			<!-- <a data-toggle="modal" data-target="#about" data-placement="right" data-toggle="tooltip" title="about aplication"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-info-circle"></i></button></a> -->
            <a href="logout.php" data-placement="right" data-toggle="tooltip" title="log out"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-sign-out"></i></button></a>
            </div>
          </div>  

          <ul class="sidebar-menu">
                    <li class="active"><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
                    <li><a href="ujian.php"><i class="fa fa-laptop"></i><span>Ujian</span></a></li>
					<li><a href="nilai.php"><i class="fa fa-book"></i><span>Daftar Nilai</span></a></li>
          </ul>
        </section>

        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-home"></i> Dashboard</li>
          </ol>
        </section>
		<?php 
                    if (!empty($_GET['lock'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> Daftar nilai terkunci !!! silahkan hubungi proktor.
                        </div>
                        "; 
                        }
                    ?>
		<!-- Content -->
	    <section class="content">
          <div class="row">
									<!-- card -->
                                    <div class="box-body">
                                       <div class="col-lg-3 col-md-3 col-xs-6">
                                          <div class="panel panel-primary">
                                             <div class="panel-heading">
                                                <div class="row">
                                                   <div class="col-xs-3"><i class="fa fa-laptop fa-5x"></i></div>
                                                   <div class="col-xs-9 text-right">
                                                      <div class="huge"></div>
                                                      <div>Ujian Aktif</div>
                                                   </div>
                                                </div>
                                             </div>
                                             <a href="ujian.php" style="color:white;">
                                                <div class="panel-footer" style="background-color:#1d4e77;border:0;">
                                                   <span class="pull-left"></span>
                                                   <span class="pull-right">enter <i class="fa fa-arrow-circle-right"></i></span>
                                                   <div class="clearfix"></div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>
                                    
                                       <!-- Statistik Siswa -->
                                       <div class="col-lg-3 col-md-3 col-xs-6">
                                          <div class="panel panel-success">
                                             <div class="panel-heading">
                                                <div class="row">
                                                   <div class="col-xs-3"><i class="fa fa-user fa-5x"></i></div>
                                                   <div class="col-xs-9 text-right">
                                                      <div class="huge"></div>
                                                      <div>Profil</div>
                                                   </div>
                                                </div>
                                             </div>
                                             <a href="profil.php" style="color:white;">
                                                <div class="panel-footer" style="background-color:#2b5918;border:0;">
                                                   <span class="pull-left"></span>
                                                   <span class="pull-right">enter <i class="fa fa-arrow-circle-right"></i></span>
                                                   <div class="clearfix"></div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>
                                    
                                       <!-- Statistik Mapel -->
                                       <div class="col-lg-3 col-md-3 col-xs-6">
                                          <div class="panel panel-warning">
                                             <div class="panel-heading">
                                                <div class="row">
                                                   <div class="col-xs-3">
                                                      <i class="fa fa-book fa-5x"></i>
                                                   </div>
                                                   <div class="col-xs-9 text-right">
                                                      <div class="huge"></div>
                                                      <div>Nilai</div>
                                                   </div>
                                                </div>
                                             </div>
                                             <a href="nilai.php" style="color:white;">
                                                <div class="panel-footer" style="background-color:#ed4e04;border:0;">
                                                   <span class="pull-left"></span>
                                                   <span class="pull-right">enter <i class="fa fa-arrow-circle-right"></i></span>
                                                   <div class="clearfix"></div>
                                                </div>
                                             </a>
                                          </div>
                                       </div>
                                    
                                       <!-- Statistik Soal -->
                                       <!-- <div class="col-lg-3 col-md-3 col-xs-6">
                                          <div class="panel panel-danger">
                                             <div class="panel-heading">
                                                <div class="row">
                                                   <div class="col-xs-3">
                                                      <i class="fa fa-info fa-5x"></i>
                                                   </div>
                                                   <div class="col-xs-9 text-right">
                                                      <div class="huge"></div>
                                                      <div>Tentang Aplikasi</div>
                                                   </div>
                                                </div>
                                             </div>
                                             <a href="" data-toggle="modal" data-target="#about" style="color:white;">
                                                <div class="panel-footer" style="background-color:#af0505;border:0;">
                                                   <span class="pull-left"></span>
                                                   <span class="pull-right">enter <i class="fa fa-arrow-circle-right"></i></span>
                                                   <div class="clearfix"></div>
                                                </div>
                                             </a>
                                          </div>
                                       </div> -->
                                   </div>
<div class="box-body">                                   <!-- End of card -->
<ul class="timeline" style="width: 100%; height: 350px; overflow-y: auto;">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-white">
            <i class="fa fa-info-circle"></i> tutorial cara mengikuti ujian
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="fa fa-envelope bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 1</span>

            <h3 class="timeline-header"><a href="#">Langkah pertama</a> ...</h3>

            <div class="timeline-body">
                Pilih menu ujian.
            </div>

            <div class="timeline-footer">
                <a href="ujian.php" class="btn btn-primary btn-xs">Menu Ujian</a>
            </div>
        </div>
    </li>
    
    <li>
        <!-- timeline icon -->
        <i class="fa fa-envelope bg-yellow"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 2</span>

            <h3 class="timeline-header"><a href="#">Langkah kedua</a> ...</h3>

            <div class="timeline-body">
                Pilih salah satu soal ujian yang aktif, klik tombol mengerjakan.<br>
                hubungi proktor atau admin jika tidak ada soal aktif.
            </div>

            <div class="timeline-footer">
            </div>
        </div>
    </li>
    
     <li>
        <!-- timeline icon -->
        <i class="fa fa-user bg-red"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 3</span>

            <h3 class="timeline-header"><a href="#">Langkah ketiga</a> ...</h3>

            <div class="timeline-body">
                periksa data diri dan data soal lalu centang beberapa syarat mengerjakan soal...
            </div>

            <div class="timeline-footer">
            </div>
        </div>
    </li>
    
    <li>
        <!-- timeline icon -->
        <i class="fa fa-check bg-green"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 4</span>

            <h3 class="timeline-header"><a href="#">Langkah keempat</a> ...</h3>

            <div class="timeline-body">
                Soal siap dikerjakan...<br>
                Pastikan soal sudah dikerjakan semua dengan teliti sebelum menyelesaikan ujian...<br>
                Tombol selesai ujian ada pada nomor soal terakhir.
            </div>

            <div class="timeline-footer">
            </div>
        </div>
    </li>
    
    <li>
        <!-- timeline icon -->
        <i class="fa fa-edit bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 5</span>

            <h3 class="timeline-header"><a href="#">Langkah kelima</a> ...</h3>

            <div class="timeline-body">
                Daftar nilai hasil ujian bisa dilihat di menu "daftar nilai" jika menu ini dibuka oleh proktor atau admin..<br>
                jika menu ini ditutup oleh proktor atau admin daftar nilai tidak bisa dilihat..
            </div>

            <div class="timeline-footer">
                <a href="nilai.php" class="btn btn-primary btn-xs">Menu Daftar nilai</a>
            </div>
        </div>
    </li>
</div>
</ul>
		 </section>		
    </div><!-- /.content-wrapper -->
    <?php
		include	"navbar/content_footer.php";
	?>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/adminlte.min.js"></script>
  </body>
</html>
