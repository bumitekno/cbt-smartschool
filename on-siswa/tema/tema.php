<?php
	$querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='2'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
?>
<body class='hold-transition skin-<?php echo $ar['warna'];?> sidebar-mini' style='font-family:'Segoe UI''>
<?php }?>