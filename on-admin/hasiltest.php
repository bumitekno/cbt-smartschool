<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
$cari = $_POST['cari'];
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>HASIL UJIAN <?php echo $cari;?></title>
	<!-- Library CSS -->
	<?php
		include "bundle/bundle_css.php";
	?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

	#tengah {
	  margin: auto;
	  padding: 10px;
	}
	.curut {
    background-image:linear-gradient(to left, #2764aa , black)!important;
	}
	.alert-danger {
	border-radius:0;
	font-size:12px;	
	position: fixed;
	right: 5px;
	bottom: 0px;
	z-index:9999;
	}
	div.col-xs-6 {
    margin: auto;
    border: 1px solid #636363;
    border-width:5px;  
    border-style:double;
    margin-top: 20px;
    margin-bottom: 29px;
    margin-right: 5px;
    margin-left: 15px;
    width: 47%;
    }
    @media print{
   .noprint{
       display:none;
   }
}
    #Select { 
    margin-right:0;
    padding:0;
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
    #alert { 
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
    #ndelik {
        display:none;
    }
    #ndelik1 {
        display:block;
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
    #ndelik {
        display:none;
    }
    #ndelik1 {
        display:block;
    }
	hr.style-two {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
	</style>
  </head>
<?php
	$querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='1'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
?>
<body class='hold-transition skin-<?php echo $ar['warna'];?> fixed sidebar-mini sidebar-collapse' style='font-family:'Segoe UI''>
<?php }?>
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
                
					<li class="active"><a href="hasiltest.php"><i class="fa fa-area-chart"></i><span> Hasil Test</span></a></li>
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
          <h1>Hasil Test <?php echo $cari;?></h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-print"></i> Cetak Hasil</li>
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
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header"></div><!-- /.box-header -->
                        <div class="box-body">
                            
                            <div style="overflow-x:auto;">
                					<?php
                					include "page/dt_hasil.php";
                					?>
            			    <h4><font color="#FF0000">&emsp; Keterangan: *</font></h4>
                                <ul>
                                <li>Pilih kode soal untuk menampilkan hasil</li>
                                <li>Jawaban Siswa (X) = Kosong</li>
                                </ul>
                                <br><br><br>
            				</div>

                            
                            </div>
        			    </div>
        		    </div>
        	    </div>
		</section><!-- /.content -->
    </div>
    <!-- Modal Popup untuk delete--> 
		<div class="modal" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Yakin menghapus nilai siswa ini ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
<div id="ModalEditDosen2" class="modal" tabindex="-1" role="dialog"></div>
<?php
include	"navbar/content_footer.php";
?>
<!-- Library Scripts -->
<?php
include "bundle/hasil_script.php";
?>
<script type="text/javascript" src="../js/Chart.js"></script>
<script>
var oilCanvas = document.getElementById("myChart2");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: [
        "nilai 91-100",
        "nilai 81-90",
        "nilai 71-80",
        "nilai 61-70",
        "nilai 51-60",
        "nilai 41-50",
        "nilai 31-40",
        "nilai 21-30",
        "nilai 11-20",
        "nilai 0-10"
		//"belum mengerjakan"//
    ],
    datasets: [
        {
            data: [
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 91 and 100");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					, 
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 81 and 90");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					, 
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 71 and 80");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					, 
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 61 and 70");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					, 
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 51 and 60");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					,
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 41 and 50");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					,
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 31 and 40");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					,
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 21 and 30");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					,
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 11 and 20");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					,
					<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 0 and 10");
					$kkm2 	= mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					$pil1 	= mysqli_num_rows($kkm);
					$tal  	= mysqli_num_rows($kkm2);
					$persen	= $pil1/$tal*100;
					echo mysqli_num_rows($kkm);
					?>
					//$kkm    = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari'");
					//$kkm3    = mysqli_query($konek,"select DISTINCT * from nilaihasil where kodesoal='$cari'");
					//$ur = mysqli_fetch_array ($kkm);
					//$kelasx=preg_replace('/[^0-9\  ]/', '', $ur['kelas']);
					//$kkm2 	= mysqli_query($konek,"select * from siswa where kelas LIKE '$kelasx%'");
					//$pil1 	= mysqli_num_rows($kkm);
					//$tal  	= mysqli_num_rows($kkm2);
					//$persen	= $tal-$pil1;
					//echo $persen;
					//?>
					]
					,
			
			
			
            backgroundColor: [
                "rgb(0, 0, 255)",
                "rgb(51, 153, 255)",
				"rgb(0, 255, 255)",
				"rgb(51, 204, 51)",
				"rgb(204, 255, 51)",
				"rgb(255, 255, 0)",
				"rgb(255, 153, 0)",
				"rgb(255, 102, 0)",
				"rgb(204, 0, 0)",
				"rgb(102, 0, 51)"
				
				
                //"#E3E3E3"//
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});
</script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["NILAI <?php echo $cari;?>"],
    datasets: [{
      label: 'nilai 100-91',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 91 and 100");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(0, 0, 255)"
    },{
      label: 'nilai 90-81',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 81 and 90");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(51, 153, 255)"
    },{
      label: 'nilai 80-71',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 71 and 80");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(0, 255, 255)"
    },{
      label: 'nilai 70-61',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 61 and 70");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(51, 204, 51)"
    },{
      label: 'nilai 60-51',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 51 and 60");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(204, 255, 51)"
    },{
      label: 'nilai 50-41',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 41 and 50");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(255, 255, 0)"
    },{
      label: 'nilai 40-31',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 31 and 40");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(255, 153, 0)"
    },{
      label: 'nilai 30-21',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 21 and 30");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(255, 102, 0)"
    },{
      label: 'nilai 20-11',
      data: [<?php 
					$kkm = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 11 and 20");
					echo mysqli_num_rows($kkm);
					?>],
      backgroundColor: "rgb(204, 0, 0)"
    },{
      label: 'nilai 10-0',
      data: [<?php 
					$kkmbawah = mysqli_query($konek,"select * from nilaihasil where kodesoal='$cari' and nilai+nilaiurai BETWEEN 0 and 10");
					echo mysqli_num_rows($kkmbawah);
					?>],
      backgroundColor: "rgb(102, 0, 51)"
    }]
  }
});
</script>
</body>
</html>
