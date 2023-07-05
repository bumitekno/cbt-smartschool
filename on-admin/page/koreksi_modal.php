<?php
include ('../../koneksi/koneksi.php');
$nama	    = $_GET["nama"];
$nis	    = $_GET["nis"];
$kodesoal	= $_GET["kodesoal"];
$kelas	    = $_GET["kelas"];
?>
<style>
input[type="radio"] {
    -ms-transform: scale(1.5); /* IE 9 */
    -webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
    transform: scale(1.5);
}
</style>	
<!-- Modal Popup siswa edit -->
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
							<div class="modal-header curut">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-pencil-square-o"  style="color:white;" aria-hidden="true"> KOREKSI</i>
								<h4 class="modal-title"><font color="white">KODE SOAL : <?php echo $kodesoal; ?></h4>
								NAMA : <?php echo $nama; ?><br>
								NIS : <?php echo $nis; ?><br>
								KELAS : <?php echo $kelas; ?>
								</font>
							</div>
<form action="page/simpan_urai.php" method="post" id="form1" name="form1">
<input type="hidden" name="nama" id="nama" value="<?php echo $nama; ?>">
<input type="hidden" name="ks" id="ks" value="<?php echo $kodesoal; ?>">
<input type="hidden" name="nis" id="nis" value="<?php echo $nis; ?>">
<?php 
$query = mysqli_query($konek, "SELECT * FROM jawaburaian WHERE nis='$nis' AND kodesoal='$kodesoal' ORDER by nomersoal ASC");
if($query == false){
die ("Terjadi Kesalahan : ". mysqli_error($konek));
}

$i=0;

while($r = mysqli_fetch_array($query)){
    
    $nosol=$r['nomersoal'];
    $query2 = mysqli_query($konek, "SELECT * FROM soal WHERE kodesoal='$kodesoal' AND nomersoal='$nosol' ORDER by nomersoal ASC");
if($query2 == false){
die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($or = mysqli_fetch_array($query2)){
						if(!$or['gambarsoal']=='')
				        {
					    $gambarsoal = "<br><img src='../gbr/$or[gambarsoal]' alt='Nature' class='responsive' align=center style='max-width:500px; height:auto' ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
					    }
						if(!$or['audio']=='')
				        {
					    $audio = "<br><audio src='../gbr/$or[audio]' controls controlsList='nodownload'></audio>";
				        }
				        else
				        {
					    $audio = "";
				        }
				        
	$i++; 
?>

						
							<div class="col-xs-12">
									<div class="attachment">
										<a href="#" class="name">
											<br>
											Soal nomer <?php echo $r['nomersoal']; ?>
										</a>
									  <p class="filename">
									<?php echo $or['soal']; ?><?php echo $gambarsoal; ?><?php echo $audio; ?>
									  </p>
									</div>
									<div class="attachment">
									  <a href="#" class="name">
											Jawaban :
										</a>

									  <p class="filename">
										<?php echo $r['jawaban']; ?>
										<br><br>
										
									  </p>
									</div>
							</div>
<div class="container<?php echo $i; ?>" id="tengah">

    <label class="radio-inline">
      <input type="radio" name="optradio<?php echo $r['nomersoal']; ?>" value="1"<?php echo ($r['nilai']=='1')?'checked="checked"':'' ?>/>&nbsp;1
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio<?php echo $r['nomersoal']; ?>" value="2"<?php echo ($r['nilai']=='2')?'checked="checked"':'' ?>>&nbsp;2
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio<?php echo $r['nomersoal']; ?>" value="3"<?php echo ($r['nilai']=='3')?'checked="checked"':'' ?>>&nbsp;3
    </label>
	<label class="radio-inline">
      <input type="radio" name="optradio<?php echo $r['nomersoal']; ?>" value="4"<?php echo ($r['nilai']=='4')?'checked="checked"':'' ?>>&nbsp;4
    </label>
	<label class="radio-inline">
      <input type="radio" name="optradio<?php echo $r['nomersoal']; ?>" value="5"<?php echo ($r['nilai']=='5')?'checked="checked"':'' ?>>&nbsp;5
    </label>
  
</div>
<hr class="style-two">								
<?php }} ?>		
&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="submit"/>
  </form>						
							<div class="modal-footer">
							</div>
					</div>
				</div>
