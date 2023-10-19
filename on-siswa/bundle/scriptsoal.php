<?php

include('../koneksi.php');
include('conn/cek.php');
include('conn/data_echo.php');
include('conn/fungsi.php');

?>
<?php
$query = mysqli_query($konek, "SELECT * FROM soal CROSS JOIN jawaban USING (kodesoal) WHERE nis='$username'");
if ($query == false) {
    die("Terjadi Kesalahan : " . mysqli_error($konek));
    $o = 1;
}
while ($ar = mysqli_fetch_array($query)) {
    $result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
    $rows = mysqli_num_rows($result);
    $ks = $ar["kodesoal"];
    $km = $ar["kodemapel"];
    $ip = $ar["kunci"];
    if (!$ar['gambarsoal'] == '') {
        $gambarsoal = "<img src='../on-admin/images/$ar[gambarsoal]' alt='Nature' class='responsive' align=center width=400pk height=auto ><br>";
    } else {
        $gambarsoal = "";
    }
    $o++;
    if ($i == $rows) {
        $sampun = "<button id='selesai' type='button' class='btn btn-success' data-target='#ModalImport' data-toggle='modal'><i class='fa fa-check'></i> SELESAI</button>";
    } else {
        $sampun = "";
    }
    ?>
    <script>
        function autoget() {

            var w = document.getElementById("jawabansiswaA<?php echo $o; ?>");
            var x = document.getElementById("jawabansiswaB<?php echo $o; ?>");
            var y = document.getElementById("jawabansiswaC<?php echo $o; ?>");
            var z = document.getElementById("jawabansiswaD<?php echo $o; ?>");
            var e = document.getElementById("jawabansiswaE<?php echo $o; ?>");

            var wpk = document.getElementById("jawabansiswaAPK<?php echo $o; ?>");
            var xpk = document.getElementById("jawabansiswaBPK<?php echo $o; ?>");
            var ypk = document.getElementById("jawabansiswaCPK<?php echo $o; ?>");
            var zpk = document.getElementById("jawabansiswaDPK<?php echo $o; ?>");
            var epk = document.getElementById("jawabansiswaEPK<?php echo $o; ?>");

            var k = document.getElementById("jawabansiswaT<?php echo $o; ?>");
            var l = document.getElementById("jawabansiswaF<?php echo $o; ?>");
            var jd = document.getElementById("jawabansiswaJD<?php echo $o; ?>");

            if (w != null && w.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanA.jpg')").css("background-size", "cover")
                    .css("color", "white");
            }
            else if (x != null && x.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanB.jpg')").css("background-size", "cover")
                    .css("color", "white");
            }
            else if (y != null && y.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanC.jpg')").css("background-size", "cover")
                    .css("color", "white");
            }
            else if (z != null && z.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanD.jpg')").css("background-size", "cover")
                    .css("color", "white");
            }
            else if (e != null && e.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanE.jpg')").css("background-size", "cover")
                    .css("color", "white");
            }
            else if (k != null && k.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-image", "none").css("background-size", "cover")
                    .css("color", "green").css('background-color', 'chocolate');
            }
            else if (l != null && l.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-image", "none").css("background-size", "cover")
                    .css("color", "red").css('background-color', 'yellow');
            }
            else if (jd != null && jd.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-size", "cover")
                    .css("color", "blue").css("background-image", "none").css('background-color', 'green');

            }
            else if (wpk != null && wpk.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-size", "cover")
                    .css("color", "blue").css("background-image", "none").css('background-color', 'green');
            } else if (xpk != null && xpk.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-size", "cover")
                    .css("color", "blue").css("background-image", "none").css('background-color', 'green');
            } else if (ypk != null && ypk.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-size", "cover")
                    .css("color", "blue").css("background-image", "none").css('background-color', 'green');
            } else if (zpk != null && zpk.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-size", "cover")
                    .css("color", "blue").css("background-image", "none").css('background-color', 'green');
            } else if (epk != null && epk.checked) {
                $('#navsoal<?php echo $o; ?>').css("background-size", "cover")
                    .css("color", "blue").css("background-image", "none").css('background-color', 'green');
            }

        }
    </script>
    <script>

        $('.cls<?php echo $o; ?> textarea').change(function () {

            if ($(this).attr("id") == "token<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
                    .css("color", "white");


        });
    </script>
    <?php
} ?>