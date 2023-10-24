<?php
include('../koneksi.php');
include('conn/cek.php');
include('conn/data_echo.php');
include('conn/fungsi.php');

$query = mysqli_query($konek, "SELECT * FROM soal CROSS JOIN jawaban USING (kodesoal) WHERE nis='$username'");
if ($query == false) {
    die("Terjadi Kesalahan : " . mysqli_error($konek));
    $o = 1;
}
while ($ar = mysqli_fetch_array($query)) {
    $result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
    $rows = mysqli_num_rows($result);

    $o++;
    if ($i == $rows) {
        $sampun = "<button id='selesai' type='button' class='btn btn-success' data-target='#ModalImport' data-toggle='modal'><i class='fa fa-check'></i> SELESAI</button>";
    } else {
        $sampun = "";
    }
    ?>
    <script>
        var w = document.getElementById("jawabansiswaA<?php echo $o; ?>");
        var x = document.getElementById("jawabansiswaB<?php echo $o; ?>");
        var y = document.getElementById("jawabansiswaC<?php echo $o; ?>");
        var z = document.getElementById("jawabansiswaD<?php echo $o; ?>");
        var e = document.getElementById("jawabansiswaE<?php echo $o; ?>");

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

        $('body').on('click', '.cls<?php echo $o; ?> input', function () {

            console.log('test');

            if ($(this).attr("id") == "jawabansiswaA<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanA.jpg')").css("background-size", "cover")
                    .css("color", "white");
            else if ($(this).attr("id") == "jawabansiswaB<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanB.jpg')").css("background-size", "cover")
                    .css("color", "white");
            else if ($(this).attr("id") == "jawabansiswaC<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanC.jpg')").css("background-size", "cover")
                    .css("color", "white");
            else if ($(this).attr("id") == "jawabansiswaD<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanD.jpg')").css("background-size", "cover")
                    .css("color", "white");
            else if ($(this).attr("id") == "jawabansiswaE<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanE.jpg')").css("background-size", "cover")
                    .css("color", "white");
            else if ($(this).attr("id") == "jawabansiswaT<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "none").css("background-size", "cover")
                    .css("color", "blue").css('background-color', 'coral');
            else if ($(this).attr("id") == "jawabansiswaF<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "none").css("background-size", "cover")
                    .css("color", "blue").css('background-color', 'coral');
            else if ($(this).attr("id") == "jawabansiswaAPK<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "none").css("background-size", "cover")
                    .css("color", "blue").css('background-color', 'green');
            else if ($(this).attr("id") == "tokenjd<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "none").css("background-size", "cover")
                    .css("color", "blue").css('background-color', 'red');

        });

        var f = document.getElementById("token<?php echo $o; ?>");
        if (f != null && f.value) {
            $('#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
                .css("color", "white");
        }

        $('.cls<?php echo $o; ?> textarea').change(function () {
            if ($(this).attr("id") == "token<?php echo $o; ?>")
                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
                    .css("color", "white");
        });
    </script>
    <?php
} ?>