<?php
	$querydosen = mysqli_query ($konek, "SELECT * FROM theme where id='3'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
$set=$ar['warna'];
$set = str_replace("hidden", "1", $set);
$set = str_replace("show", "2", $set);
?>
<section id="ndelik<?php echo $set ?>" class="content">
<?php }?>