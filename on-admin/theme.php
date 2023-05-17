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
    <title>Setting</title>
	<!-- Library CSS -->
	<?php
		include "bundle/bundle_css.php";
	?>
	<style>
	#Select { 
	border-radius:0; 
    margin-right:0;
    margin-left:0;
    padding:0;
    }
    #clok {
    border-radius:0;     
    }
	</style>
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
    @media (max-width: 768px){
    .nav-justified > li {
        display: table-cell;
        width: 1%;
  }
    .nav-justified > li > a  {
        border-bottom: 1px solid #ddd !important;
        margin-bottom: 0 !important;
  }
    .nav-justified > li.active > a  {
        border-bottom: 1px solid transparent !important;
  }

}
#jok {
background-color:#9ec4ff;
box-shadow: -15px 0 15px -15px inset;
}
#bla {
    background-image: url("../aset/foto/transparent.png");
    }
    hr.style2 {
    border-top: 3px double #8c8b8b;
    }
    #yut {
    height:200px;
    }
    .alert-danger {
	border-radius:0;
	font-size:12px;	
	position: fixed;
	right: 5px;
	bottom: 0px;
	z-index:9999;
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
				<!-- <li><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php 
                    if (!empty($_GET['gagal'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-close'></i> Gagal !!! anda bukan admin utama.
                        </div>
                        "; 
                        echo("<meta http-equiv='refresh' content='1;url=theme.php'>");
                        }
                     ?>
            <?php 
                    if (!empty($_GET['sukses'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> sukses !!! save setting.
                        </div>
                        "; 
                        echo("<meta http-equiv='refresh' content='1;url=theme.php'>");
                        }
                     ?>
          <h1>
            Pengaturan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-cog"></i> pengaturan</li>
          </ol>
        </section>

<section class="content">
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-tachometer"></i> Ujian</a></li>
              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-bank"></i> Sekolah</a></li>
              <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-image"></i> Logo</a></li>
              <li><a href="#tab_4" data-toggle="tab"><i class="fa fa-user-secret"></i> Admin</a></li>
              <li><a href="#tab_5" data-toggle="tab"><i class="fa fa-database"></i> Database</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                        <?php
	                    $querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='1'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
                        ?>
                        <br>
                        <label><i class="fa fa-user-circle-o"></i> Tema Dashboard Admin </label>
                        <form action="page/tema_change.php" enctype="multipart/form-data" method="post">
        							 <input  name="id" type="hidden" class="form-control" value="1" />
        							 <div class="col-sm-6 col-xs-8" id="Select">
                                         <select class="form-control"  name="warna" onchange="this.form.submit()"> 
                                             <option id="<?php echo $ar['warna'];?>" value="<?php echo $ar['warna'];?>"><?php echo $ar['warna'];?></option>
                                                 <option id="yellow" value="yellow">yellow</option>
                                                 <option id="red" value="red">red</option>  
                                                 <option id="blue" value="blue">blue</option>  
                                                 <option id="purple" value="purple">purple</option>
                                                 <option id="green" value="green">green</option>
                                             </select>
                                    </div>
                                    <div class="col-sm-3 col-xs-4" id="Select">
        							</div>
        				</form>
				</div><br><br><?php }?>
                <div class="box">
                        <?php
	                    $querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='2'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
                        ?>
                        <label><i class="fa fa-users"></i> Tema Dashboard Siswa</label>
                        <form action="page/tema_change.php" enctype="multipart/form-data" method="post">
        							 <input  name="id" type="hidden" class="form-control" value="2" />
        							 <div class="col-sm-6 col-xs-8" id="Select">
                                         <select class="form-control"  name="warna" onchange="this.form.submit()"> 
                                             <option id="<?php echo $ar['warna'];?>" value="<?php echo $ar['warna'];?>"><?php echo $ar['warna'];?></option>
                                                 <option id="yellow" value="yellow">yellow</option>
                                                 <option id="red" value="red">red</option>  
                                                 <option id="blue" value="blue">blue</option>  
                                                 <option id="purple" value="purple">purple</option>
                                                 <option id="green" value="green">green</option>
                                             </select>
                                        </div>
                                        <div class="col-sm-3 col-xs-4" id="Select">
        								</div>
        				</form>
				</div><br><br><?php }?>
                <div class="box">
                        <?php
	                    $querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='3'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
                        ?>
                        <label><i class="fa fa-area-chart"></i> Tampilkan Hasil Ujian di Dashboard Siswa</label>
                        <form action="page/tema_change.php" enctype="multipart/form-data" method="post">
        							 <input  name="id" type="hidden" class="form-control" value="3" />
        							 <div class="col-sm-6 col-xs-8" id="Select">
                                         <select class="form-control"  name="warna" onchange="this.form.submit()"> 
                                             <option id="<?php echo $ar['warna'];?>" value="<?php echo $ar['warna'];?>"><?php echo $ar['warna'];?></option>
                                                 <option value="show">Show / Tampilkan</option>
                                                 <option value="hidden">Hidden / Sembunyikan</option>  
                                             </select> 
                                        </div>
                                        <div class="col-sm-3 col-xs-4" id="Select">
        								</div>
        				</form>
				</div><br><br><?php }?>
                    </div><!-- /.col -->
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="row">
            <?php 
            $query = mysqli_query($konek, "SELECT * FROM profil WHERE id='1'");
            if($query == false){
            die ("Terjadi Kesalahan : ". mysqli_error($konek));
            }
            while($r = mysqli_fetch_array($query)){
            ?>
            <div class="col-lg-12">
               <br><br><br>
                    <div class="col-md-6">
                        <form action="page/setting_change.php" enctype="multipart/form-data" method="post">
        				  <input  name="id" type="hidden" class="form-control" value="1" />
        					<div class="form-group">
								<label>Nama Sekolah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-bank"></i>
										</div>
										<input name="n_sekolah" type="text" class="form-control" value="<?php echo $r['n_sekolah'];?>" required />
									</div>
							</div>
					</div>
					<div class="col-md-6">
        					<div class="form-group">
								<label>Alamat Sekolah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
										</div>
										<input name="sub_n_sekolah" type="text" class="form-control" value="<?php echo $r['sub_n_sekolah'];?>" required />
									</div>
							</div>
					</div>
          <div class="col-md-6">
        					<div class="form-group">
								<label>Kepala Sekolah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user" aria-hidden="true"></i>
										</div>
										<input name="kepsek" type="text" class="form-control" value="<?php echo $r['kepsek'];?>" required />
									</div>
							</div>
					</div>
          <div class="col-md-6">
        					<div class="form-group">
								<label>NIP Kepala Sekolah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card" aria-hidden="true"></i>
										</div>
										<input name="nip" type="text" class="form-control" value="<?php echo $r['nip'];?>" required />
									</div>
							</div>
					</div>
          <div class="col-md-6">
        					<div class="form-group">
								<label>Jenis Ujian</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-file-text" aria-hidden="true"></i>
										</div>
										<input name="jenis_ujian" type="text" class="form-control" value="<?php echo $r['jenis_ujian'];?>" required />
									</div>
							</div>
					</div>
					<div class="col-md-6">
        					<div class="form-group">
								<label>Kota</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building-o" aria-hidden="true"></i>
										</div>
										<input name="kota" type="text" class="form-control" value="<?php echo $r['kota'];?>" required />
									</div>
							</div>
					</div>
          			<div class="col-md-6">
        					<div class="form-group">
								<label>Tanggal Kartu Ujian</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="tanggal" type="text" class="form-control" value="<?php echo $r['tanggal'];?>" required />
									</div>
							</div>
					</div>
					<div class="col-md-6">
        					<div class="form-group">
								<label>Tahun Ajaran</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="th_ajaran" type="text" class="form-control" value="<?php echo $r['th_ajaran'];?>" required />
									</div>
							</div>
					</div>
					<div class="col-md-6">
        					<div class="form-group">
								<label>Website</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-globe"></i>
										</div>
										<input name="web" type="text" class="form-control" value="<?php echo $r['web'];?>" required />
									</div>
							</div>
					</div>
          <div class="col-md-6">
        					<div class="form-group">
								<label>Nama Server*(Jangan diubah)</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-server"></i>
										</div>
										<input name="kode_sekolah" type="text" class="form-control" value="<?php echo $r['kode_sekolah'];?>" required />
									</div>
							</div>
					</div>
                    <div class="col-md-6">
                        <button id="clok"  class="btn btn-success" type="submit">
        					Submit
        				</button>
        			</div>
        				</form>
				</div><br><br><?php }?>
            </div><!-- /.col -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <?php
                $query = mysqli_query($konek, "SELECT * FROM profil WHERE id='1'");
                if($query == false){
                die ("Terjadi Kesalahan : ". mysqli_error($konek));
                }
                while($r = mysqli_fetch_array($query)){
                ?>
                <div class="row">
            <div class="col-lg-12">
               <br><br><br>
                    <div class="col-lg-6">
                        <form action="page/upload_logo.php" enctype="multipart/form-data" method="post">
        				  <input id="yut" name="id" type="hidden" class="form-control" value="1" />
        					<div id="bla" class="form-group">
        					    <div id="yut">
        					    <center><img src="../aset/foto/<?php echo $r['logo'];?>"  width=100 alt="..."></center><br><br>
        					    </div>
        					    <label>Logo Sekolah max.1Mb (uk. 125 x 125 pixel)</label>
								<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i>
										</div>
										<input class="form-control" name="logo" type="file" accept=".jpg , .png, .JPEG, .jpeg, .JPG, .PNG"/>
									</div>
							</div>
						<button id="clok"  class="btn btn-success" type="submit">
        					Simpan
        				</button>
        				<br><br>
        				</form>
        			<hr class="style2"/>
					</div>
					<div class="col-lg-6">
					    <form action="page/upload_logo_kota.php" enctype="multipart/form-data" method="post">
        				  <input  name="id" type="hidden" class="form-control" value="1" />
        					<div id="bla" class="form-group">
        					    <div id="yut">
        					    <center><img src="../aset/foto/<?php echo $r['logo_kota'];?>"  width=100 alt="..."></center><br><br>
        					    </div>
        					    <label>Logo kota max.1Mb (uk. 125 x 125 pixel)</label>
								<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i>
										</div>
										<input class="form-control" name="logo" type="file" accept=".jpg , .png, .JPEG, .jpeg, .JPG, .PNG"/>
									</div>
							</div>
						<button id="clok"  class="btn btn-success" type="submit">
        					Simpan
        				</button>
        				<br><br>
        				</form>
        				<hr class="style2"/>
					</div>
					<div class="col-lg-6">
					    <form action="page/upload_logo_ujian.php" enctype="multipart/form-data" method="post">
        				  <input  name="id" type="hidden" class="form-control" value="1" />
        					<div id="bla" class="form-group">
        					    <div id="yut"> 
        					    <center><img src="../aset/foto/<?php echo $r['logo_ujian'];?>"  width=400 alt="..."></center><br><br>
        					    </div>
        					    <label>Logo ujian siswa max.1Mb (uk. 105 x 390 pixel)</label>
								<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i>
										</div>
										<input class="form-control" name="logo" type="file" accept=".jpg , .png, .JPEG, .jpeg, .JPG, .PNG"/>
									</div>
							</div>
						<button id="clok"  class="btn btn-success" type="submit">
        					Simpan
        				</button>
        				<br><br>
        				</form>
        				<hr class="style2"/>
					</div>
					<div class="col-lg-6">
					    <form action="page/upload_bg_login.php" enctype="multipart/form-data" method="post">
        				  <input  name="id" type="hidden" class="form-control" value="1" />
        					<div id="bla" class="form-group">
        					    <div id="yut"> 
        					    <center><img src="../images/<?php echo $r['bg_login'];?>"  width=400 alt="..."></center><br><br>
        					    </div>
        					    <label>Paraf max.1Mb (uk. 720 x 400 pixel)</label>
								<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i>
										</div>
										<input class="form-control" name="logo" type="file" accept=".jpg , .png, .JPEG, .jpeg, .JPG, .PNG"/>
									</div>
							</div>
						<button id="clok"  class="btn btn-success" type="submit">
        					Simpan
        				</button>
        				<br><br>
        				</form>
        				<hr class="style2"/>
					</div>
				</div><br><br><?php }?>
				
                 </div><!-- /.col -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
				    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="box">
                            <div class="box-header">
            				 </div><!-- /.box-header -->
                              <div class="box-body">
            				   <div id="printableArea">
                                <div class='col-lg-3 col-md-4 col-xs-12'>
                                  <!-- small box -->
                                  <div class='small-box bg-yellow'>
                                    <div class='inner'>
                                      <h3>Admin su</h3>
                                      <p>Input and delete users</p>
                                    </div>
                                    <div class='icon'>
                                      <i class='fa fa-user-secret'></i>
                                    </div>
                                    <a href='super.php' onclick='my()' class='small-box-footer'>
                                      Masuk menu <i class='fa fa-arrow-circle-right'></i>
                                    </a>
                                  </div>
                                </div>
            			  </div>
            				</div>
            			  </div>
            			  <h4><font color='#FF0000'>Keterangan: *</font></h4>
                            <ul>
                            <li>Menu ini hanya bisa diakses oleh Admin utama</li>
                            <br>
                            </ul>
            			</div>
            		  </div>
            		</section><!-- /.content -->
				</div>
				<div class="tab-pane" id="tab_5">
    				    <section class="content">
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                <div class="box-header">
                				 </div><!-- /.box-header -->
                                  <div class="box-body">
                				   <div id="printableArea">
                                    <div class='col-lg-3 col-md-4 col-xs-12'>
                                      <!-- small box -->
                                      <div class='small-box bg-red'>
                                        <div class='inner'>
                                          <h3>Reset</h3>
                                          <p>Reset database</p>
                                        </div>
                                        <div class='icon'>
                                          <i class='fa fa-database'></i>
                                        </div>
                                        <a href='reset.php' onclick='myFunction()' class='small-box-footer'>
                                          Masuk menu <i class='fa fa-arrow-circle-right'></i>
                                        </a>
                                      </div>
                                    </div>
                			  </div>
                				</div>
                			  </div>
                			  <h4><font color='#FF0000'>Keterangan: *</font></h4>
                                <ul>
                                <li>Menu ini hanya bisa diakses oleh Admin utama</li>
                                <br>
                                </ul>
                			</div>
                		  </div>
                		</section><!-- /.content -->
				</div>
            </div>
            <!-- /.tab-content -->
          </div>




   
        </section><!-- /.content -->
    </ul>
</div><!-- /.content-wrapper -->    
	<?php
		include	"navbar/content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle/siswa_script.php";
	?>
<script>
function my() {
    alert("menu ini hanya bisa diakses admin utama !!");
}
</script>
<script>
function myFunction() {
    alert("menu reset database hanya bisa diakses admin utama !!");
}
</script>
  </body>
</html>