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
    #clot {
    border-radius:0;
    }
	.progress { background-color:white; position:relative; border: 0px solid #ddd; padding: 1px; border-radius: 0px; }
    .bar { background-color: #26a52e; width:0%; height:30px; border-radius: 0px; }
    .percent { position:absolute; display:inline-block; color:white; top:1px;}
	.alert-danger {
	border-radius:0;
	font-size:12px;	
	position: fixed;
	right: 5px;
	bottom: 0px;
	z-index:9999;
	}
	.alert-warning {
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
				<li class="active"><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
        include	"navbar/content_footer.php";
      ?>
        <section class="content-header">
          <ol class="breadcrumb">
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <?php 
                    if (!empty($_GET['hapus'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-warning alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> Success Hapus files !!!.
                        </div>
                        "; 
                        echo("<meta http-equiv='refresh' content='2;url=laporan.php'>");
                        }
                     ?>
                    <h3><b><i class="fa fa-folder-open-o"></i> Upload Laporan</b></h3><br>
					<form action="upload.php" method="post" onSubmit="return validateForm()" enctype="multipart/form-data" name="form1" id="form1">
					<label>
					<input class="form-control" type="file" id="fupload" name="fupload" required /><h6>max size : 2 Mb</h6>
					</label>
					<p>
					<label>
					<br>
					  <button id="clot" class="btn btn-success" type="submit" name="submit_file" value="Submit"/> <i class="fa fa-cog fa-spin" style="font-size:15px"></i>  Proses</button> 
					</label>
					</p>
					</form>
    					<div class="progress">
                            <div class="bar"></div >
                            <div class="percent"></div >
                        </div>

                        <div id="status"></div>
    <br>
<div class="table-responsive" style="width: 100%; height: 400px; overflow-y: scroll;">					
<table id="dataupload" class="table table-bordered table-striped table-hover">
<?php 
$dir = "upload/";
chdir($dir);
array_multisort(array_map('filemtime', ($files = glob("*.{doc,docx,xlsx,xls,csv,xml,pdf,et,ppt,pptx,zip,rar,rtf,txt,sql,apk}", GLOB_BRACE))), SORT_DESC, $files);
foreach($files as $data)
{
$filesize = filesize($data);
$filesizeKB = round($filesize / 1024, 2);
$filesizeMB = round($filesize / 1024 / 1024, 2);
$tgl = date('d-m-Y',filemtime($data));
$jam = date('H:i',filemtime($data));
$tanda=explode(".",$data);
$file = $tanda[0];
$dok = $tanda[1];
echo "
<tr class='list'>
<td><a style='color:".$co.";' href='".upload."/".$data."' target='new_tab'>".$data."</a></td>
<td>".$tgl."</td>
<td>$filesizeMB MB</td>
<td>".$jam."</td>
<td class='hapus'><a style='font-decoration:none;color:#222;' href='drop.php?file=".upload."/".$data."'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i> Hapus</button></a></td>
";
}
?>
</table>
</div>
				</div><!-- /.box-header -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.col -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div><!-- /.content-wrapper -->
<?php

include "bundle/profil_script.php";
?>
	<script src="../js/jquery.form.js" type="text/javascript"></script>
	<script>
(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
   
$('form').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
		//console.log(percentVal, position, total);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
	complete: function(xhr) {
		status.html(xhr.responseText);
	}
}); 

})();       
</script>
    <script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('fupload', [".xls", ".docx", ".doc", ".zip", ".xlsx", ".csv", ".ppt", ".pptx", ".pdf"])){
            alert("Hanya file .xls, .doc, .docx, .xlsx, .zip, .csv, .ppt dan pdf yang diijinkan.");
            return false;
        }
    }
</script>
  </body>
</html>