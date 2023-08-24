<?php 

include ('../koneksi.php');
include ('conn/cek.php');
include ('conn/data_echo.php');
include ('conn/fungsi.php');

?>
<?php
$query = mysqli_query ($konek, "SELECT * FROM soal WHERE kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode'");
						if($query == false){
						die ("Terjadi Kesalahan : ". mysqli_error($konek));
						$o=1;
						}
						while ($ar = mysqli_fetch_array ($query)){
						$result = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$ar[kodesoal]'");
						$rows = mysqli_num_rows($result);
						$ks=$ar["kodesoal"];
						$km=$ar["kodemapel"];
						$ip=$ar["kunci"];
						if(!$ar['gambarsoal']=='')
				        {
					    $gambarsoal = "<img src='../on-admin/images/$ar[gambarsoal]' alt='Nature' class='responsive' align=center width=400pk height=auto ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
					    }
						$o++;
						if($i==$rows)
				        {
					    $sampun = "<button id='selesai' type='button' class='btn btn-success' data-target='#ModalImport' data-toggle='modal'><i class='fa fa-check'></i> SELESAI</button>";
				        }
				        else
				        {
					    $sampun = "";
					    }
						
	
	
?>
<script>
    var w = document.getElementById("jawabansiswaA<?php echo $o; ?>");
    var x = document.getElementById("jawabansiswaB<?php echo $o; ?>");
    var y = document.getElementById("jawabansiswaC<?php echo $o; ?>");
    var z = document.getElementById("jawabansiswaD<?php echo $o; ?>");
    var e = document.getElementById("jawabansiswaE<?php echo $o; ?>");

    if(w.checked) {
         $('#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanA.jpg')").css("background-size","cover")
            .css("color","white");
    } 
    else if (x.checked) {
        $('#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanB.jpg')").css("background-size","cover")
            .css("color","white");
    }
    else if (y.checked) {
        $('#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanC.jpg')").css("background-size","cover")
            .css("color","white");
    }
    else if (z.checked) {
        $('#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanD.jpg')").css("background-size","cover")
            .css("color","white");
    }
     else if (e.checked) {
        $('#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanE.jpg')").css("background-size","cover")
            .css("color","white");
    }
	
    $('.cls<?php echo $o; ?> input').click(function(){
   
    if($(this).attr("id") == "jawabansiswaA<?php echo $o; ?>")
            $('a#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanA.jpg')").css("background-size","cover")
            .css("color","white");
    else if($(this).attr("id") == "jawabansiswaB<?php echo $o; ?>")
            $('a#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanB.jpg')").css("background-size","cover")
            .css("color","white");
    else if($(this).attr("id") == "jawabansiswaC<?php echo $o; ?>")
            $('a#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanC.jpg')").css("background-size","cover")
            .css("color","white");
    else if($(this).attr("id") == "jawabansiswaD<?php echo $o; ?>")
            $('a#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanD.jpg')").css("background-size","cover")
            .css("color","white");
    else if($(this).attr("id") == "jawabansiswaE<?php echo $o; ?>")
            $('a#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanE.jpg')").css("background-size","cover")
            .css("color","white");

  });
</script> 
<script>
    var f = document.getElementById("token<?php echo $o; ?>");


    if(f.value) {
         $('#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanU.jpg')").css("background-size","cover")
            .css("color","white");
    } 
    else if(f.empty) {
         $('#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pil.jpg')").css("background-size","cover")
            .css("color","white");
    } 
	
    $('.cls<?php echo $o; ?> textarea').change(function(){
   
    if($(this).attr("id") == "token<?php echo $o; ?>")
            $('a#navsoal<?php echo $o; ?>').css("background-image","url('mesin/pilihanU.jpg')").css("background-size","cover")
            .css("color","white");
			

  });
</script> 
<script>
                if (document.getElementById('jawabbenar<?php echo $o; ?>').checked) {
                        $('#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
                                .css("color", "white");
                } else if (document.getElementById('jawabsalah<?php echo $o; ?>').checked) {
                        $('#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
                                .css("color", "white");
                }

                $('.cls<?php echo $o; ?> input').click(function() {

                        if ($(this).attr("id") == "jawabbenar<?php echo $o; ?>")
                                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
                                .css("color", "white");
                        else if ($(this).attr("id") == "jawabsalah<?php echo $o; ?>")
                                $('a#navsoal<?php echo $o; ?>').css("background-image", "url('mesin/pilihanU.jpg')").css("background-size", "cover")
                                .css("color", "white");


                });
</script>
<?php
} ?>