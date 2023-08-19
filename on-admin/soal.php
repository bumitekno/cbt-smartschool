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
	<link href="../js/sweetalert.css" rel="stylesheet" type="text/css"/>
	<?php
		include "bundle/bundle_css.php";
	?>
	<style>
	.alert-danger {
	border-radius:0;
	font-size:12px;	
	position: fixed;
	right: 5px;
	bottom: 0px;
	z-index:9999;
	}
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
    #clot {
    border-radius:0;
    margin:0;
     }
     #cloti {
    border-radius:0;
    width:40px;
    padding:0;
    margin:0;
    border-right:none;
    border-bottom:none;
    border-left:none;
    border-color:#333232;
    -moz-box-shadow:    inset 0 0 10px #000000;
    -webkit-box-shadow: inset 0 0 10px #000000;
    box-shadow:         inset 0 0 10px #000000;
     }
     #clot3d {
        border-radius:0;
        width:40px;
        padding:0;
        margin:0;
        border:solid 1px;
        border-bottom:none;
        border-right:none;
        border-top:none;
        border-left:none;
        border-color:#333232;
        box-shadow: 0px  5px 15px grey;
}
#clot3d:hover {
        border-radius:0;
        width:40px;
        padding:0;
        margin:0;
        border:solid 1px;
        border-bottom:none;
        border-right:none;
        border-top:none;
        border-color:grey;
        -moz-box-shadow:    inset 0 0 10px #000000;
        -webkit-box-shadow: inset 0 0 10px #000000;
        box-shadow:  0px 5px 15px green;

}
 #clot3d2 {
        border-radius:0;
        width:40px;
        padding:0;
        margin:0;
        border:solid 1px;
        border-bottom:none;
        border-right:none;
        border-top:none;
        border-left:none;
        border-color:#333232;
        box-shadow: 0px  5px 15px grey;
}
#clot3d2:hover {
        border-radius:0;
        width:40px;
        padding:0;
        margin:0;
        border:solid 1px;
        border-bottom:none;
        border-right:none;
        border-top:none;
        border-left:none;
        border-color:grey;
        -moz-box-shadow:    inset 0 0 10px #000000;
        -webkit-box-shadow: inset 0 0 10px #000000;
        box-shadow:         inset 0 0 10px #000000;
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
    						<li id="sub"><a href="up-gbrsoal.php"><i class="fa fa-upload"></i><span> Upload Gbr / Audio Soal</span></a></li>
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
          <h1>Bank Soal</h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-book"></i> Bank Soal</li>
          </ol>
        </section>
					<?php 
                    if (!empty($_GET['gagal'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-close'></i> Gagal !!! silahkan login sebagai admin / editor.
                        </div>
                        "; 
                        }
                     ?>
					 <?php 
                    if (!empty($_GET['kosong'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-close'></i> Gagal !!! bobot nilai belum terisi.
                        </div>
                        "; 
                        }
                     ?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
				</div><!-- /.box-header -->
                <div class="box-body">
                <button id="clot" type="button" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Bank Soal</button>
				<div id="printableArea">
                <br></br>
					<table id="data5" class="table table-hover table-striped">
					<?php
					include "page/dt_soal.php";
					?>
					</table>
					<h4><font color="#FF0000">Keterangan: *</font></h4>
                                <ul><li>Pastikan Soal dalam status <b>"Non Aktif"</b> jika ingin mengedit dan input butir soal</li>
								<li>klik <b>tombol</b> status soal untuk mengaktifkan dan menonaktifkan soal </li>
								<li>Tidak Bisa <b>menghapus</b> soal yang sedang Aktif </li>
								<li>Tidak Bisa <b>INPUT dan Edit</b> soal yang sedang Aktif </li>
								</ul>
				</div>
		</section><!-- /.content -->
		<!-- Modal Popup Tambah Soal -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Bank Soal</h4>
					</div>
					<div class="modal-body">
						<form action="page/soal_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Jenis Ujian</label>
                             <br>
							 <form action="" method="post">   
                                 <select class="form-control" name="jenissoal" required >  
                                     <option value="">Pilih Jenis Ujian</option>
                                         <option value="PAS">PAS</option>
                                         <option value="UASBN">UASBN</option>
                                         <option value="UKK">UKK</option>
                                         <option value="USEK">USEK</option>
                                         <option value="PTS">PTS</option>
                                         <option value="UH">UH</option> 
                                         <option value="TRYOUT">TRYOUT</option>  
                                         <option value="SIMULASI">SIMULASI</option>  
                                     </select> 
                             </div>		
							
                             <div class="form-group">
								<label>Mapel</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="kodemapel" type="text" class="form-control" placeholder="MAPEL" required />
									</div>
							</div>
                            <div class="form-group">
								<label>Kelas</label>
                             <br>
							 <form action="" method="post">   
                                 <select class="form-control" name="kelas" required >  
                                     <option value="">Pilih kelas</option>
                                         <option value="7">7</option>
                                         <option value="8">8</option>  
                                         <option value="9">9</option>  
                                         <option value="10">10</option>
                                         <option value="11">11</option>
                                         <option value="12">12</option> 
                                         <option value="S1">S1</option>
                                         <option value="S2">S2</option>
                                         <option value="S3">S3</option>
								 
                                     </select> 
                             </div>
							<div class="form-group">
								<label>Kode Soal</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="kodesoal" type="text" class="form-control" placeholder="kode soal" required />
									</div>
							</div>
							<div class="form-group">
								<label>Opsi jawaban</label>
                             <br>
							 <form action="" method="post">   
                                 <select class="form-control" name="opsi" required >  
                                     <option value="">Pilih</option>
                                        <option value="hidden">4 Opsi Jawaban</option>
                                        <option value="show">5 Opsi Jawaban</option>  
                                     </select> 
                             </div>
                             <div class="form-group">
								<label>Tampilan Soal</label>
                             <br>
							 <form action="" method="post">   
                                 <select class="form-control" name="acak" required >  
                                     <option value="">Pilih</option>
                                         <option value="1">Acak</option>
                                         <option value="2">Urut</option>  
                                     </select> 
                             </div>
                            <div class="form-group">
								<label>Waktu Ujian</label>
									<div class="input-group col-xs-2">
										<input name="waktu" type="number" class="form-control" required > Menit</input>
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
                                <h4><font color="#FF0000">Keterangan: *</font></h4>
                                <ul><li>JANGAN ada SPASI, BISA gunakan tanda sambung (-)</li>
								<li>Hindari Kode Soal yang Terlalu Panjang </li>
								<li>Contoh nama yang baik: BING-11IPA-UAS1</li>
                                </ul>   
						</form>
					</div>
				</div>
			</div>
		</div>

		
		<!-- Modal Popup siswa Edit -->
		<div id="ModalEditDosen2" class="modal" tabindex="-1" role="dialog"></div>
		<div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>
			<!-- Modal Popup untuk delete--> 
		<div class="modal" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">yakin menghapus soal ini ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link"><i class="fa fa-remove"></i> Hapus </a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Batal <i class="fa fa-check"></i></button>
					</div>
				</div>
			</div>
		</div>
		
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
