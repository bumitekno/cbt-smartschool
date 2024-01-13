<?php
error_reporting(-1);
session_start();
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');

mysqli_query($konek, "update siswa set statuslogin='1'where nis='$nis'");
$query = mysqli_query($konek, "SELECT * FROM soal CROSS JOIN jawaban USING (kodesoal) WHERE nis='$nis' ORDER by RAND ()");
if ($query == false) {
  die("Terjadi Kesalahan : " . mysqli_error($konek));
  $i = 1;
}
while ($ar = mysqli_fetch_array($query)) {
  date_default_timezone_set('Asia/Jakarta');

  $saiki = date('H:i:s');
  $lama = time();
  $saikii = date("H:i:s", $lama);
  $awal = strtotime($saikii);
  $mulai = $ar['mulaiujian'];
  $last = $ar['waktuselesai'];
  $mulailah = $saikii - $mulai;
  $akhir = strtotime($ar['waktuselesai']);
  $awalah = $awal + $mulailah;
  $akhirlah = $akhir + $mulailah;
  $sisa = $akhirlah - $awalah;
  $selisih = ($ar['waktu'] * 60) - $ar['sisawaktu'];
  $sisanya = $sisa - $selisih;
  $wkt = $ar['waktu'] * 60;
  $lama = time();
  $buyar = $wkt + $lama;
  $waktune = $ar['sisawaktu'];
  $result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
  $rows = mysqli_num_rows($result);
  $code = $ar['kodemapel'];
  $codesoal = $ar['kodesoal'];
}
?>
<html class="no-js" lang="en">
<html class="no-js" lang="en">
<?php
// include "bundle/script.php";
include "bundle/bundle_script.php";
$qq = mysqli_query($konek, "SELECT * FROM profil where id='1'");
if ($qq == false) {
  die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($xx = mysqli_fetch_array($qq)) {
  ?>
  <!-------warna #2e6499------>
  <link type="text/css" href="./js/resizer.css" rel="stylesheet">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
      <?php echo $xx['n_sekolah']; ?>
    </title>
    <link href="../aset/foto/<?php echo $xx['logo']; ?>" rel="icon" type="image/png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include "bundle/css.php";
    include "bundle/navsoal.php";
    include "bundle/ragu_css.php";
    ?>
    <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="mesin/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
      #us {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #000;
        opacity: 0.4;
        filter: alpha(opacity=80);
      }

      .save .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
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
        transform: translate(-50%, -50%);
        font: 14px arial;
      }

      .affix {
        top: 0;
        width: 100%;
        z-index: 9999 !important;
      }

      .affix+.container-fluid {
        padding-top: 70px;
      }

      #opsihidden {
        display: none;
      }

      #opsishow {
        display: block;
      }

      #opsiuraihidden {
        display: none;
      }

      #opsiuraishow {
        display: block;
      }
    </style>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      var count = '<?php echo $sisa; ?>';
      var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

      function timer() {
        count = count - 1;
        if (count == -1) {
          document.getElementById("form1").submit();
          return;
        }

        var seconds = count % 60;
        var minutes = Math.floor(count / 60);
        var hours = Math.floor(minutes / 60);
        minutes %= 60;
        hours %= 60;

        document.getElementById("divwaktu").innerHTML = hours + " jam : " + minutes + " menit"; // watch for spelling
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
    <div class="container-fluid" style="width: 100%; height: 100%; overflow-y: scroll;">
      <?php
      $querydosen = mysqli_query($konek, "SELECT * FROM theme where id='2'");
      if ($querydosen == false) {
        die("Terjadi Kesalahan : " . mysqli_error($konek));
      }
      while ($oo = mysqli_fetch_array($querydosen)) {
        $warna = $oo['warna'];
        $warna = str_replace("blue", "#2e6499", $warna);
        $warna = str_replace("red", "#dd4b39", $warna);
        $warna = str_replace("yellow", "#f39c12", $warna);
        $warna = str_replace("green", "#00a65a", $warna);
        $warna = str_replace("purple", "#605ca8", $warna);
        ?>
        <header style="background-color:<?php echo $warna; ?> ; ">
          <div class="group">
            <div class="left" style="background-color:<?php echo $warna; ?>"><img
                src="../aset/foto/<?php echo $xx['logo_ujian']; ?>" style=" margin-left:0px;"></div>
          <?php } ?>
          <div class="right">
            <table width="100%" border="0" cellspacing="5px;" style="margin-top:10px">
              <tbody>
                <tr>
                  <td rowspan="3" width="100px" align="center"><img src="mesin/avatar.gif"
                      style=" margin-left:0px; margin-top:5px" class="foto"></td>
                </tr>
                <tr>
                  <td><span class="user">
                      <?php echo $nama; ?><br>
                      <?php echo $kelas; ?>
                    </span></td>
                </tr>
                <tr>
                  <td><span class="log"><a href="#">
                        <?php echo $code; ?> |
                        <?php echo $codesoal; ?>
                      </a><span></span></span></td>
                </tr>
            </table>
          </div>
        </div>
      </header>
      <!-- Modal logout -->
      <div id="Modalout" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Logout Confirm</h4>
            </div>
            <div class="modal-body">
              <center>Kamu belum menyelesaikan soal ujian ini. Yakin ingin keluar ??</center>
            </div>
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
              <a href="logout.php" class="btn btn-danger">keluar</a>
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      <div id="timer" class="list-group-item top-heading pb-5">
        <!-------no soal------>

        <body>
          <div class="btn-group" role="group" aria-label="Basic example">
            <button id="btni" type="button" class="btn btn-danger"><b>SISA WAKTU</b> <i
                class="fa fa-clock-o fa-spin"></i></button>
            <button type="button" class="btn btn-default" id="divwaktu"></button>
          </div>
        </body>
      </div>
      <div id="result"></div>
      <div id="oket" class="resizer">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button id="ket" type="button" class="btn btn-default"><b>Ukuran Font Soal : </b></button>
          <button id="ket1" type="button" class="sm btn btn-default">A</button>
          <button id="ket2" type="button" class="md btn btn-default">A</button>
          <button id="ket3" type="button" class="lg btn btn-default">A</button>
        </div>
      </div>

      <form action="jawab.php" method="post" id="form1" name="form1">
        <div class="list-group-item top-heading">
          <div class="divs">
            <?php
            include "getsoal.php";
            ?>
          </div>
          <br><br>


          <!-- <div id="garistom" class="list-group-item top-heading">
            <div class="tombol">
              <a id="prev">
                <div id="prev" class='btn btn-primary xxxx'>
                  <span class="d-block d-sm-none"><i class="fa fa-chevron-left"></i> PREV</span>
                  <span class="d-none d-sm-block"><i class="fa fa-chevron-left"></i> SOAL SEBELUMNYA</span>
                </div></a>
              <a id="done"> 
                <div id="done" class='btn btn-success xxxx' data-bs-target='#ModalImport' data-bs-toggle='modal'
                  style="border-radius:0;"> <span class='d-block d-sm-none'><i class='fa fa-check'></i> FINISH</span>
                  <span class='d-none d-sm-block'><i class='fa fa-check'></i> MENYELESAIKAN UJIAN</span> 
                </div>
              </a>
              <a id="next">
                <div id="next" class='btn btn-primary xxxx'>
                  <span class="d-block d-sm-none">NEXT <i class="fa fa-chevron-right"></i></span>
                  <span class="d-none d-sm-block">SOAL BERIKUTNYA <i class="fa fa-chevron-right"></i></span>
                </div></a>
            </div>
          </div> -->


          <div id="ModalImport" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                      aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <div class="panel-heading">
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button id="yak" type="button" class="btn btn-danger btn-sm"><b>kamu masih memiliki sisa waktu</b>
                        <i class="fa fa-clock-o fa-spin"></i></button>
                      <br><br><br>
                    </div>
                    <label class="container">&emsp; Periksa semua jawaban !!!
                      <input id="input3" type="checkbox" name="completed3" value="35" required>
                      <span class="checkmark"></span>
                    </label>
                    <label class="container">&emsp; Semua Soal terisi dengan benar
                      <input id="input4" type="checkbox" name="completed4" value="35" required>
                      <span class="checkmark"></span>
                    </label>
                    <label class="container">&emsp; Soal tidak akan bisa dikerjakan kembali jika sudah menekan tombol
                      selesai
                      <input id="input5" type="checkbox" name="completed5" value="35" required>
                      <span class="checkmark"></span>
                    </label>
                    <button id="yakin" type='submit' class='btn btn-success'> SELESAI</button>
                    <br><br>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.modal body -->
            </div><!-- /.row -->
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
      <div id='pagin' class="pagination row"></div>
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
    <script src="./js/jquery.resizer.min.js"></script>
    <?php
    include "bundle/scriptsoal.php";
    include "bundle/ragu_script.php";
    ?>
    <script>
      $(".resizable-content").resizable();
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
        $(".divs > div").each(function (e) {
          if (e != 0)
            $(this).hide();
        });

        // Next Prev diganti karena error tdk bisa menyimpan jawaban

        // $("#next").click(function () {
        //   //alert("Hello! I am an alert box!");
        //   if ($(".divs div:visible").next().length != 0) {
        //     $(".divs div:visible").next().show().prev().hide();

        //     if ($(".divs div:visible").next().length == 0) {
        //       //1. Hide the two buttons

        //       //3. Show the results
        //       var divs = $(".divs div:visible").prevAll().clone();
        //       divs.show();

        //       //Reverse the order
        //       var divs = jQuery.makeArray(divs);
        //       divs.reverse();
        //       $(".your-quiz-result")
        //         .empty()
        //         .append(divs);

        //     }

        //   }
        //   return false;
        // });

        // $("#prev").click(function () {
        //   if ($(".divs div:visible").prev().length != 0) {
        //     console.log("There are still elements");
        //     $(".divs div:visible")
        //       .prev()
        //       .show()
        //       .next()
        //       .hide();
        //   }
        //   else {
        //     //2. Can't go previous first div
        //     console.log("Can't go previous first div");
        //   }

        //   return false;
        // });

        // Page sekarang
        var pageNow = 1;

        $(".next").click(function () {
          
          //cek jika sampai akhir tdk bisa eksekusi
          if($(this).data("id") == pageCount){
            return false;
          }

          // Memberikan current page pada pagination

          $("#pagin li a").removeClass("text-primary");
          let numberPage = parseInt($(this).data("id")+1);
          $("#navsoal" + numberPage).addClass("text-primary");
          
          showPage($(this).data("id") + 1);
        });

        $(".prev").click(function () {
          
          //cek jika sampai awal tdk bisa eksekusi
          if($(this).data("id") == 1){
            return false;
          }

          // Memberikan current page pada pagination

          $("#pagin li a").removeClass("text-primary");
          let numberPage = parseInt($(this).data("id")-1);
          $("#navsoal" + numberPage).addClass("text-primary");

          showPage($(this).data("id") - 1);
        });


      });

      pageSize = 1;
      var pageCount = $(".soalnye").length / pageSize;

      // Menampilkan page disidebar kanan
      for (var i = 0; i < pageCount; i++) {
        $("#pagin").append('<li class="col-4"><a id="navsoal' + (i + 1) + '" href="#" class="xxxx">' + (i + 1) + '</a></li> ');
      }
      $("#pagin li").first().find("a").addClass("current")

      showPage = function (page) {
        console.log(`pageNow ${page}`);
        $(".soalnye").hide();
        $(".soalnye").each(function (n) {
          if (n >= pageSize * (page - 1) && n < pageSize * page)
            $(this).show();
        });
      }

      showPage(1);
      
      $("#pagin li a").click(function () {
        $("#pagin li a").removeClass("text-primary");
        $(this).addClass("text-primary");
        pageNow = parseInt($(this).text())
        showPage(parseInt($(this).text()))
      });

      $(document).ready(function () {
        autosave();
      });

      function autosave() {
        var t = setTimeout("autosave()", 60000); // autosave 10 detikan

        var waktuselesai = $("#waktuselesai").val();
        var mulaiujian = $("#mulaiujian").val();
        var sisawaktu = $("#sisawaktu").val();
        var jawabansiswa<?php echo $ar['nomersoal']; ?> = $("#jawabansiswa<?php echo $ar['nomersoal']; ?>").val();

        if (waktuselesai != '' && mulaiujian != '' && sisawaktu != '') {
          $.ajax({
            type: "POST",
            url: "autosave.php",
            data: $('form').serialize(),
            cache: false,
            success: function (pesan) {
              $("#waktu").empty().append(pesan);
            }
          });
        }

        setInterval(() => { autosave }, 60000);
      }

    </script>
    </form>
    <script>
      $(document).ready(function () {
        $(".slideBtn").click(function () {
          if ($("#sidenav").width() == 0) {
            document.getElementById("sidenav").style.width = "250px";
            document.getElementById("main").style.paddingRight = "250px";
            document.getElementById("slidebtn").style.paddingRight = "250px";
          } else {
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
      $('.xxxx').click(function () {
        $('.preloader').show();
        $(".preloader").delay(200).fadeOut();
        return true;
      });
    </script>

  </body>

  </html>
<?php } ?>