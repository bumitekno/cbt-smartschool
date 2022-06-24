<?php
include ('../../koneksi/koneksi.php');

$id	= $_GET["id"];
$query = mysqli_query($konek, "SELECT * FROM article WHERE id='$id'");
if($query == false){
die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($r = mysqli_fetch_array($query)){
?>
	
		<!-- Modal Popup edit -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit pengumuman</h4>
					</div>
					<div class="modal-body">
						<form action="page/article_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="id" type="hidden" value="<?php echo $r["id"]; ?>"/>
							<div class="form-group">
								<label>Pengumuman</label>
									<div class="input-group">
										<textarea id='editor3' name="content" rows="10" cols="90" class="form-control" placeholder="Isi Pengumuman"><?php echo $r["content"]; ?></textarea>
										<script>
										    CKEDITOR.replace( "editor3",{ } );
										</script>
									</div>
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