<?php
session_start();
include('conn/cek.php');
include('../koneksi/koneksi.php');
include('conn/fungsi.php');
$sql_mode = mysqli_query($konek, "set @@sql_mode = '';");
$querydosen = mysqli_query($konek, "SELECT * FROM jawaban where nis='$username'");
if ($querydosen == false) {
    die("Terjadi Kesalahan : " . mysqli_error($konek));
}
while ($ar = mysqli_fetch_array($querydosen)) {
    $waktune = $ar['waktu'] * 60;
    date_default_timezone_set('Asia/Jakarta');
    $saiki = date('H:i:s');
    $lama = time();
    $buyar = $waktune + $lama;
    $result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
    $rows = mysqli_num_rows($result);
    if (!$ar['aktif'] == '1') {
        $aktif = "<span style=color:red>Tidak Aktif</span>";
    } else {
        $aktif = "Aktif";
    }
    if ($aktif == '1') {
        $tombol = "Tidak Aktif";
    } else {
        $tombol = '<br><button id="konfir" type="submit" class="btn btn-success"><b>MULAI</b></button>
                        </div>';
    }
    ?>
    <?php
    include "bundle/script.php";
    include "bundle/bundle_script.php";
    $qq = mysqli_query($konek, "SELECT * FROM profil where id='1'");
    if ($qq == false) {
        die("Terjadi Kesalahan : " . mysqli_error($konek));
    }
    while ($xx = mysqli_fetch_array($qq)) {
        ?>
        <html class="no-js" lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title>
                <?php echo $xx['n_sekolah']; ?>
            </title>
            <link href="../aset/foto/<?php echo $xx['logo']; ?>" rel="icon" type="image/png">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                .no-close .ui-dialog-titlebar-close {
                    display: none;
                }
            </style>
            <style>
                .left {
                    float: left;
                    width: 65%;
                }

                .right {
                    float: right;
                    width: 30%;
                    background-color: #333333;
                    height: 101px;
                    color: #FFFFFF;
                    font-size: 13px;
                    font-style: normal;
                    font-weight: normal;
                }

                .user {
                    color: #FFFFFF;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: bold;
                    top: -20px;
                }

                .log {
                    color: #3799c2;
                    font-size: 11px;
                    font-style: normal;
                    font-weight: bold;
                    top: -20px;
                }

                .group:after {
                    content: "";
                    display: table;
                    clear: both;
                }

                /*	img {max-width: 100%; height: auto;}	*/
                .visible {
                    display: block !important;
                }

                .hidden {
                    display: none !important;
                }

                .foto {
                    height: 80px;
                }

                @media screen and (max-width: 780px) {

                    /* jika screen maks. 780 right turun */
                    /*    .left, */
                    .left,
                    .right {
                        float: none;
                        width: auto;
                        margin-top: 0px;
                        height: 91px;
                        color: #FFFFFF;
                        display: block;
                    }

                    .foto {
                        height: 65px;
                    }
                }

                @media screen and (max-width: 400px) {

                    /* jika screen maks. 780 right turun */
                    /*    .left, */
                    .left {
                        width: auto;
                        height: 91px;
                    }

                    .right {
                        float: none;
                        width: auto;
                        margin-top: 0px;
                        height: 60px;
                        color: #FFFFFF;
                    }

                    .foto {
                        height: 40px;
                    }
                }

                #konfir {
                    border-radius: 0;
                    z-index: 0;
                    background-color: #48a845;
                    border: 0;
                    position: absolute;
                    right: 10;
                }

                #garis {
                    border: 0;
                }

                .col-md-6 {
                    margin-top: 100px;
                }

                #progres {
                    border-radius: 0px;
                }

                #doa {
                    border-radius: 0px;
                }

                .footer {
                    position: fixed;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                    background-color: #242a30;
                    color: #565656;
                    text-align: center;
                    font-family: sans-serif;
                }
            </style>
            <style>
                /* The container */
                .container {
                    display: block;
                    position: relative;
                    padding-left: 35px;
                    margin-bottom: 22px;
                    cursor: pointer;
                    font-size: 15px;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }

                /* Hide the browser's default checkbox */
                .container input {
                    position: absolute;
                    opacity: 0;
                    cursor: pointer;
                }

                /* Create a custom checkbox */
                .checkmark {
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 25px;
                    width: 25px;
                    background-color: #eee;
                }

                /* On mouse-over, add a grey background color */
                .container:hover input~.checkmark {
                    background-color: #ccc;
                }

                /* When the checkbox is checked, add a blue background */
                .container input:checked~.checkmark {
                    background-color: #2196F3;
                }

                /* Create the checkmark/indicator (hidden when not checked) */
                .checkmark:after {
                    content: "";
                    position: absolute;
                    display: none;
                }

                /* Show the checkmark when checked */
                .container input:checked~.checkmark:after {
                    display: block;
                }

                /* Style the checkmark/indicator */
                .container .checkmark:after {
                    left: 9px;
                    top: 5px;
                    width: 5px;
                    height: 10px;
                    border: solid white;
                    border-width: 0 3px 3px 0;
                    -webkit-transform: rotate(45deg);
                    -ms-transform: rotate(45deg);
                    transform: rotate(45deg);
                }
            </style>
            <link href="mesin/klien.css" rel="stylesheet">
            <link rel="stylesheet" href="mesin/bootstrap.min.css">
            <script src="mesin/jQuery-2.1.4.min.js"></script>
        </head>

        <body class="font-medium" style="background-color:#cacaca">
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
                                            <?php echo $ar[kelas]; ?>
                                        </span></td>
                                </tr>
                                <tr>
                                    <td><span class="log"><a href="logout.php">Logout</a><span></span></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </header>
            <div class="col-md-6 col-md-offset-3 login-wrapper" style="float:inherit">
                <div class="panel panel-default">
                    <div id="progres" class="progress">
                        <div id="progres" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <form action="start.php" method="post">
                        <div id="garis" class="list-group-item top-heading">
                            <h3 class="list-group-item-heading page-label">Konfirmasi Ujian</h3>
                        </div>
                        <div id="garis" class="list-group-item">
                            <label class="list-group-item-heading">SYARAT PENGERJAAN SOAL :</label>
                            <p class="list-group-item-text">
                            <h6><i>Baca dan ceklis beberapa syarat dibawah ini lalu klik mulai untuk mengerjakan soal !!!</i>
                            </h6>
                            </p>
                        </div>
                        <div id="garis" class="list-group-item top-heading">
                            <button id="doa" type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                data-target="#myModal">DOA Menghadapi ujian</button>
                            <br><br>
                            <label class="container">&emsp; Berdoa Sebelum mengerjakan soal
                                <input id="input3" type="checkbox" name="completed3" value="35" required>
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">&emsp; Jujur dalam mengerjakan soal ujian
                                <input id="input4" type="checkbox" name="completed4" value="35" required>
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">&emsp; Apabila saat tes berlangsung anda meninggalkan halaman ujian, maka
                                tes dianggap selesai
                                <input id="input5" type="checkbox" name="completed5" value="30" required>
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">&emsp; Teliti
                                <input id="input5" type="checkbox" name="completed5" value="30" required>
                                <span class="checkmark"></span>
                            </label>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Doa menghadapi ujian</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h3>
                                                <p>&emsp;&emsp;&emsp;&emsp;&emsp;اَللَّهُمَّ لاَ سَهْلَ إِلاَّ مَا جَعَلْتَهُ
                                                    سَهْلاً وَأَنْتَ تَجْعَلُ الْحَزْنَ إِذَا شِئْتَ سَهْلاً</p>
                                                <br>
                                                <h5>Artinya :
                                                    <i>“Ya Allah! Tidak ada kemudahan kecuali apa yang Engkau jadikan mudah.
                                                        Sedang yang susah bisa Engkau jadikan mudah, apabila Engkau
                                                        menghendakinya.”</i>
                                                </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input id="mulaiujian" name="mulaiujian" type="hidden" value="<?php echo $ar[sisawaktu]; ?>">
                        <?php $queryn = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE nama='$nama' and kodesoal='$kode'");
                        if ($queryn == false) {
                            die("Terjadi Kesalahan : " . mysqli_error($konek));
                        }
                        while ($r = mysqli_fetch_array($queryn)) {
                            $ok = $r["aktif"];
                        }
                        ?>
                        <input id="ok" name="ok" type="hidden" value="<?php echo $ok; ?>">
                        <div id="garis" class="list-group-item">
                            <div class="row">
                                <?php echo "$tombol"; ?>
                            </div>
                        </div>
                    </form>
                    <?php if (!empty($_GET['aktif'])) {
                        echo "&emsp;<a id='ok' href='ujian.php'><button id='ok' type='button' class='btn btn-primary btn-xs' data-toggle='modal'><i class='fa fa-arrow-left'></i> BACK</button></a> <h5 style='color:red;'>&emsp;Ujian siswa <b>AKTIF</b>, Silahkan <b>RESET LOGIN !!</b></h5>";
                    }
                    ?>
                    <?php if (!empty($_GET['sudah'])) {
                        echo "&emsp;<a id='ok' href='ujian.php'><button id='ok' type='button' class='btn btn-primary btn-xs' data-toggle='modal'><i class='fa fa-arrow-left'></i> BACK</button></a> <h5 style='color:red;'>&emsp;Siswa Sudah selesai mengerjakan SOAL ini !!</b></h5>";
                    }
    } ?>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
        </div>
        <script>
            $('input').on('click', function () {
                var emptyValue = 0;
                $('input:checked').each(function () {
                    emptyValue += parseInt($(this).val());
                });
                $('.progress-bar').css('width', emptyValue + '%').attr('aria-valuenow', emptyValue);
            });
        </script>
        <div id="buntut">
    </body>

    </html>
<?php } ?>