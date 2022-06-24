<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
if($admin_su == 1)
				        {
				             $username=$_SESSION['admin'];
					   
				        }
				         else if ($admin_su == 0)
				        {
				             $username=$_SESSION['admin'];
					   
				        }
				        else
				        {
				             header('location:hasiltest.php?gagal=1');
				             exit;
				        }
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>E - School 38</title>
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
    #tutu {
        margin-top:-25px;
        padding:0;
    }
    hr.style2 {
	border-top: 3px double #8c8b8b;
    }
    hr.style1 {
	height: 10px;
	border: 0;
	box-shadow: 0 10px 10px -10px #8c8b8b inset;
    }
    .max {
        max-height:400px;
        width:auto;
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
                    <span>Management Ujian</span>
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
				    <li  class="active"><a href="hasiltest.php"><i class="fa fa-area-chart"></i><span> Hasil Test</span></a></li>
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
          <h1>Analisa Soal</h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-search"></i> Analisa Soal</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
				</div><!-- /.box-header -->
                <div class="box-body">
                  <a href="hasiltest.php"><button type="button" class="btn btn-warning" data-toggle=""><i class="fa fa-angle-left"></i> Kembali</button></a>  
                  <button class="btn btn-default" float:right onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Cetak </button>
                  <br><br>
				<div style="overflow-x:auto;" id="printableArea">
					<?php
					include "page/dt_analisa_soal.php";
					?>
				</div>
		</section><!-- /.content -->
	
	
		
    </div><!-- /.content-wrapper -->
    <?php
		include	"navbar/content_footer.php";
	?>
	<!-- Library Scripts -->
		<?php
		include "bundle/soal_script.php";
	?>
  </body>
</html>
