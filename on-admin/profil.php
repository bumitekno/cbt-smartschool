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
    <?php
        include "bundle/profil.css.php";
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
    </style>
</head>
<?php
include "tema/tema.php";
?>
    <div class="wrapper">
<?php
        include 'navbar/content_header.php';?>
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
                <!-- <li><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li>     -->
          </ul>
        </section>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
         <h1>
            Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-user-secret"></i> Profil</li>
          </ol>
        </section>
        <!-- Main content -->
<!--update profil -->
<section class="content">
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-user"></i> Profil</a></li>
              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-edit"></i> Edit Profil</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card hovercard">
                            <div class="cardheader">
                            </div>
                            <?php
                                    $qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
                                    if($qq == false){
                                        die ("Terjadi Kesalahan : ". mysqli_error($konek));
                                    }
                                    while ($xx = mysqli_fetch_array ($qq)){
                                    ?>
                            <div class="avatar">
                                <img alt="" src="../aset/foto/<?php echo $xx['logo'];?>">
                            </div>
                            <?php }?>
                            <div class="info">
                                <div class="title">
                                    <a target="_blank" href="#"><?php echo $nama; ?></a>
                                </div>
                                <br>
                                <div class="desc">Jabatan</div>
                                <div><h4><b><?php echo $jabatan;?></b></h4></div>
                                <div class="desc">Username</div>
                                <div><h4><b><?php echo $nip;?></b></h4></div>
                                <div class="desc">Password</div>
                                <div style="display: none;" id="hiddenText"><h4><b><?php echo $pass;?></b></h4></div>
                                <a href="#" onclick="$('#hiddenText').show(); return false;">  <i class="fa fa-eye"> Lihat password</i></a></p>
                            </div>
                            <div class="bottom">
                                <a class="btn btn-primary btn-twitter btn-sm" target="_blank" href="<?php echo $instagram;?>"><i class="fa fa-instagram"></i></a>
                                <!-- <a class="btn btn-danger btn-sm" rel="publisher" target="_blank" href="<?php echo $youtube;?>"><i class="fa fa-youtube"></i></a> -->
                                <a class="btn btn-success btn-sm" rel="publisher" target="_blank" href="tel:<?php echo $phone;?>"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <div class="tab-pane" id="tab_2">
              <div class="row">
               <div class="col-md-6">
                <form action="page/profil_edit.php" enctype="multipart/form-data" method="post">
                            <input name="id" type="hidden" value="<?php echo $r["id"]; ?>"/>
                            <input name="jabatan" type="hidden" value="<?php echo $jabatan;?>"/>
                            <input name="nip" type="hidden" class="form-control" value="<?php echo $nip;?>"/>
                            <div class="form-group">
                                <label>Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input name="nama" type="text" placeholder="Nama" class="form-control"  value="<?php echo $nama; ?>" required />
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-sign-in"></i>
                                        </div>
                                        <input id="password" name="pass" type="password" placeholder="new password" class="form-control" value="<?php echo $pass;?>" required />
                                        </div>
                            </div>
                            <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-sign-in"></i>
                                        </div>
                                        <input id="confirm_password" name="pass" type="password" class="form-control" placeholder="confirm password" value="<?php echo $pass;?>" required />
                                        </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-whatsapp"></i>
                                        </div>
                                        <input name="phone" type="text" class="form-control" placeholder="+6281XXXXXXXX" value="<?php echo $phone;?>" required />
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-instagram"></i>
                                        </div>
                                        <input name="instagram" type="text" placeholder="https://www.instagram.com/XXXXX" class="form-control" value="<?php echo $instagram;?>" required />
                                    </div>
                            </div>
                            <!-- <div class="form-group">
                                <label>Youtube</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-youtube"></i>
                                        </div>
                                        <input name="youtube" type="text" class="form-control" placeholder="https://www.youtube.com/XXXX" value="<?php echo $youtube;?>" required />
                                    </div>
                            </div> -->
                        </div>
                    </div>      
                    <div class="modal-footer">
                        <button id="" class="btn btn-success" type="submit">
                            Update Profil
                        </button>
                    </div>
            </div>
        </div>
    </div>
</section>

</div><!-- ./wrapper -->
<?php
include "navbar/content_footer.php";
include "bundle/profil_script.php";
?>
<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords tidak sama");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>