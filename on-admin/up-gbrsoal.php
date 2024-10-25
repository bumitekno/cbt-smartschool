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
	    input[type="file"]
{
    border: 1px solid #adadad;
    outline: 0;
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
    #mar {
        margin-top:0px;
    }
    #clot {
        border-radius:0;
    }
    .progress { background-color:white; position:relative; border: 0px solid #ddd; padding: 1px; border-radius: 0px; }
    .bar { background-color: #26a52e; width:0%; height:30px; border-radius: 0px; }
    .percent { position:absolute; display:inline-block; color:white; top:1px;}
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
				<li><a href="siswa.php"><i class="fa fa-graduation-cap"></i><span> Management Mahasiswa</span></a></li>

				<li class="treeview active">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span> Management Ujian</span>
                      <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                  </a>
                  <ul class="treeview-menu">
                            <li><a href="soal.php"><i class="fa fa-book"></i> Bank Soal</a></li>
    						<li id="sub"><a href="kartuujian.php"><i class="fa fa-print"></i><span> Kartu Peserta</span></a></li>
    						<li id="sub"><a href="daftarhadir.php"><i class="fa fa-print"></i><span> Daftar Hadir</span></a></li>
    						<li id="sub"><a href="beritaacara.php"><i class="fa fa-print"></i><span> Berita Acara</span></a></li>
    						<li class="active" id="sub"><a href="up-gbrsoal.php"><i class="fa fa-upload"></i><span> Upload Gbr / Audio Soal</span></a></li>
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
        
<?php 
        include	"navbar/content_footer.php";
      ?>

        <!-- Main content -->
<section class="content-header">
    <h1><i class="fa fa-folder-open-o"></i> Upload Gambar / audio Soal</h1>
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div id="mar" class="col-xs-12">
                    <h4><font color="#FF0000"><br><br>Keterangan: *</font></h4>
                    <ul>
                    <li>Pastikan semua gambar/audio yang ada di soal sudah terupload disni</li>
                    <li>Menghapus gambar/audio disini juga akan menghapus yang berkaitan dengan soal</li>
                    <li>Klik nama file untuk melihat gambar lebih detail</li>
                    </ul>
                        <div class="col-sm-6">
                            <form action="upload-gbrsoal.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <label> Upload Gambar / audio soal</label>
					                <div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i>
										</div>
										<input class="form-control" type="file" id="files[]" name="files[]" accept="image/x-png,image/gif,image/jpeg,audio/mp3,audio/ogg" required multiple/>
									</div>
									<h6>max size : 10 Mb</h6>
									<br>
					        <button id="clot" class="btn btn-success" type="submit" name="submit_file" value="Submit"><i class="fa fa-cog fa-spin" style="font-size:15px"></i>  Proses</button> 
					    </div> 
					    <div class="col-sm-12">
					        </form>
					        <br>
					        <div class="progress">
                            <div class="bar"></div >
                            <div class="percent">0%</div >
                            </div>

                        <div id="status"></div>
                        </div>
                </div>
            <div id="mar" class="col-xs-12">
                <?php if($message) echo "<p>$message</p>"; ?>
                    <div class="table-responsive col-xs-12" style="width: 100%; height: 400px; overflow-y: scroll;">	
                    <table id="dataupload" class="table table-bordered table-striped table-hover">
                    <?php 
                    $dir = "../gbr/";
                    chdir($dir);
                    array_multisort(array_map('filemtime', ($files = glob("*.{jpg,JPG,jpeg,JPEG,png,gif,PNG,mp3,ogg}", GLOB_BRACE))), SORT_DESC, $files);
                    foreach($files as $data)
                    {
                    $gambarsoal ="<img src='../gbr/$data' width=200pk height=auto >";
                    $tgl = date('Y-m-d',filemtime($data));
                    $jam = date('H:i',filemtime($data));
                    $tanda=explode(".",$data);
                    $file = $tanda[0];
                    $dok = $tanda[1];
                    	if($dok == "JPG" OR $dok == "jpg" OR  $dok == "jpeg" OR  $dok == "JPEG" OR  $dok == "PNG" OR  $dok == "png" OR  $dok == "PNG" OR  $dok == "JPG"){
                    	$co="<img src='../gbr/$data' width=200pk height=auto >";
                    	} elseif ($dok == "mp3" OR $dok == "ogg") {
                    	$co="<audio src='../gbr/$data' controls ></audio>";
                    	}
                    echo "
                    <tr class='list'>
                    <td><a href='../".gbr."/".$data."' target='new_tab'>../".gbr."/".$file.".".$dok."</a></td>
                    <td>".$co."</td>
                    <td>".$tgl."</td>
                    <td>".$jam."</td>
                    <td class='hapus'><a style='font-decoration:none;color:#222;' href='dropgbrsoal.php?file=../".gbr."/".$data."'><button type='button' class='btn btn-danger'><i class='fa fa-trash-o'></i> Hapus</button></a></td>
                    ";
                    echo "</tr>";
                    }
                    ?>
                    </table>
                    </div>
                    
                </div>
                </div>
                </div>
            </div>
            </div>
        </section><!-- /.content -->
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle/siswa_script.php";
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

        if(!hasExtension('files[]', [".jpg", ".png", ".gif", ".jpeg", ".PNG", ".JPG", ".mp3", ".ogg", ".JPEG"])){
            alert("Hanya file .jpg, .jpeg, gif dan png yang diijinkan.");
            return false;
        }
    }
</script>
  </body>
</html>