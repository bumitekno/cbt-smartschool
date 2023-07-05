<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
mysqli_query ($konek, "DROP TABLE siswa");
$filer=$_GET['filer'];
?>
<!DOCTYPE html>
<html>
<head>
<title>update....</title>
<link rel="shortcut icon" type="image/icon" href="../favio.ico">
</head>

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
   background-image: url('../images/loading.gif');
   background-repeat: no-repeat; 
   background-color: #FFF;
   background-position: center;
   background-size:150px 150px;
}
</style>
<body onload="onLoadSubmit()">
    <div class="preloader"></div>
<form action="syncron_progress3.php" method="post" class="formon" id="formon" name="formon">	
<input type="hidden" name="filer" value="<?php echo $filer; ?>">
<input type="submit" id="clot" value=""/>				        
</form>	
</body>
</html>
<script language="javascript">
function onLoadSubmit() {
	document.formon.submit();
}
</script>