<?php
session_start();
include('../koneksi/koneksi.php');
include('conn/cek.php');
include('conn/fungsi.php');
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
    #pan {
      border-radius: 0px;
    }

    #reset {
      outline: 1;
      border-radius: 0px;
    }

    #reset1 {
      outline: 1;
      border-radius: 0px;
    }

    #alert4 {
      outline: 1;
      border-radius: 0px;
    }

    #reset2 {
      outline: 0;
      border: 1;
      border-radius: 0px;
      border-color: #375a96;
      background-color: #ffffff;
      color: black;
    }

    #search {
      outline: 0;
      border: 1;
      border-radius: 0px;
      border-color: #375a96;
      background-color: #375a96;
      color: white;
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

        <li class="active"><a href="monitor.php"><i class="fa fa-laptop"></i><span> Monitoring Ujian</span></a></li>
        <!-- <li><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li>	 -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-search"></i> Monitoring Ujian</h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li><i class="fa fa-laptop"></i> Monitoring Ujian</li>
      </ol>
    </section>

    <center><i class="fa fa-angle-double-left"></i> <i class="fa fa-cog fa-spin" style="font-size:14px"></i> <i
        class="fa fa-angle-double-right"></i></center>
    <div class="row">
      <div class="box">
        <div class="box-header">
          <div class="col-lg-12">
            <div id="responsecontainer"></div>
          </div>
        </div>
        <div class="box-body">
          <h4>
            <font color="#FF0000">&emsp; Keterangan: *</font>
          </h4>
          <ul>
            <li>tunggu sekitar 1 menit setelah siswa aktif mengerjakan</li>
          </ul>
          <div class="btn-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <button id="search" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#demo"><i
                class="fa fa-search"></i></button>
            <button id="reset2" class="btn btn-success" type="button" data-toggle="collapse" data-target="#demo">Cari
              Siswa aktif.... &emsp;&emsp;</button>
            <br><br>
            <div id="demo" class="collapse table-responsive">
              <br>
              <?php
              include "dt_monitorujian.php";
              ?>
            </div>
          </div>
          <br><br>
          &emsp;<button id="reset" class="btn btn-default" type="button" data-toggle="collapse"
            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-trash" aria-hidden="true"></i> RESET ALL
          </button>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <div class="box-header">
                &emsp;Yakin ingin reset semua Siswa!!!
                <br>
                <br>
                &emsp;<a href="page/siswa_reset_all.php"><button id="alert4" class="btn btn-danger" type="button"><i
                      class="fa fa-delete"></i> Reset</button>
                </a> <button id="reset1" class="btn btn-success" type="button" data-toggle="collapse"
                  data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  batal
                </button>
              </div>
            </div>
          </div>

        </div>
        </section><!-- /.content -->
        <!-- Modal Popup untuk delete-->
        <div class="modal" id="modal_delete">
          <div class="modal-dialog modal-sm">
            <div class="modal-content" style="margin-top:100px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">yakin mereset siswa ini ?
                  <?php echo $ar['jumlahsoal']; ?>
                </h4>
              </div>
              <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="siswa_reset_login.php" class="btn btn-danger" id="delete_link">Reset</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- /.content-wrapper -->
<script type="text/javascript">
  function toggle_visibility(id) {
    var e = document.getElementById(id);
    if (e.style.display == 'none')
      e.style.display = 'block';
    else
      e.style.display = 'none';
  }
</script>
<?php
include "navbar/content_footer.php";
?>
<!-- Library Scripts -->
<?php
include "bundle/monitor_script.php";
?>
</body>

</html>