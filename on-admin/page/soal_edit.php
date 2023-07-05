<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');
$id	= $_GET["id"];
$query = mysqli_query($konek, "SELECT * FROM ujian WHERE kodesoal='$id'");
if($query == false){
die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($ar = mysqli_fetch_array($query)){
    $opsi =$ar['opsi'];
						    $opsi = str_replace("hidden", "4 opsi", $opsi);
                            $opsi = str_replace("show", "5 opsi", $opsi);
                        $acak =$ar['acak'];
						    $acak = str_replace("1", "acak", $acak);
                            $acak = str_replace("2", "urut", $acak);
?>
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Soal <?php echo $id; ?></h4>
					</div>
					<div class="modal-body">
						<form action="page/mastersoal_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
						    <input name="kodesoal" type="hidden" value="<?php echo $id; ?>"/>
	
                            <div class="form-group">
								<label>Opsi jawaban</label>
                             <br>
							 <form action="" method="post">   
                                 <select class="form-control" name="opsi" required >  
                                     <option value="<?php echo $ar["opsi"]; ?>"><?php echo $opsi; ?></option>
                                         <option value="hidden">4 Opsi jawaban</option>
                                         <option value="show">5 Opsi jawaban</option>  
                                     </select> 
                             </div>
                             <div class="form-group">
								<label>waktu ujian</label>
									<div class="input-group">
										
										<input name="waktu" type="text" class="form-control" value="<?php echo $ar["waktu"]; ?>"/>
										<div class="input-group-addon">
											<i class="fa fa-clock-o"> menit</i>
										</div>
									</div>
							</div>
							<div class="form-group">
								<label>Bobot nilai PG</label>
									<div class="input-group">
										<input name="nilai" type="text" class="form-control" value="<?php echo $ar["nilai"]; ?>"/>
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
									</div>
							</div>
							<div class="form-group">
								<label>Kelas</label>
									<div class="input-group">
										<input name="kelas" type="number" class="form-control" value="<?php echo $ar["kelas"]; ?>"/>
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
									</div>
							</div>
                             <div class="form-group">
								<label>Tampilan Soal</label>
                             <br>
							 <form action="" method="post">   
                                 <select class="form-control" name="acak" required >  
                                     <option value="<?php echo $ar["acak"]; ?>"><?php echo $acak; ?></option>
                                         <option value="1">Acak</option>
                                         <option value="2">Urut</option>  
                                     </select> 
                             </div>
      
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Save
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
<?php
			}

?>