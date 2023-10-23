<?php
error_reporting(0);
include('../koneksi/koneksi.php');
$querydosen = mysqli_query($konek, "SELECT * FROM profil where id='1'");
if ($querydosen == false) {
  die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($ar = mysqli_fetch_array($querydosen)) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
    <title>E-CBT Smasrtschool</title>
    <link rel="shortcut icon" href="../aset/foto/<?php echo $ar['logo']; ?>">
    <link rel="stylesheet" href="css/reset.min.css">
    <link rel='stylesheet prefetch' href='css/font.css'>
    <link rel="stylesheet" href="css/style.css">
    <style>
      img {
        border-radius: 20%;
      }
    </style>
    <style type="text/css">
      .bg::before {
        content: '';
        background-image: url('./background2.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        position: absolute;
        z-index: -1;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        /* filter: blur(7px) grayscale(20%); */
        height: 100%;
        width: 100%;
      }

      a:link {
        /* Applies to all unvisited links */
        text-decoration: none;
      }

      a:visited {
        /* Applies to all visited links */
        text-decoration: none;

      }

      a:hover {
        /* Applies to links under the pointer */
        text-decoration: none;
      }

      a:active {
        /* Applies to activated links */
        text-decoration: none;
      }

      .field-icon {
        color: #afafaf;
        float: right;
        margin-left: 220px;
        margin-top: -45px;
        position: relative;
        z-index: 2;
      }

      #blink {
        animation: shake 0.82s cubic-bezier(.36, .07, .19, .97) both;
        transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        perspective: 1000px;
      }

      @keyframes shake {

        10%,
        90% {
          transform: translate3d(-1px, 0, 0);
        }

        20%,
        80% {
          transform: translate3d(2px, 0, 0);
        }

        30%,
        50%,
        70% {
          transform: translate3d(-4px, 0, 0);
        }

        40%,
        60% {
          transform: translate3d(4px, 0, 0);
        }
      }
    </style>
  </head>

  <body class="bg">
    <!-- Form Mixin-->
    <!-- Input Mixin-->
    <!-- Button Mixin-->
    <!-- Pen Title-->
    <div class="pen-title">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Form Module-->
      <header class="head pt-4">
        <!-- <a href="<?php echo $ar['web']; ?>" style="position: absolute; color: white; left: 30px;"><i
                    class="fa fa-arrow-left" aria-hidden="true"></i></a> -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <center>
                <table>
                  <tr>
                    <td rowspan="2" style="width: 20%"><img style="width: 82px"
                        src="../aset/foto/<?php echo $ar['logo']; ?>" width=310>
                    </td>
                    <td style="width: 60%;">
                      <h1 style="color:#ffffff; text-align:center; font-family:times new rowman;">
                        E CBT</h1>
                    </td>
                    <td rowspan="2" style="width: 20%"><img style="width: 82px"
                        src="../aset/foto/<?php echo $ar['logo_kota']; ?>" alt="">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p
                        style="color:#ffffff; text-align:center; text-transform: uppercase; font-family:times new rowman;">
                        <?php echo $ar['n_sekolah']; ?>
                      </p>
                    </td>
                  </tr>
                </table>
                <div class="upper">
                </div>
              </center>
            </div>
          </div>
        </div>
      </header>
      <br>
      <div class="module form-module">
        <div class="togg1le" style="background-color:white;color:grey;">
          <!-- <i class="fa fa-times fa-lock"></i> -->
        </div>
        <div class="form">
          <!-- <img src="../aset/foto/<?php echo $ar['logo']; ?>" height="100" width="auto" onError="this.onerror=null;" ><br><br> -->
          <h2><i class="fa fa-user"></i><br> Login Admin</h2>
          <form action="vl_admin.php" class="inner-login" method="post">
            <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username" required>
            <input id="password-field" type="password" class="form-control" name="password" placeholder="Password"
              required>
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            <br><button style="border-radius:20px">Login</button>
          </form>
          <br>
          <a href="../index.php"><button style="border-radius:20px; color: #ffffff" ;><b>CBT PESERTA</b></button></a>

          <?php if (!empty($_GET['salah'])) {
            echo "<h5 id='blink' style='color: red';>Username atau Password salah</h3>";
          }
          ?>
        </div>
        <!-- <div id="dev" class="form">
      <img src="../aset/foto/dev.jpg" height="100" width="auto" onError="this.onerror=null;" ><br><br>
    <h2><i class="fa fa-user-secret"></i> Developed by :</h2>
    <form action="vl_admin.php" class="inner-login" method="post">
      <h5>Betara Gludug Banyu Murti</h5>
      <br>
      <a href="tel:+6281230674728" style='font-decoration:none;color:#222;'><i class="fa fa-phone"></i> Call me +6281230674728</a> 
      <br><br>
      <a href="https://www.youtube.com/channel/UClyH2xK1K7bojvzNOPO4l5g" style='font-decoration:none;color:#222;'><i class="fa fa-youtube"></i> my Vlog</a>
      <br><br>
      <a href="mailto:betaragludugbanyumurti@gmail.com?Subject=Hello%20admin" target="_top" style='font-decoration:none;color:#222;'><i class="fa fa-inbox"></i> E- Mail</a>
      <br>      
    </form>
  </div> -->
        <div class="cta"><a href="<?php echo $ar['web']; ?>">
            <h5><b>&copy;
                <?php echo date('Y') ?>
              </b></h5>
            <?php echo $ar['n_sekolah']; ?>
          </a></div>
      <?php } ?>
    </div>
    <script src='js/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <script>
      $(".toggle-password").click(function () {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
      $(".toggle-password2").click(function () {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    </script>
</body>

</html>