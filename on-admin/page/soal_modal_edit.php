<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');
$id	= $_GET["id"];
$query = mysqli_query($konek, "SELECT * FROM soal WHERE id='$id'");
if($query == false){
die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($ar = mysqli_fetch_array($query)){
$query2 = mysqli_query ($konek, "SELECT * FROM ujian WHERE kodesoal='$ar[kodesoal]'");
$ur = mysqli_fetch_array ($query2);
				        if(!$ar['gambarsoal']=='')
				        {
					    $gambarsoal = "<img src='../gbr/$ar[gambarsoal]' align=center width=300pk ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
				        }  
				        if(!$ar['audio']=='')
				        {
					    $audio = "<audio src='../gbr/$ar[audio]' controls controlsList='nodownload'></audio>";
				        }
				        else
				        {
					    $audio = "";
				        }	
				        if(!$ar['gambar_a']=='')
				        {
					    $gambar_a = "<img src='../gbr/$ar[gambar_a]' align=center width=300pk ><br>";
				        }
				        else
				        {
					    $gambar_a = "";
				        }  
				        
				        if(!$ar['gambar_b']=='')
				        {
					    $gambar_b = "<img src='../gbr/$ar[gambar_b]' align=center width=300pk ><br>";
				        }
				        else
				        {
					    $gambar_b = "";
				        }  
				        
				        if(!$ar['gambar_c']=='')
				        {
					    $gambar_c = "<img src='../gbr/$ar[gambar_c]' align=center width=300pk ><br>";
				        }
				        else
				        {
					    $gambar_c = "";
				        }  
				        
				        if(!$ar['gambar_d']=='')
				        {
					    $gambar_d = "<img src='../gbr/$ar[gambar_d]' align=center width=300pk ><br>";
				        }
				        else
				        {
					    $gambar_d = "";
				        }  
				        
				        if(!$ar['gambar_e']=='')
				        {
					    $gambar_e = "<img src='../gbr/$ar[gambar_e]' align=center width=300pk ><br>";
				        }
				        else
				        {
					    $gambar_e = "";
				        }  
						if($ar['status']>1)
				        {
					    $statussoal = "<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						<h4 class='modal-title'>Edit Butir Soal</h4>
					</div>
					<div class='modal-body'>
						<form action='page/butirsoal_edit.php' name='modal_popup' enctype='multipart/form-data' method='post'>
						    <input name='id' type='hidden' value='$ar[id]'/>
		                    <input name='jenissoal' type='hidden' class='form-control' value='$ar[jenissoal]'/>
		                    <input name='kodemapel' type='hidden' class='form-control' value='$ar[kodemapel]'/>
		                    <input name='kodesoal' type='hidden' class='form-control' value='$ar[kodesoal]'/>
		                    <div class='form-group'>
								<label>No. Soal</label> : $ar[nomersoal]
									<div class='input-group col-xs-2'>
										<input name='nomersoal' type='hidden' class='form-control input-sm' value='$ar[nomersoal]' required />
									</div>
							</div>
							
							<div id='formgroup' class='form-group'>
								<div class='col-xs-12' style='background-color:#222d32;color:white;'>
								<label>SOAL</label>
								</div>
								<div class='input-group'>
										<div class='input-group-addon'>
											Link audio. <i class='fa fa-audio-o'></i>
										</div>
										<input name='audio' type='text' class='form-control' value='$ar[audio]' />
									</div>
								$audio
									<div class='input-group'>
										<textarea id='editor2' name='soal' rows='10' cols='90' class='form-control'>$ar[soal]</textarea>
										<script>
										    CKEDITOR.replace( 'editor2',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR
                                            });
										</script>
									</div>
									<div class='input-group'>
										<div class='input-group-addon'>
											Link gambar <i class='fa fa-picture-o'></i>
										</div>
										<input name='gambarsoal' type='text' class='form-control' value='$ar[gambarsoal]' />
									</div>
							    $gambarsoal	
							    
							</div>


							<div class='modal-footer'>
								<button class='btn btn-success' type='submit'>
									Save
								</button>
								<button type='reset' class='btn btn-danger'  data-dismiss='modal' aria-hidden='true'>
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>";
				        }
				        else
				        {
					    $statussoal = "
<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						<h4 class='modal-title'>Edit Butir Soal</h4>
					</div>
					<div class='modal-body'>
						<form action='page/butirsoal_edit.php' name='modal_popup' enctype='multipart/form-data' method='post'>
						    <input name='id' type='hidden' value='$ar[id]'/>
		                    <input name='jenissoal' type='hidden' class='form-control' value='$ar[jenissoal]'/>
		                    <input name='kodemapel' type='hidden' class='form-control' value='$ar[kodemapel]'/>
		                    <input name='kodesoal' type='hidden' class='form-control' value='$ar[kodesoal]'/>
		                    <div class='form-group'>
								<label>No. Soal</label> : $ar[nomersoal]
									<div class='input-group col-xs-2'>
										<input name='nomersoal' type='hidden' class='form-control input-sm' value='$ar[nomersoal]' required />
									</div>
							</div>
							
							<div id='formgroup' class='form-group'>
								<div class='col-xs-12' style='background-color:#222d32;color:white;'>
								<label>SOAL</label>
								</div>
								<div class='input-group'>
										<div class='input-group-addon'>
											Link audio. <i class='fa fa-audio-o'></i>
										</div>
										<input name='audio' type='text' class='form-control' value='$ar[audio]' />
									</div>
								$audio
									<div class='input-group'>
										<textarea id='editor2' name='soal' rows='10' cols='90' class='form-control'>$ar[soal]</textarea>
										<script>
										    CKEDITOR.replace( 'editor2',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR
                                            });
										</script>
									</div>
									<div class='input-group'>
										<div class='input-group-addon'>
											Link gambar <i class='fa fa-picture-o'></i>
										</div>
										<input name='gambarsoal' type='text' class='form-control' value='$ar[gambarsoal]' />
									</div>
							    $gambarsoal
							    
							</div>

							<div id='formgroup' class='form-group'>
								<div class='col-xs-12' style='background-color:#222d32;color:white;'>
								<label>Pilihan A</label>
								</div>
									<div class='input-group'>
										<textarea id='editorpilA' name='pilihan1' cols='90' class='form-control'>$ar[pilihan1]</textarea>
										<script>
										    CKEDITOR.replace( 'editorpilA',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
											  'name': 'basicstyles',
											  'groups': ['basicstyles']
											},
											{
											  'name': 'links',
											  'groups': ['links']
											},
											{
											  'name': 'paragraph',
											  'groups': ['list', 'blocks']
											},
											{
											  'name': 'document',
											  'groups': ['mode']
											},
											{
											  'name': 'insert',
											  'groups': ['insert']
											},
											{
											  'name': 'styles',
											  'groups': ['styles']
											},
											{
											  'name': 'about',
											  'groups': ['about']
											}
										  ],
										  // Remove the redundant buttons from toolbar groups defined above.
										  removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class='input-group'>
										<div class='input-group-addon'>
											Link gambar <i class='fa fa-picture-o'></i>
										</div>
										<input name='gambar_a' type='text' class='form-control' value='$ar[gambar_a]' />
									</div>
								$gambar_a
							</div>		
							<div id='formgroup' class='form-group'>
								<div class='col-xs-12' style='background-color:#222d32;color:white;'>
								<label>Pilihan B</label>
								</div>
									<div class='input-group'>
										<textarea id='editorpilB' name='pilihan2' cols='90' class='form-control'>$ar[pilihan2]</textarea>
										<script>
										    CKEDITOR.replace( 'editorpilB',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
											  'name': 'basicstyles',
											  'groups': ['basicstyles']
											},
											{
											  'name': 'links',
											  'groups': ['links']
											},
											{
											  'name': 'paragraph',
											  'groups': ['list', 'blocks']
											},
											{
											  'name': 'document',
											  'groups': ['mode']
											},
											{
											  'name': 'insert',
											  'groups': ['insert']
											},
											{
											  'name': 'styles',
											  'groups': ['styles']
											},
											{
											  'name': 'about',
											  'groups': ['about']
											}
										  ],
										  // Remove the redundant buttons from toolbar groups defined above.
										  removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class='input-group'>
										<div class='input-group-addon'>
											Link gambar <i class='fa fa-picture-o'></i>
										</div>
										<input name='gambar_b' type='text' class='form-control' value='$ar[gambar_b]' />
									</div>
								$gambar_b
							</div>	
							<div id='formgroup' class='form-group'>
								<div class='col-xs-12' style='background-color:#222d32;color:white;'>
								<label>Pilihan C</label>
								</div>
									<div class='input-group'>
										<textarea id='editorpilC' name='pilihan3' cols='90' class='form-control'>$ar[pilihan3]</textarea>
										<script>
										    CKEDITOR.replace( 'editorpilC',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
											  'name': 'basicstyles',
											  'groups': ['basicstyles']
											},
											{
											  'name': 'links',
											  'groups': ['links']
											},
											{
											  'name': 'paragraph',
											  'groups': ['list', 'blocks']
											},
											{
											  'name': 'document',
											  'groups': ['mode']
											},
											{
											  'name': 'insert',
											  'groups': ['insert']
											},
											{
											  'name': 'styles',
											  'groups': ['styles']
											},
											{
											  'name': 'about',
											  'groups': ['about']
											}
										  ],
										  // Remove the redundant buttons from toolbar groups defined above.
										  removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class='input-group'>
										<div class='input-group-addon'>
											Link gambar <i class='fa fa-picture-o'></i>
										</div>
										<input name='gambar_c' type='text' class='form-control' value='$ar[gambar_c]' />
									</div>
								$gambar_c
							</div>
							<div id='formgroup' class='form-group'>
							    <div class='col-xs-12' style='background-color:#222d32;color:white;'>
								<label>Pilihan D</label>
								</div>
									<div class='input-group'>
										<textarea id='editorpilD' name='pilihan4' cols='90' class='form-control'>$ar[pilihan4]</textarea>
										<script>
										    CKEDITOR.replace( 'editorpilD',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
											  'name': 'basicstyles',
											  'groups': ['basicstyles']
											},
											{
											  'name': 'links',
											  'groups': ['links']
											},
											{
											  'name': 'paragraph',
											  'groups': ['list', 'blocks']
											},
											{
											  'name': 'document',
											  'groups': ['mode']
											},
											{
											  'name': 'insert',
											  'groups': ['insert']
											},
											{
											  'name': 'styles',
											  'groups': ['styles']
											},
											{
											  'name': 'about',
											  'groups': ['about']
											}
										  ],
										  // Remove the redundant buttons from toolbar groups defined above.
										  removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class='input-group'>
										<div class='input-group-addon'>
											Link gambar <i class='fa fa-picture-o'></i>
										</div>
										<input name='gambar_d' type='text' class='form-control' value='$ar[gambar_d]' />
									</div>
								$gambar_d
							</div>
							<div id='formgroupop$ur[opsi]' class='form-group'>
							    <div class='col-xs-12' style='background-color:#222d32;color:white;'>
								<label>Pilihan E</label>
								</div>
									<div class='input-group'>
										<textarea id='editorpilE' name='pilihan5' cols='90' class='form-control'>$ar[pilihan5]</textarea>
										<script>
										    CKEDITOR.replace( 'editorpilE',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
											  'name': 'basicstyles',
											  'groups': ['basicstyles']
											},
											{
											  'name': 'links',
											  'groups': ['links']
											},
											{
											  'name': 'paragraph',
											  'groups': ['list', 'blocks']
											},
											{
											  'name': 'document',
											  'groups': ['mode']
											},
											{
											  'name': 'insert',
											  'groups': ['insert']
											},
											{
											  'name': 'styles',
											  'groups': ['styles']
											},
											{
											  'name': 'about',
											  'groups': ['about']
											}
										  ],
										  // Remove the redundant buttons from toolbar groups defined above.
										  removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class='input-group'>
										<div class='input-group-addon'>
											Link gambar <i class='fa fa-picture-o'></i>
										</div>
										<input name='gambar_e' type='text' class='form-control' value='$ar[gambar_e]' />
									</div>
								$gambar_e
							</div>
							<div id='formgroup' class='form-group'>
                        	<div class='col-xs-12' style='background-color:#222d32;color:white;'>
								<label>Kunci Jawaban</label>
								</div>
							<form action='' method='post'>   
                                 <select class='form-control' name='kunci' required >  
                                     <option value='$ar[kunci]'>$ar[kunci]</option>
                                         <option value='A'>A</option>
                                         <option value='B'>B</option>  
                                         <option value='C'>C</option>  
                                         <option value='D'>D</option> 
										 <option id='formgroupop$ur[opsi]' value='E'>E</option> 
                                     </select> 
                            </div>	
							<div class='modal-footer'>
								<button class='btn btn-success' type='submit'>
									Save
								</button>
								<button type='reset' class='btn btn-danger'  data-dismiss='modal' aria-hidden='true'>
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>";
				        }
?>
	
<?php echo $statussoal;?>			
<?php
			}

?>