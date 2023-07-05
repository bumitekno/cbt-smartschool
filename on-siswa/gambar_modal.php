<?php
include ('../koneksi/koneksi.php');
$id = abs((int) $_GET['id']);
$query = mysqli_query ($konek, "SELECT * FROM soal WHERE id='$id'");
						if($query == false){
						die ("Terjadi Kesalahan : ". mysqli_error($konek));
						$i=1;
						}
						while ($ar = mysqli_fetch_array ($query)){
						if(!$ar['gambarsoal']=='')
				        {
					    $gambarsoal = "<img src='../gbr/$ar[gambarsoal]' alt='Nature' class='responsive' align=center width=800pk height=auto ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
					    }
?>
<style>
    #pop {
    background-color: #ffffff;
    border-radius:0px;
}
#pop {
    border: 0px;
    border-radius:0px;
}
</style>	
<!-- Modal Popup siswa edit -->
			<div id="pop" class="modal-dialog modal-lg">
				<div id="pop" class="modal-content">
					<div id="pop" class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div id="pop" class="modal-body" style="width: 100%; height: 500px;overflow-y: scroll;">
							<h3><center><?php echo $gambarsoal; ?></center></h3>
					</div>
				</div>
			</div>
<?php }?>