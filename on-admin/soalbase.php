<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>E-CBT Smartschool</title>
	<!-- Library CSS -->
	<link href="../js/sweetalert.css" rel="stylesheet" type="text/css"/>
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
    #clot {
    border-radius:0;
    margin:0;
     }
     #cloti {
    border-radius:0;
    width:40px;
    padding:0;
    margin:0;
    border-right:none;
    border-bottom:none;
    border-left:none;
    border-color:#333232;
    -moz-box-shadow:    inset 0 0 10px #000000;
    -webkit-box-shadow: inset 0 0 10px #000000;
    box-shadow:         inset 0 0 10px #000000;
     }
     #clot3d {
        border-radius:0;
        width:40px;
        padding:0;
        margin:0;
        border:solid 1px;
        border-right:none;
        border-top:none;
        border-color:#333232;
        box-shadow: 0px  5px 15px grey;
}
#clot3d:hover {
        border-radius:0;
        width:40px;
        padding:0;
        margin:0;
        border:solid 1px;
        border-bottom:none;
        border-right:none;
        border-top:none;
        border-color:grey;
        -moz-box-shadow:    inset 0 0 10px #000000;
        -webkit-box-shadow: inset 0 0 10px #000000;
        box-shadow:  
}
 #clot3d2 {
        border-radius:0;
        width:40px;
        padding:0;
        margin:0;
        border:solid 1px;
        border-right:none;
        border-top:none;
        border-color:#333232;
        box-shadow: 0px  5px 15px grey;
}
#clot3d2:hover {
        border-radius:0;
        width:40px;
        padding:0;
        margin:0;
        border:solid 1px;
        border-bottom:none;
        border-right:none;
        border-top:none;
        border-left:none;
        border-color:grey;
        -moz-box-shadow:    inset 0 0 10px #000000;
        -webkit-box-shadow: inset 0 0 10px #000000;
        box-shadow:         inset 0 0 10px #000000;
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
					<!-- <li><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li>	 -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Data Bank Soal</h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-clock-o"></i> Data Bank Soal</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div style="overflow-x:auto;" id="printableArea">
                <br></br>
					<table id="data1" class="table table-hover table-striped">
					<?php
					include "page/dt_soalbase.php";
					?>
					</table>
				</div>
            </div>
          </div>
          <h4><font color="#FF0000">Keterangan: *</font></h4>
                                <ul>
                                <li>JANGAN menghapus data jika siswa sedang melakukan ujian</li>
								<li>Jawaban siswa tidak akan tersimpan jika mrnghapus data ketika ujian sedang berlangsung</li>
								<li>refresh halaman (F5) untuk memperbarui data</li>
                                </ul>  
        </div>
		<!-- Modal Popup untuk delete--> 
		<div class="modal" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">yakin menghapus ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
    </div><!-- /.content-wrapper -->
    <?php
		include	"navbar/content_footer.php";
	?>
	<!-- Library Scripts -->
	<?php
		include "bundle/bundle_script.php";
	?>
  </body>
</html>
