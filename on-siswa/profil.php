<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>E-CBT Smasrtschool</title>

	<!-- Library CSS -->
	<?php
		include "../on-admin/bundle/index_css.php";
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
    .sidebar-form {
        border:0px !important;
    }
    #on {
	        animation: blink 1s ease-in infinite;
	    }

@keyframes blink {
  from, to { opacity: 1 }
  50% { opacity: 0 }
}

	#border {
    margin: auto;
    border: 1px solid #636363;
    border-width:5px;  
    border-style:double;
    margin-top: 18px;
    margin-bottom: 19px;
    margin-right: 5px;
    margin-left: 15px;
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
        margin-top:-110px;
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
			  <h5 style="color:white"><?php echo $kelas;?></h5>
			</div>
		  </div>
		  <form action="#" method="get" class="sidebar-form">
                 <h5 style="color:white"><?php echo $nama;?></h5>
            </form>
		  <div class="user-panel">
            <div class="pull-left image">
			<a href="profil.php" data-toggle="tooltip" data-placement="right" title="Profil"><button id="cogi" class="btn btn-default btn-md"><i class="fa fa-user"></i></button></a>
			<!-- <a data-toggle="modal" data-target="#about" data-placement="right" data-toggle="tooltip" title="about aplication"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-info-circle"></i></button></a> -->
            <a href="logout.php" data-placement="right" data-toggle="tooltip" title="log out"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-sign-out"></i></button></a>
            </div>
          </div>  
          <ul class="sidebar-menu">

					<li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li><a href="ujian.php"><i class="fa fa-laptop"></i><span>Ujian</span></a></li>
					<li><a href="nilai.php"><i class="fa fa-book"></i><span>Daftar Nilai</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Profil</h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-user"></i> Profil Siswa</li>
          </ol>
        </section>
        <section>
           					<?php
						$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){	

						?>
<div id='border' class="col-sm-6" style=" max-width:450px;">
	            <table>
		                <td colspan="3" style="border-bottom:1px solid #666; padding: 0;">
                			<table width="100%" class="kartu">
                				<tr>
                				    <td align='center' style='padding: 4px'><img src='../aset/foto/<?php echo $xx['logo'];?>' height='40'></td>
                                    <td align='center' style='font-weight:bold; padding: 4px; text-transform: uppercase;'>KARTU PESERTA <BR> UJIAN <?php echo $xx['n_sekolah'];?> <?php echo date ('Y') ?></td>
                                    <td align='center' style='padding: 4px'><img src='../aset/foto/<?php echo $xx['logo_kota'];?>' height='45'></td>
                				</tr>
                			</table>
                		</td>
                			<tr><td height="70" width="115">Nama Peserta</td><td width="1"> :</td><td width="290"> <i>&emsp;<?php echo $nama; ?></i></td></tr>
                			<tr><td height="30">Username</td><td> :</td><td>&emsp;<?php echo $nis; ?></td></tr>
                			<tr><td height="30">Password</td><td> :</td><td>&emsp;<?php echo $pass; ?></td></tr>
                			<tr><td height="30">Kelas</td><td> :</td><td>&emsp;<?php echo $kelas; ?></td></tr>
                			<tr><td height="30">Sesi / Ruang</td><td> :</td><td>&emsp;<?php echo $sesi; ?> / <?php echo $ruang; ?></td></tr>
	            </table>
	            <img id='plotro' src='../aset/foto/avatar.gif' width=90px height=auto/>
</div>
<?php } ?>
        </section>
		
    </div><!-- /.content-wrapper -->
	<?php
		include	"navbar/content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
</div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/adminlte.min.js"></script>
  </body>
</html>
