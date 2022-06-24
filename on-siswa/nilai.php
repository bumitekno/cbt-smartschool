<?php
session_start();
include ('conn/cek.php');
include ('../koneksi/koneksi.php');
include ('conn/fungsi.php');
$query2 = mysqli_query ($konek, "SELECT * FROM theme WHERE id='3'");
$ur = mysqli_fetch_array ($query2);
$warna =$ur['warna'];
						    $warna = str_replace("hidden", "0", $warna);
                            $warna = str_replace("show", "1", $warna);
if($warna == 0)
				        {			   
				             header('location:index.php?lock=1');
				             exit;
				        }
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>HASIL UJIAN</title>
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
    #cog:hover {
    border-radius:0; 
    background-color:#ff8f0a;
    color:white;
    border:0;
    }
    #co {
    border-radius:0; 
    background-color:#2764aa;
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
    #ndelik2 {
        display:none;
    }
    #ndelik1 {
        display:block;
    }
     #tutu {
        margin-top:-25px;
        padding:0;
    }
@media (min-width: 1200px) {
.max {
        max-height:400px;
        width:400px;
    }
}
@media (max-width: 600px) {
.max {
        max-height:400px;
        width:100%;
    }
}
@media (max-width: 480px) {   
.max {
        max-height:400px;
        width:100%;
    }
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
			<a href="profil.php" data-toggle="tooltip" data-placement="right" title="Profil"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-user"></i></button></a>
			<!-- <a data-toggle="modal" data-target="#about" data-placement="right" data-toggle="tooltip" title="about aplication"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-info-circle"></i></button></a> -->
            <a href="logout.php" data-placement="right" data-toggle="tooltip" title="log out"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-sign-out"></i></button></a>
            </div>
          </div>  
          <ul class="sidebar-menu">

					<li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li><a href="ujian.php"><i class="fa fa-laptop"></i><span>Ujian</span></a></li>
			        <li class="active"><a href="nilai.php"><i class="fa fa-book"></i><span>Daftar Nilai</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
			
        <!-- Main content -->
        <?php include "setting.php";?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                    <div class="box-header"><b>DAFTAR NILAI</b> <i class="fa fa-area-chart"></i></div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-xs-12">
				                <div style="overflow-x:auto;" id="printableArea">
                                <br></br>
                					<table show id="data" class="table table-hover table-striped">
                					<?php
                					include "page/dt_nilai.php";
                					?>
                					</table>
					            </div>
				            </div>
			            </div>
			        </div>
			    </div>
		    </div>
		</section>
			
		<?php include "setting2.php";?>
		    <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header"></div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-xs-12">
                              <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-lock"></i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">LOCKED</span>
                                  <span class="info-box-number">BY ADMIN</span>
                                  <div class="progress">
                                    <div class="progress-bar" style="width: 50%"></div>
                                  </div>
                                      <span class="progress-description">
                                        access database locked by admin
                                      </span>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>   
		</section>
<div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>			
<div class="box-footer">
<h4><font color="#FF0000">Keterangan: *</font></h4>
<ul>
<li>Nilai ujian siswa akan terlihat jika menu ini dibuka oleh proktor</li>
<li>Hubungi Admin / Proktor jika tidak ada nilai hasil ujian</li>
<br>
</ul> 
</div>
</div>
<?php include "navbar/content_footer.php";?>
<?php include "bundle/nilai_script.php";?>
<?php include "bundle/script.php";?>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
  </body>
</html>
