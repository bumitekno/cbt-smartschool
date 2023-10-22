<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
include ('../koneksi/db.php');
require "excel_reader.php";
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
	    #clot {
	        border-radius:0;
	    }
	    #alert2 {
	        border-radius:0;
	    }
	    .progress, .alert {
            margin: 15px;
        }
        
        .alert {
            display: none;
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
          <h1>Import Soal</h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-book"></i> Index soal</li>
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
				      <a href="soal.php"><button id="clot" type="button" class="btn btn-success"><i class="fa fa-chevron-left"></i> Kembali</button></a>
					  <a href="page/imporexcel-soal.xls"><button id="alert2" type="button" class="btn btn-warning"><i class="fa fa-download" aria-hidden="true"></i> Download Template Xls</button></a>
					  <h5><p align="left">Pastikan file yang di upload menggunakan file XLS (Excel 2003)<br>
				      download template Xls diatas</b></h5>
					  <br><br>

<?php
if(isset($_POST['submit'])){
    

    $target = basename($_FILES['filepegawaiall']['name']) ;
    move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == 1){
//             kosongkan tabel pegawai
             $truncate ="TRUNCATE TABLE soal";
             mysqli_query($connsite, $truncate);
    };
    
//    import data excel mulai baris ke-11 (karena tabel xls ada header & info pada baris 1-10)
    for ($i=11; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $jenissoal    = $data->val($i, 1);
      $kodemapel    = $data->val($i, 2);
      $kodesoal     = $data->val($i, 3);
      $nomersoal    = $data->val($i, 4);
      $soal         = $data->val($i, 5);
      $gambarsoal   = $data->val($i, 6);
      $pilihan1     = $data->val($i, 7);
      $pilihan2     = $data->val($i, 8);
      $pilihan3     = $data->val($i, 9);
      $pilihan4     = $data->val($i, 10);
      $pilihan5     = $data->val($i, 11);
      $gambar_a     = $data->val($i, 12);
      $gambar_b     = $data->val($i, 13);
      $gambar_c     = $data->val($i, 14);
      $gambar_d     = $data->val($i, 15);
      $gambar_e     = $data->val($i, 16);
      $kunci        = $data->val($i, 17);
	    $status       = $data->val($i, 18);
$soal1=addslashes($soal);
$pilihan1a=addslashes($pilihan1);
$pilihan2b=addslashes($pilihan2);
$pilihan3c=addslashes($pilihan3);
$pilihan4d=addslashes($pilihan4);
$pilihan5e=addslashes($pilihan5);
//      setelah data dibaca, masukkan ke tabel pegawai sql
      $query = "INSERT into soal (jenissoal,kodemapel,kodesoal,nomersoal,soal,gambarsoal,pilihan1,pilihan2,pilihan3,pilihan4,pilihan5,gambar_a,gambar_b,gambar_c,gambar_d,gambar_e,kunci,status)values('$jenissoal','$kodemapel','$kodesoal','$nomersoal','$soal1','$gambarsoal','$pilihan1a','$pilihan2b','$pilihan3c','$pilihan4d','$pilihan5e','$gambar_a','$gambar_b','$gambar_c','$gambar_d','$gambar_e','$kunci','$status')";
      $hasil = mysqli_query($connsite, $query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(mysqli_error($connsite));
      }else{
//          jika impor berhasil
          echo "
<div class='progress'>
    <div class='progress-bar' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: 0%;'></div>
</div>
<div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-check'></i> Success Import Soal !!!.
            </div>";
    }
    
//    hapus file xls yang udah dibaca
    unlink($_FILES['filepegawaiall']['name']);
}

?>
<form name="myForm" id="myForm" onSubmit="return validateForm()" action="soal-import.php" method="post" enctype="multipart/form-data">
    <input class="form-control" type="file" id="filepegawaiall" name="filepegawaiall" required />
    <br>
    <input id="clot" type="submit" name="submit" value="Import" />
    <input id="clot" type="reset" value="Batal" /><br/>
</form>
</section>
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
    </div><!-- /.content-wrapper -->
    <?php
		include	"navbar/content_footer.php";
	?>
	<!-- Library Scripts -->
		<?php
		include "bundle/siswa_script.php";
	?>
	<script>
	    var $progress = $('.progress');
var $progressBar = $('.progress-bar');
var $alert = $('.alert');

setTimeout(function() {
    $progressBar.css('width', '10%');
    setTimeout(function() {
        $progressBar.css('width', '30%');
        setTimeout(function() {
            $progressBar.css('width', '100%');
            setTimeout(function() {
                $progress.css('display', 'none');
                $alert.css('display', 'block');
            }, 500); // WAIT 5 milliseconds
        }, 1000); // WAIT 2 seconds
    }, 1000); // WAIT 1 seconds
}, 500); // WAIT 1 second
	</script>
  </body>
</html>