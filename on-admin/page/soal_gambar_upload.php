<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Database Gambar Soal</h4>
					</div>
					<div class="modal-body">
                            <form action="upload-gbrsoal.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <label> Upload Multiple Gambar soal</label>
					                <div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i>
										</div>
										<input class="form-control" type="file" id="files[]" name="files[]" accept="image/x-png,image/gif,image/jpeg" multiple required />
									</div>
									<h6>max size : 2 Mb</h6>
									<br>
					        <button id="clot" class="btn btn-success" type="submit" name="submit_file" value="Submit"><i class="fa fa-cog fa-spin" style="font-size:15px"></i>  Proses</button> 
					        </form>
					        <br>
					        <div class="progress">
                            <div class="bar"></div >
                            <div class="percent">0%</div >
                            </div>

                        <div id="status"></div>
					<hr>
                        <div id="mar" class="table-responsive" style="width: 100%; height: 400px; overflow-y: scroll;">					
                        <table id="dataupload" class="table table-bordered table-striped table-hover">
                        <?php 
						error_reporting(0); 
                        $dir = "../images/";
                        chdir($dir);
                        array_multisort(array_map('filemtime', ($files = glob("*.{jpg,JPG,jpeg,JPEG,png,gif,PNG}", GLOB_BRACE))), SORT_DESC, $files);
                        foreach($files as $data)
                        {
                        $gambarsoal ="<img src='images/$data' width=150pk height=auto >";
                        $tgl = date('Y-m-d',filemtime($data));
                        $jam = date('H:i',filemtime($data));
                        $tanda=explode(".",$data);
                        $file = $tanda[0];
                        $dok = $tanda[1];
                        	if($dok == "JPG" OR $dok == "jpg" OR  $dok == "jpeg" OR  $dok == "JPEG" OR  $PNG == "PNG"){
                        	$co="#8c0000";
                        	} elseif ($dok == "png" OR $dok == "gif") {
                        	$co="#006699";
                        	}
                        echo "
                        <div id='del' class='col-xs-3'>
                        ".$file.".".$dok."
						<br>
                        <a href='images/$data' target='blank'>".$gambarsoal."</a>
						<br>
						<a style='font-decoration:none;color:#222;' href='dropgbrsoal2.php?file=images/".$data."'><button type='button' class='btn btn-danger btn-xs btn-flat'></i><i class='fa fa-trash-o'></i> hapus</button></a>
                        </div>
                        ";
                        }
                        ?>
                        </table>
                        </div>
                                <div class="modal-footer">
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
					</div>
				</div>
			</div>
			<script src="../js/jquery.form.js" type="text/javascript"></script>
	<script>
(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
   
$('form').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
		//console.log(percentVal, position, total);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
	complete: function(xhr) {
		status.html(xhr.responseText);
	}
}); 

})();       
</script>
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('files[]', [".jpg", ".png", ".gif", ".jpeg"])){
            alert("Hanya file .jpg, .jpeg, gif dan png yang diijinkan.");
            return false;
        }
    }
</script>