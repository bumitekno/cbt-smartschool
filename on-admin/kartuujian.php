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
	<?php
		include "bundle/bundle_css.php";
	?>
	<style>
	#border {
    margin: auto;
    border: 1px solid #636363;
    border-width:5px;  
    border-style:double;
    margin-top: 18px;
    margin-bottom: 19px;
    margin-right: 5px;
    margin-left: 15px;
    width: 47%;
    }
    div.table-responsive {
    margin: auto;
    margin-top: 22px;
    margin-bottom: 23px;
    margin-right: 5px;
    margin-left: 5px;
    overflow-x: scroll;
    width: 47%;
    }
    #mySelect { 
    width: 200px;
    }
    #tu { 
    border: 0;
    border-left: 3px solid red;
    outline: 0;
    border-radius: 0px;
    }
    #ti { 
    outline: 1;
    border-radius: 0px;
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
    #pan {
        width:240px;
        border-radius:0;
    }
    .panel-heading {
        border-radius:0;
    }
    #clot {
        border-radius:0;
    }
    #ndelik {
        display:none;
    }
    #ndelik1 {
        display:block;
    }
    #plotro {
        float:right;
        margin-top:-85px;
    }
    .panel {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
				<li><a href="siswa.php"><i class="fa fa-graduation-cap"></i><span> Management Mahasiswa</span></a></li>

				<li class="treeview active">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span> Management Ujian</span>
                      <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                  </a>
                  <ul class="treeview-menu">
                            <li><a href="soal.php"><i class="fa fa-book"></i> Bank Soal</a></li>
    						<li class="active" id="sub"><a href="kartuujian.php"><i class="fa fa-print"></i><span> Kartu Peserta</span></a></li>
    						<li id="sub"><a href="daftarhadir.php"><i class="fa fa-print"></i><span> Daftar Hadir</span></a></li>
    						<li id="sub"><a href="beritaacara.php"><i class="fa fa-print"></i><span> Berita Acara</span></a></li>
    						<li id="sub"><a href="up-gbrsoal.php"><i class="fa fa-upload"></i><span> Upload Gbr / Audio Soal</span></a></li>
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
          <h1><i class="fa fa-print"></i> Cetak Kartu Peserta</h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-print"></i> Cetak Kartu</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header"></div><!-- /.box-header -->
                            <div>
                            <br>
                					<?php
                					include "page/dt_kartukelas.php";
                					?>
            				</div>

        			    </div>
        		    </div>
        	    </div>
            
         <div id="Modalprint" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Kartu Mahasiswa</h4><br>
					<button id="clot" class="btn btn-default" float:right onclick="printDiv('printableArea1')"><i class="fa fa-print"></i> Cetak </button> 
                    <br><h6><i>Gunakan kertas Letter (8 1/2 X 11 in)</i></h6>
					</div>
					<div class="modal-body">
					 <div class="table-responsive" style="width: 100%; height: 1000px; width: 100%; overflow-y: scroll; overflow-x: scroll;">
            				    <div class="row" id="printableArea1">
                					<?php
                					include "page/dt_kartu.php";
                					?>
            				    </div>
            				</div>
                	</div>
				</div>
			</div>
		</div>	
	</section><!-- /.content -->
	</div>
    
            <?php
		include	"navbar/content_footer.php";
	?>
	<!-- Library Scripts -->
		<?php
		include "bundle/bundle_script.php";
	?>
    </div>
  </body>
</html>
