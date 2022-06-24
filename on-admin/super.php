<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
if($admin_su == 1)
				        {
				             $username=$_SESSION['admin'];
					   
				        }
				        else
				        {
				             header('location:theme.php?gagal=1');
				             exit;
				        }
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Super Admin</title>
    <link href="../js/sweetalert.css" rel="stylesheet" type="text/css"/>
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

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php 
                    if (!empty($_GET['reset'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> Sukses !!! reset password.
                        </div>
                        "; 
                        echo("<meta http-equiv='refresh' content='1;url=super.php'>");
                        }
                     ?>
          <h1>
            Super Admin
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-user-secret"></i> admin</li>
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
<div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn bg-navy btn-flat " data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-user-plus"></i> Tambah User</button>
</div>

				<div style="overflow-x:auto;" id="printableArea">
                <table id="data2" class="table table-hover table-striped">
					<?php
					include "page/dt_admin.php";
					?>
					</table>
				</div>
		</section><!-- /.content -->
		
		<!-- Modal Popup Tambah Siswa -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah User</h4>
					</div>
					<div class="modal-body">
						<form action="page/user_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>username</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-info"></i>
										</div>
										<input name="nip" type="text" class="form-control" placeholder="Username" required />
									</div>
							</div>		
							<div class="form-group">
								<label>Nama</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-circle"></i>
										</div>
										<input name="nama" type="text" class="form-control" placeholder="nama" required />
									</div>		
							</div>
							<div class="form-group">
								<label>Jabatan</label>
							 <form action="" method="post">   
                                 <select class="form-control" name="jabatan"> 
                                     <option value="">Jabatan</option> 
                                         <option value="0">Editor</option>
                                         <option value="2">Proktor</option>  
                                     </select> 
							</div>
							<div class="form-group">
								<label>Password</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-sign-in"></i>
										</div>
										<input name="pass" type="text" class="form-control" placeholder="password" required />
									</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
		
		<!-- Modal Popup siswa Edit -->
		<div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>
		
		<!-- Modal Popup untuk delete--> 
		<div class="modal modal-danger" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">yakin menghapus User ini ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-warning btn-flat" id="delete_link">Hapus</a>
						<button type="button" class="btn btn-success btn-flat" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
		
		
    </div><!-- /.content-wrapper -->
	<?php
		include	"navbar/content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle/admin_script.php";
	?>
	<script>
function myFunction2() {
    alert("Yakin reset password ? Password akan kembali default !");
}
</script>
  </body>
</html>