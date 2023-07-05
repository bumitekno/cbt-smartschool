<?php 
session_start();
include ('../on-admin/conn/cek.php');
include ('../koneksi/koneksi.php');
include ('../on-admin/conn/fungsi.php');

$mapel=$_GET['matpel'];
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
$querydosen = mysqli_query ($konek, "SELECT * FROM soal where kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode' ORDER BY nomersoal ASC");
						if($query == false){
						die ("Terjadi Kesalahan : ". mysqli_error($konek));
						$i=1;
						}
						while ($ar = mysqli_fetch_array ($query)){
    						date_default_timezone_set('Asia/Jakarta');
						$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
						$rows = mysqli_num_rows($result);
						}
?>
<html class="no-js" lang="en">
<html class="no-js" lang="en">
<?php
include "bundle/bundle_script.php";
$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){
?>
<!-------warna #2e6499------>
<link type="text/css" href="resizer.css" rel="stylesheet">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Preview Ujian <?php echo $xx['n_sekolah'];?></title>
	<link href="../aset/foto/<?php echo $xx['logo'];?>" rel="icon" type="image/png">
	<meta name="description" content="">    
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include "bundle/css.php";
    include "bundle/navsoal.php";
    include "bundle/ragu_css.php";
    ?>
    <style>
 #us {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #000;
  opacity:0.4;filter:alpha(opacity=40);
}
.save .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
	.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #000;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
        .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  #opsihidden {
       display:none;
  }
  #opsishow {
       display:block;
  }
     #opsiuraihidden {
       display:none;
  }
  #opsiuraishow {
       display:block;
  }
    </style>
    <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
	<link rel="stylesheet" href="../aset/bootstrap/css/bootstrap.min.css">
    <script>
var count = 7200;
var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

function timer() {
    count = count - 1;
    if (count == -1) {
        document.getElementById("#").submit();
        return;
    }

    var seconds = count % 60;
    var minutes = Math.floor(count / 60);
    var hours = Math.floor(minutes / 60);
    minutes %= 60;
    hours %= 60;
 document.getElementById("divwaktu").innerHTML = hours + " jam : " + minutes + " menit"; // watch for spelling
    //document.getElementById("divwaktu").innerHTML = hours + ":" + minutes + ":" + seconds + ""; // watch for spelling
}
</script>
</head>
<!-------navbar------>
<div class="preloader">
  <div class="loading">
    <i class="fa fa-refresh fa-spin" style="font-size:54px"></i>
  </div>
</div>
<div id="result"></div>
<body class="font-medium" style="background-color:#FFFFFF">

<?php
	$querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='2'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($oo = mysqli_fetch_array ($querydosen)){
						    $warna =$oo['warna'];
						    $warna = str_replace("blue", "#2e6499", $warna);
                            $warna = str_replace("red", "#dd4b39", $warna);
                            $warna = str_replace("yellow", "#f39c12", $warna);
                            $warna = str_replace("green", "#00a65a", $warna);
                            $warna = str_replace("purple", "#605ca8", $warna);
?>
<header style="background-color:white ; ">
    <div class="group">
        <center><b><div id="app" class="preview" style="background-color:white"></b></center>
        </div>
    </div>
</header>


<header style="background-color:<?php echo $warna;?> ; ">
    <div class="group">
        <div class="left" style="background-color:<?php echo $warna;?>"><img src="../aset/foto/<?php echo $xx['logo_ujian'];?>" style=" margin-left:0px;"></div>
        <?php }?>
    	    <div class="right">
			    <table width="100%" border="0" cellspacing="5px;" style="margin-top:10px">   
				<tbody><tr><td rowspan="3" width="100px" align="center"><img src="avatar.gif" style=" margin-left:0px; margin-top:5px" class="foto"></td>
				</tr><tr><td><span class="user"><?php echo $nama; ?><br><?php echo $kelas; ?></span></td></tr>
				<tr><td><span class="log"><a href="../on-admin/index.php"><h5>Back to Home <i class="fa fa-home"></i></a></h5></span></td></tr>
			    </table>
            </div>
    </div>
</header>
        <div id="timer" class="list-group-item top-heading">
                <!-------no soal------>
                <body onload=init() onunload=keluar()>
                <div class="btn-group" role="group" aria-label="Basic example">
                <button id="btni" type="button" class="btn btn-danger"><b>SISA WAKTU</b> <i class="fa fa-clock-o fa-spin"></i></button>
                <button type="button" class="btn btn-default" id="divwaktu"></button>
                </div>
                </body>
        </div>
        <div id="oket" class="resizer">
        <div class="btn-group" role="group" aria-label="Basic example">
        <button id="ket" type="button" class="btn btn-default"><b>Ukuran Font Soal : </b></button>    
        <button id="ket1" type="button" class="sm btn btn-default">A</button>  
        <button id="ket2" type="button" class="md btn btn-default">A</button>  
        <button id="ket3" type="button" class="lg btn btn-default">A</button>  
		</div>
	    </div>
<div class="container-fluid" style="width: 100%; height: 529px; overflow-y: scroll;">
<form action="../index.php" method="post" id="form1" name="form1">
    <div id="responsecontainer">
</div>
<div class="list-group-item top-heading"> 
<div class="divs">
    <?php
    include "getsoal.php";
    ?>
