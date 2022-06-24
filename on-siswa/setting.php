<?php
	$querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='3'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
?>
<section <?php echo $ar['warna'];?> class="content">
<?php }?>