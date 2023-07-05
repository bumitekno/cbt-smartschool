<?php
	$querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='1'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
?>
<body class='hold-transition skin-<?php echo $ar['warna'];?> fixed sidebar-mini sidebar-collapse' style='font-family:'Segoe UI''>
<?php }?>