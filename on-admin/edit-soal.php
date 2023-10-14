<?php
session_start();
include('../koneksi/koneksi.php');
include('conn/cek.php');
include('conn/fungsi.php');
if ($admin_su == 1) {
  $username = $_SESSION['admin'];

} else if ($admin_su == 0) {
  $username = $_SESSION['admin'];

} else {
  header('location:soal.php?gagal=1');
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>E-CBT Smartschool</title>
  <!-- Library CSS -->
  <link href="../js/sweetalert.css" rel="stylesheet" type="text/css" />
  <?php
  include "bundle/bundle_css.php";
  ?>
  <style>
    #formgroupophidden {
      display: none;
    }

    #formgroupopshow {
      display: block;
    }

    #clot {
      border-radius: 0;
    }

    #clot2 {
      border-radius: 0;
      margin-right: -5px;
    }

    #cog {
      border-radius: 0;
      background-color: #222d32;
      color: white;
      border: 0;
    }

    #cog:hover {
      border-radius: 0;
      background-color: #ff8f0a;
      color: white;
      border: 0;
    }

    #formgroup {
      border: solid 1px;
      border-color: grey;
    }

    #del {
      height: 210px;
    }

    .progress {
      background-color: white;
      position: relative;
      border: 0px solid #ddd;
      padding: 1px;
      border-radius: 0px;
    }

    .bar {
      background-color: #26a52e;
      width: 0%;
      height: 30px;
      border-radius: 0px;
    }

    .percent {
      position: absolute;
      display: inline-block;
      color: white;
      top: 1px;
    }
  </style>
  <style>
    .alert-success {
      border-radius: 0;
      width: 100%;
      font-size: 12px;
      z-index: 999999999999;
    }

    @-webkit-keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @-moz-keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .fade-in {
      opacity: 0;
      /* make things invisible upon start */
      -webkit-animation: fadeIn ease-in 1;
      /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
      -moz-animation: fadeIn ease-in 1;
      animation: fadeIn ease-in 1;

      -webkit-animation-fill-mode: forwards;
      /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
      -moz-animation-fill-mode: forwards;
      animation-fill-mode: forwards;

      -webkit-animation-duration: 1s;
      -moz-animation-duration: 1s;
      animation-duration: 1s;
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
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-book"></i>
            <span> Management Ujian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="soal.php"><i class="fa fa-book"></i> Bank Soal</a></li>
            <li id="sub"><a href="kartuujian.php"><i class="fa fa-print"></i><span> Kartu Peserta</span></a></li>
            <li id="sub"><a href="daftarhadir.php"><i class="fa fa-print"></i><span> Daftar Hadir</span></a></li>
            <li id="sub"><a href="beritaacara.php"><i class="fa fa-print"></i><span> Berita Acara</span></a></li>
            <li id="sub"><a href="up-gbrsoal.php"><i class="fa fa-upload"></i><span> Upload Gbr / Audio Soal</span></a>
            </li>
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
      <h1>Edit Soal</h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li><i class="fa fa-pencil-square-o"></i> Edit Soal</li>
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
              <a href="soal.php"><button id="clot" type="button" class="btn btn-default" data-toggle=""><i
                    class="fa fa-angle-left"></i> Kembali ke Bank Soal</button></a>
              <br><br>

              <div id="printableArea">
                <table id="data5" class="table table-hover table-striped">
                  <?php
                  include "page/dt_edit_soal.php";
                  ?>
                </table>
              </div>
    </section><!-- /.content -->

    <!-- Modal Popup siswa Edit -->
    <div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>
    <div id="ModalEditDosen3" class="modal" tabindex="-1" role="dialog"></div>

    <!-- Modal Popup untuk delete-->
    <div class="modal" id="modal_delete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">yakin menghapus soal ini ?</h4>
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
  include "navbar/content_footer.php";
  ?>
  <!-- Library Scripts -->
  <?php
  include "bundle/edit_soal_script.php";
  ?>

  </body>

</html>