</div>
<br><br>
<div id="garistom" class="list-group-item top-heading">
<div class="tombol"> 
 <a id="prev">
 <button id="prev" class='btn btn-primary xxxx' style='float: left;'>
 <span class="hidden-lg hidden-md"><i class="fa fa-chevron-left"></i> PREV</span>
 <span class="hidden-xs hidden-sm"><i class="fa fa-chevron-left"></i> SOAL SEBELUMNYA</span>
 </button></a>
 <a id="next">
 <button id="next" class='btn btn-primary xxxx' style='float: right;'>
 <span class="hidden-lg hidden-md">NEXT <i class="fa fa-chevron-right"></i></span>
 <span class="hidden-xs hidden-sm">SOAL BERIKUTNYA <i class="fa fa-chevron-right"></i></span>
 </button></a>
</div>
</div>
<div id="ModalImport" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Konfirmasi</h4>
		</div>
			<div class="modal-body">
				<div class="container">
					<div class="panel-heading">
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="yak" type="button" class="btn btn-danger btn-sm"><b>kamu masih memiliki sisa waktu</b> <i class="fa fa-clock-o fa-spin"></i></button>
                        <br><br><br>
                    </div>
				        <label class="container">&emsp; Periksa semua jawaban !!!
                          <input id="input3" type="checkbox" name="completed3" value="35" required >
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">&emsp; Semua Soal terisi dengan benar
                          <input id="input4" type="checkbox" name="completed4" value="35" required >
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">&emsp; Soal tidak akan bisa dikerjakan kembali jika sudah menekan tombol selesai
                          <input id="input5" type="checkbox" name="completed5" value="35" required >
                          <span class="checkmark"></span>
                        </label>
                      <a href="../on-admin/index.php"><button id="yakin" class='btn btn-success'><i class="fa fa-home"></i> Back to Home</button></a>
					  <br><br>
					  </div><!-- /.box-body -->
				</div><!-- /.box -->
            </div><!-- /.modal body -->
        </div><!-- /.row -->
	</div>
</div>
</div>
</div>
<?php
include "footer.php";
?>
</div>
<div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>

<div id="sidenav" class="sidenav">
  <div id="slidebtn" class="slideBtn">
    <div class="btn-group btn-group-md">
        
  <button id="hm" type="button" class="btnnav btn"><i class="fa fa-chevron-left"></i> <b>SOAL</b></button>
    </div>
  </div>  
  <div id='pagin' class="pagination"></div>
</div>

<div id="main"></div>
<script>
    $(document).ready(() => {
  const button = $("#hm");

  button.click(() => {
    if (button.text() == " ") {
      button.html('<i class="fa fa-chevron-left"></i> <b>SOAL</b>');
    } else {
      button.html('<i class="fa fa-chevron-right"></i> ');
    }
  });
});
</script>
<script src="jquery.resizer.min.js"></script>
<script type="text/javascript" src="typewriter.js"></script>
<script>
var app = document.getElementById('app');

var typewriter = new Typewriter(app, {
    loop: true
});

typewriter.typeString(' PREVIEW ONLY !!!')
    .pauseFor(1500)
    .deleteAll()
    .typeString(' CBT | E-School !!')
    .pauseFor(1500)
    .deleteChars(11)
    .typeString(' tampilan ujian siswa...')
    .start();
</script>
<script>
	$(".resizable-content").resizable();
</script>

<script type="text/javascript"> 
$(document).ready(function(){
    $(".divs > div").each(function(e) {
        if (e != 0)
            $(this).hide();
    });

    $("#next").click(function(){
        if ($(".divs div:visible").next().length != 0){
            $(".divs div:visible").next().show().prev().hide();

            if($(".divs div:visible").next().length == 0){
                //1. Hide the two buttons


                //3. Show the results
                var divs = $(".divs div:visible").prevAll().clone();
                divs.show();

                //Reverse the order
                var divs = jQuery.makeArray(divs);
                divs.reverse();
                $(".your-quiz-result")
                    .empty()
                    .append(divs);
            }
        }
        return false;
    });

    $("#prev").click(function(){
        if ($(".divs div:visible").prev().length != 0){
            console.log("There are still elements");
            $(".divs div:visible")
                .prev()
                .show()
                .next()
                .hide();
        }
        else {
            //2. Can't go previous first div
            console.log("Can't go previous first div");
        }
        return false;
    });
});
    	pageSize = 1;

	var pageCount =  $(".soalnye").length / pageSize;
    
     for(var i = 0 ; i<pageCount;i++){
        
       $("#pagin").append('<li><a id="navsoal'+(i+1)+'" href="#" class="xxxx">'+(i+1)+'</a></li> ');
     }
        $("#pagin li").first().find("a").addClass("current")
    showPage = function(page) {
	    $(".soalnye").hide();
	    $(".soalnye").each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });        
	}
    
	showPage(1);

	$("#pagin li a").click(function() {
	    $("#pagin li a").removeClass("current");
	    $(this).addClass("current");
	    showPage(parseInt($(this).text())) 
	});
</script>
</form>
<script>
$(document).ready(function(){
  $(".slideBtn").click(function(){    
    if($("#sidenav").width() == 0){      
        document.getElementById("sidenav").style.width = "250px";
        document.getElementById("main").style.paddingRight = "250px";
        document.getElementById("slidebtn").style.paddingRight = "250px";
    }else{
        document.getElementById("sidenav").style.width = "0";
        document.getElementById("main").style.paddingRight = "0";
        document.getElementById("slidebtn").style.paddingRight = "0";
    }
  });
});
</script>
<script>
$(".preloader").delay(200).fadeOut();
</script>
<script>
 $('.xxxx').click(function() {
     $('.preloader').show(); 
	 $(".preloader").delay(200).fadeOut();
     return true;
 });
 </script>
<?php
    include "bundle/scriptsoal.php";
    include "bundle/ragu_script.php";
?>
</body>

</html>
<?php }?>