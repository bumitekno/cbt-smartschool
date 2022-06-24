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
    <title>Update</title>
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
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #000;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
        .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
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
<div class="preloader">
  <div class="loading">
    <i class="fa fa-refresh fa-spin" style="font-size:54px"></i>
  </div>
</div>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Aplikasi
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-info-circle"></i> Update Aplikasi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <div class="row">
            <div class="col-xs-12">
              <div class="box">
           <div class="box-header">
          <?php
          $handle = fopen("https://smpn38sby.sch.id/update_cbtschool_v6/versi.txt", "rb");
          if (FALSE === $handle) {
            exit("Gagal terhubung dengan server pusat");
          }

          $contents = '';

          while (!feof($handle)) {
            $contents .= fread($handle, 8192);
          }
          fclose($handle);
                $handle3 = fopen("https://smpn38sby.sch.id/update_cbtschool_v6/size.txt", "rb");
          if (FALSE === $handle3) {
            exit("Gagal terhubung dengan server pusat");
          }

          $contents3 = '';

          while (!feof($handle3)) {
            $contents3 .= fread($handle3, 8192);
          }
          fclose($handle3);
        $handle2 = fopen("versi/aktif/versi.txt", "rb");
          if (FALSE === $handle2) {
            exit("Failed to open stream to URL");
          }

          $contents2 = '';

          while (!feof($handle2)) {
            $contents2 .= fread($handle2, 8192);
          }
          fclose($handle2);
          $hasil=$contents-$contents2;
          if ($hasil > 0)
            {
                       $ver='
                       
                       
                       
                       <div style="background-color:#e6eaf2;" class="alert alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h5><i class="icon fa fa-info-circle"></i> New update available</h5><h4 style="color:red;"> Ver.'.$contents.'</h4><h6 style="color:black;"> size '.$contents3.'</h6>
                                                
                        <br>                      
                        What news ?
              <ul>
                  <li>Performance issue fixed</li>
                            <li>Bugs fixed</li>
                            <li>Update menu</li>
                        </ul>
                        <a style="float:right;" href="download.php?filer='.$contents.'">
            <button style="border-radius:30px;" class="btn btn-warning btn-flat"><i class="fa fa-download" aria-hidden="true"></i> Update here</button></a>
                        </div>
                        <br><br>';
                      }
          else 
            {
                       $ver='
                       
                       <button class="btn btn-default btn-flat"><i class="fa fa-info-circle" aria-hidden="true"></i> No updates available</button>
                       <br><br><b>CBT E-School version '.$contents.'</b>
                       <br>
          What news
              <ul>
                  <li>Performance issue fixed</li>
                            <li>Bugs fixed</li>
                            <li>Update menu</li>
                        </ul>
                        <div class="col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i> you re running the most up-to-date version !!!.
            </div>
                        ';
                       
                      }

          echo $ver;
          ?>
          
          </div>
          <br><br>
          <h4><font color='#FF0000'>Keterangan: *</font></h4>
                            <ul>
                            <li>Pastikan koneksi internet anda stabil ketika proses update</li>
                            <br>
                            </ul>
              </div>
            </div>
          </div>
          </section>
    </div><!-- /.content-wrapper -->
  <?php
    include "navbar/content_footer.php";
  ?>
    </div><!-- ./wrapper -->
  <!-- Library Scripts -->
  <?php
    include "bundle/bundle_script.php";
  ?>
  <script>
$(".preloader").delay(200).fadeOut();
</script>
  </body>
</html>