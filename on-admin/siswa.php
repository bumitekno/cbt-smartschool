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
    <title>DATA SISWA</title>
	<!-- Library CSS -->
	<link href="../js/sweetalert.css" rel="stylesheet" type="text/css"/>
	<?php
		include "bundle/bundle_css.php";
	?>
	<style>
	    #clot {
	        border-radius:0;
	    }
	    #alert {
	        border-radius:0;
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
    .BTN1 {
    border-radius:0;
    color:white;
    background-color:#f39c12;
    }
    .BTN1:hover {
    border-radius:0;
    color:white;
    background-color:#ff6a00;
    }
    .BTN2 {
    border-radius:0;
    color:white;
    background-color:#0fa65a;
    }
    .BTN2:hover {
    border-radius:0;
    color:white;
    background-color:#1d7a19;
    }
    .BTN3 {
    border-radius:0;
    color:white;
    background-color:#2764aa;
    }
    .BTN3:hover {
    border-radius:0;
    color:white;
    background-color:#19508e;
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
				<li class="active"><a href="siswa.php"><i class="fa fa-graduation-cap"></i><span> Management Siswa</span></a></li>	
				
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
					<!-- <li><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li>	 -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Data Siswa</h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-graduation-cap"></i> Index siswa</li>
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
  <button id="clot" type="button" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-user-plus"></i> + Siswa</button>
  <button id="clot" class="btn btn-default hidden" float:right onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Cetak </button>
  <a href="siswa-import.php"><button id="clot" type="button" class="btn btn-warning"><i class="fa fa-upload"></i> Import Siswa</button></a>
</div>

				<div style="overflow-x:auto;" id="printableArea">
                <table id="data2" class="table table-hover table-striped">
					<?php
					include "page/dt_siswa.php";
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
					<h4 class="modal-title">Tambah Siswa</h4>
					</div>
					<div class="modal-body">
						<form action="page/siswa_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group col-sm-6">
								<label>No. Peserta / NIS</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-info"></i>
										</div>
										<input name="nis" type="text" class="form-control" placeholder="No Peserta" required />
									</div>
							</div>		
							<div class="form-group col-sm-6">
								<label>Nama</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-circle"></i>
										</div>
										<input name="nama" type="text" class="form-control" placeholder="nama siswa" required />
									</div>		
							</div>
							<div class="form-group col-sm-4">
								<label>kelas</label>
									<div class="input-group">

										<input name="kelas" type="number" class="form-control" placeholder="Kelas" required />
									</div>
							</div>
              <div class="form-group col-sm-4">
								<label>Jurusan</label>
									<div class="input-group">

										<input name="jurusan" type="text" class="form-control" placeholder="jurusan" required />
									</div>
							</div>
                            <div class="form-group col-sm-4">
                                <label>Rombel</label>
								
                                <div class="input-group">
										<input onkeypress="return /[a-z_-]/i.test(event.key)" name="rombel" type="text" class="form-control" placeholder="rombel" required />
									</div>
							</div>
							<div class="form-group col-sm-6">
								<label>Password</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-sign-in"></i>
										</div>
										<input name="pass" type="text" class="form-control" placeholder="password" required />
									</div>
							</div>
							<div class="form-group col-sm-6">
							<label>Sesi</label>
							 <form action="" method="post">   
                                 <select class="form-control" name="sesi"> 
                                     <option value="">Pilih sesi</option> 
                                         <option value="0">0</option>
                                         <option value="1">1</option>  
                                         <option value="2">2</option>  
                                         <option value="3">3</option>  
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                     </select> 
                             </div>
                             <div class="form-group col-sm-6">
                               <label>Agama</label>
                               <form action="" method="post">   
                                 <select class="form-control" name="agama"> 
                                   <option value="">Pilih Agama</option> 
                                   <option value="islam">Islam</option>
                                   <option value="kristen">Kristen</option>  
                                   <option value="katholik">Katolik</option>  
                                   <option value="hindu">Hindu</option>  
                                   <option value="budha">Budha</option>
                                   <option value="konghucu">Konghucu</option>
                                  </select> 
                                </div>
              <div class="form-group col-sm-6">
							<label>Ruang</label>
							 <form action="" method="post">   
                                 <select class="form-control" name="ruang"> 
                                     <option value="">Pilih Ruang Ujian</option>
                                         <option value="Ruang-1">Ruang 1</option>  
                                         <option value="Ruang-2">Ruang 2</option>  
                                         <option value="Ruang-3">Ruang 3</option>  
                                         <option value="Ruang-4">Ruang 4</option>
                                         <option value="Ruang-5">Ruang 5</option>
                                         <option value="Ruang-6">Ruang 6</option>
                                         <option value="Ruang-7">Ruang 7</option>
                                         <option value="Ruang-8">Ruang 8</option>
                                         <option value="Ruang-9">Ruang 9</option>
                                         <option value="Ruang-10">Ruang 10</option>
                                         <option value="Ruang-11">Ruang 11</option>
                                         <option value="Ruang-12">Ruang 12</option>
                                         <option value="Ruang-13">Ruang 13</option>
                                         <option value="Ruang-14">Ruang 14</option>
                                         <option value="Ruang-15">Ruang 15</option>
                                         <option value="Ruang-16">Ruang 16</option>
                                         <option value="Ruang-17">Ruang 17</option>
                                         <option value="Ruang-18">Ruang 18</option>
                                         <option value="Ruang-19">Ruang 19</option>
                                         <option value="Ruang-20">Ruang 20</option>
                                     </select> 
									 
									 
                             </div>
							 <label style="color:red;font-size:12px;"><b>*CATATAN</b></label>
							 <br>
							 <label style="font-size:12px;">Kolom "ROMBEL" jangan menggunakan angka</label>
							 <br>
							 <label style="font-size:12px;">Penggunaan angka pada kolom "ROMBEL" akan mengakibatkan soal tidak muncul pada halaman siswa</label>
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
		<div class="modal" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Yakin menghapus siswa ini ?</h4>
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
		include	"navbar/content_footer.php";
	?>
	<!-- Library Scripts -->
		<?php
		include "bundle/siswa_script.php";
	?>

  </body>
</html>
