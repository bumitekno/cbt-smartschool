<style>
  #clot {
      background-color:white;
      color:white;
      border:0;
  }  
  .preloader {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   z-index: 9999;
   background-image: url('../../images/loading.gif');
   background-repeat: no-repeat; 
   background-color: #FFF;
   background-position: center;
   background-size:150px 150px;
}
</style>
<?php
include ('../../koneksi/koneksi.php');
include "../bundle/soal_script.php";
$mapel=$_GET['matpel'];
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
$query2 = mysqli_query ($konek, "SELECT * FROM ujian WHERE kodesoal='$kode'");
$ur = mysqli_fetch_array ($query2);
$blmisi=$ur['nilai'];
if(empty($blmisi)) 
	{
        header('location:../soal.php?kosong=1');
				             exit;
    } else {
        $username=$_SESSION['admin'];
    }
						$querydosen = mysqli_query ($konek, "SELECT * FROM soal where kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode' ORDER BY nomersoal ASC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
						$ks=$ar["kodesoal"];
						$km=$ar["kodemapel"];
						$ip=$ar["kunci"];
				        if(!$ar['gambarsoal']=='')
				        {
					    $gambarsoal = "<img src='images/$ar[gambarsoal]' align=center width=500pk height=auto ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
				        }
?>
<script language="javascript">
function onLoadSubmit() {
	document.formon.submit();
}
</script>
<body onload="onLoadSubmit()">
    <div class="preloader"></div>
<form action="aktif-on.php" method="post" class="formon" id="formon" name="formon">	
<input type="hidden" name="km<?php echo "$ar[nomersoal]"; ?>" value="<?php echo $km; ?>">
<input type="hidden" name="ks<?php echo "$ar[nomersoal]"; ?>" value="<?php echo $ks; ?>">
<input type="hidden" name="ip<?php echo "$ar[nomersoal]"; ?>" value="<?php echo $ip; ?>">
<?php }	?>
<input type="submit" id="clot" value=""/>				        
</form>	
</body>