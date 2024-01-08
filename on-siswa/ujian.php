<?php
session_start();
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-CBT Smartschool</title>
  <!-- Icon -->
  <link rel="shortcut icon" type="image/icon" href="../favio.ico">
  <!-- Library CSS -->
  <style>
    #oke {
      border-radius: 0;
      z-index: 0;
      border: 0;
      color: white;
    }
  </style>
  <?php
  include "bundle/bundle_css.php";
  ?>
  <style>
    .alert-danger {
      border-radius: 0;
      font-size: 12px;
      position: fixed;
      right: 5px;
      bottom: 0px;
      z-index: 9999;
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

    #pew {
      background-repeat: no-repeat;
      background-position: -320px -320px, 0 0;

      background-image: -webkit-linear-gradient(top left,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%);
      background-image: -moz-linear-gradient(0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%);
      background-image: -o-linear-gradient(0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%);
      background-image: linear-gradient(0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%);

      -moz-background-size: 250% 250%, 100% 100%;
      background-size: 250% 250%, 100% 100%;

      -webkit-transition: background-position 0s ease;
      -moz-transition: background-position 0s ease;
      -o-transition: background-position 0s ease;
      transition: background-position 0s ease;
    }

    #pew:hover {
      background-position: 0 0, 0 0;

      -webkit-transition-duration: 0.5s;
      -moz-transition-duration: 0.5s;
      transition-duration: 0.5s;
    }

    #pow {
      background-color: #222d32;
      background-repeat: no-repeat;
      background-position: -320px -320px, 0 0;

      background-image: -webkit-linear-gradient(top left,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%);
      background-image: -moz-linear-gradient(0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%);
      background-image: -o-linear-gradient(0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%);
      background-image: linear-gradient(0 0,
          rgba(255, 255, 255, 0.2) 0%,
          rgba(255, 255, 255, 0.2) 37%,
          rgba(255, 255, 255, 0.8) 45%,
          rgba(255, 255, 255, 0.0) 50%);

      -moz-background-size: 250% 250%, 100% 100%;
      background-size: 250% 250%, 100% 100%;

      -webkit-transition: background-position 0s ease;
      -moz-transition: background-position 0s ease;
      -o-transition: background-position 0s ease;
      transition: background-position 0s ease;
    }

    #pow:hover {
      background-position: 0 0, 0 0;

      -webkit-transition-duration: 0.5s;
      -moz-transition-duration: 0.5s;
      transition-duration: 0.5s;
    }

    .sidebar-form {
      border: 0px !important;
    }

    #on {
      animation: blink 1s ease-in infinite;
    }

    @keyframes blink {

      from,
      to {
        opacity: 1
      }

      50% {
        opacity: 0
      }
    }

    .danger {
      pointer-events: none;
      cursor: not-allowed;
      text-decoration: none;
      color: #222d32;
      border-radius: 0;
      text-decoration: none;
    }

    .danger:hover {
      pointer-events: none;
      cursor: not-allowed;
      text-decoration: none;
      color: #222d32;
      border-radius: 0;
      text-decoration: none;
    }

    .danger:focus {
      pointer-events: none;
      cursor: not-allowed;
      text-decoration: none;
      color: #222d32;
      border-radius: 0;
      text-decoration: none;
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
          <h5 style="color:white">
            <?php echo $kelas; ?>
          </h5>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <h5 style="color:white">
          <?php echo $nama; ?>
        </h5>
      </form>
      <div class="user-panel">
        <div class="pull-left image">
          <a href="profil.php" data-toggle="tooltip" data-placement="right" title="Profil"><button id="cog"
              class="btn btn-default btn-md"><i class="fa fa-user"></i></button></a>
          <!-- <a data-toggle="modal" data-target="#about" data-placement="right" data-toggle="tooltip" title="about aplication"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-info-circle"></i></button></a> -->
          <a href="logout.php" data-placement="right" data-toggle="tooltip" title="log out"><button id="cog"
              class="btn btn-default btn-md"><i class="fa fa-sign-out"></i></button></a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
        <li class="active"><a href="ujian.php"><i class="fa fa-laptop"></i><span>Ujian</span></a></li>
        <li><a href="nilai.php"><i class="fa fa-book"></i><span>Daftar Nilai</span></a></li>
      </ul>
    </section>

    <!-- /.sidebar -->
  </aside>
  <?php
  if (!empty($_GET['reset'])) {
    echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> Login siswa aktif !!! silahkan reset login.
                        </div>
                        ";
  }
  ?>
  <?php
  if (!empty($_GET['kelas'])) {
    echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> Soal tidak sesuai kelas anda !!!
                        </div>
                        ";
  }
  ?>
  <?php
  if (!empty($_GET['gagal'])) {
    echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> Soal tidak aktif !!!
                        </div>
                        ";
  }
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ujian Aktif<i class="fa fa-laptop"></i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li><i class="fa fa-laptop"></i> Index Ujian</li>
      </ol>
    </section>
    <!-- Widgets -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div>
                <div id="responsecontainer"></div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- ./wrapper -->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div></div>
          </div>
        </div>
      </div>
    </section>
  </div><!-- /.content-wrapper -->
  <script type="text/javascript">
    function toggle_visibility(id) {
      var e = document.getElementById(id);
      if (e.style.display == 'none')
        e.style.display = 'block';
      else
        e.style.display = 'none';
    }
    //-->
  </script>
  <?php
  include "navbar/content_footer.php";
  ?>
  <?php
  include "../on-admin/bundle/monitor_script.php";
  ?>
  </body>

</html>