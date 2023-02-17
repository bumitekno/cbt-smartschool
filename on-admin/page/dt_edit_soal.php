<?php 
$mapel=$_GET['matpel'];
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
$query2 = mysqli_query ($konek, "SELECT * FROM ujian WHERE kodesoal='$kode'");
$ur = mysqli_fetch_array ($query2);
?>
<script src="../aset/plugins/ckeditor/ckeditor.js"></script>
	<script>
	    CKEDITOR.env.isCompatible = true;
	</script>
<div class="btn-group" role="group" aria-label="Basic example">
<button id="clot" type="button" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Soal PG</button>
<button id="clot" type="button" class="btn btn-success" data-target="#ModalAdd2" data-toggle="modal"><i class="fa fa-plus"></i> Soal Uraian</button>
<a href="soal-import.php"><button id="clot2" type="button" class="btn btn-warning"><i class="fa fa-upload"></i> Import Butir Soal</button></a>
<a class='open_modal1' style='font-decoration:none;color:#222;' hidden><button id="clot" type='button' class='btn btn-danger' ><i class='fa fa-picture-o'></i> Database | Upload gambar soal</button></a>
</div>
<br><br>
						<h5><form class="form-vertical">
							<div class="form-group">
    							<label class="col-sm-3 col-md-3 control-label">JENIS UJIAN</i></label>
        							<div class="col-sm-9">
        							  <p class="form-control-static">: <?php echo $jenis;?></p>
        							</div>
						    </div>
							<div class="form-group">
    							<label class="col-sm-3 col-md-3 control-label">MATA PELAJARAN</label>
        							<div class="col-sm-9">
        							  <p class="form-control-static">: <?php echo $mapel;?></p>
        							</div>
						    </div>
						    <div class="form-group">
    							<label class="col-sm-3 col-md-3 control-label">KODE SOAL</i></label>
        							<div class="col-sm-9">
        							  <p class="form-control-static">: <?php echo $kode;?></p>
        							</div>
						    </div>
						</form></h5>

	<!-- Modal Popup Import Soal -->

<!-- Modal Popup Tambah Soal -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Soal</h4>
					</div>
					<div class="modal-body">
						<form action="page/butirsoal_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
						    <div class="form-group">
		                    <input name="jenissoal" type="hidden" class="form-control" value="<?php echo $jenis;?>"/>
		                    </div>
		                    <div class="form-group">
		                    <input name="kodemapel" type="hidden" class="form-control" value="<?php echo $mapel;?>"/>
		                    </div>
		                    <div class="form-group">
		                    <input name="kodesoal" type="hidden" class="form-control" value="<?php echo $kode;?>"/>
		                    </div>
							<div class="form-group">
		                    <input name="status" type="hidden" class="form-control" value="1"/>
		                    </div>
		                    <div class="form-group">
								<label>No. Soal</label>
									<div class="input-group col-xs-2">
										<input name="nomersoal" type="number" class="form-control input-sm" value="no soal" required />
									</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12" style="background-color:#222d32;color:white;">
								<label>SOAL</label>
								</div>
								<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-file-audio-o"></i> Audio. Soal
										</div>
										<input class="form-control" name="audio" type="file" accept=".mp3 , .ogg"/>
									</div>
									<div class="input-group">
										<textarea id="editor1" name="soal" rows="10" cols="90" class="form-control" placeholder="isi pertanyaan"></textarea>
										<script>
										    CKEDITOR.replace( 'editor1',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR
                                            });
										</script>
									</div>
									
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i> Gambar Soal 
										</div>
										<input class="form-control" name="gambarsoal" type="file" accept=".jpg , .png"/>
									</div>
									
							</div>
							<div class="form-group">
								<div class="col-xs-12" style="background-color:#222d32;color:white;">
								<label>Pilihan A</label>
								</div>
									<div class="input-group">
										<textarea id="editorA" name="pilihan1" cols="20" class="form-control"></textarea>
										<script>
										    CKEDITOR.replace( 'editorA',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        },
        {
          "name": "about",
          "groups": ["about"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i> Gbr A
										</div>
										<input class="form-control" name="gambar_a" type="file" accept=".jpg , .png"/>
									</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12" style="background-color:#222d32;color:white;">
								<label>Pilihan B</label>
								</div>
									<div class="input-group">
										<textarea id="editorB" name="pilihan2" cols="20" class="form-control" ></textarea>
										<script>
										    CKEDITOR.replace( 'editorB',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        },
        {
          "name": "about",
          "groups": ["about"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i> Gbr B
										</div>
										<input class="form-control" name="gambar_b" type="file" accept=".jpg , .png"/>
									</div>
							</div>	
							<div class="form-group">
								<div class="col-xs-12" style="background-color:#222d32;color:white;">
								<label>Pilihan C</label>
								</div>
									<div class="input-group">
										<textarea id="editorC" name="pilihan3" cols="20" class="form-control" ></textarea>
										<script>
										    CKEDITOR.replace( 'editorC',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        },
        {
          "name": "about",
          "groups": ["about"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i> Gbr C
										</div>
										<input class="form-control" name="gambar_c" type="file" accept=".jpg , .png"/>
									</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12" style="background-color:#222d32;color:white;">
								<label>Pilihan D</label>
								</div>
									<div class="input-group">
										<textarea id="editorD" name="pilihan4" cols="20" class="form-control" ></textarea>
										<script>
										    CKEDITOR.replace( 'editorD',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        },
        {
          "name": "about",
          "groups": ["about"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i> Gbr D
										</div>
										<input class="form-control" name="gambar_d" type="file" accept=".jpg , .png"/>
									</div>
							</div>
							<div id="formgroupop<?php echo $ur['opsi']; ?>" class="form-group">
								<div class="col-xs-12" style="background-color:#222d32;color:white;">
								<label>Pilihan E</label>
								</div>
									<div class="input-group">
										<textarea id="editorE" name="pilihan5" cols="20" class="form-control" ></textarea>
										<script>
										    CKEDITOR.replace( 'editorE',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR,
											height:['50px'],
											height:['50px'],
											toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        },
        {
          "name": "about",
          "groups": ["about"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                            });
										</script>
									</div>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i> Gbr E
										</div>
										<input class="form-control" name="gambar_e" type="file" accept=".jpg , .png"/>
									</div>
							</div>
							<div class="col-xs-12" style="background-color:#222d32;color:white;">
								<label>Kunci Jawaban</label>
								</div>
							<form action="" method="post">   
                                 <select class="form-control" name="kunci" required >  
                                     <option value="">Pilih Kunci Jawaban</option>
                                         <option value="A">A</option>
                                         <option value="B">B</option>  
                                         <option value="C">C</option>  
                                         <option value="D">D</option>  
                                         <option id="formgroupop<?php echo $ur['opsi']; ?>" value="E">E</option>
                                     </select> 
                            </div>	
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="ModalAdd2" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Soal uraian</h4>
					</div>
					<div class="modal-body">
						<form action="page/butirsoal_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
						    <div class="form-group">
		                    <input name="jenissoal" type="hidden" class="form-control" value="<?php echo $jenis;?>"/>
		                    </div>
		                    <div class="form-group">
		                    <input name="kodemapel" type="hidden" class="form-control" value="<?php echo $mapel;?>"/>
		                    </div>
		                    <div class="form-group">
		                    <input name="kodesoal" type="hidden" class="form-control" value="<?php echo $kode;?>"/>
		                    </div>
							<div class="form-group">
		                    <input name="status" type="hidden" class="form-control" value="2"/>
		                    </div>
		                    <div class="form-group">
								<label>No. Soal</label>
									<div class="input-group col-xs-2">
										<input name="nomersoal" type="number" class="form-control input-sm" value="no soal" required />
									</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12" style="background-color:#222d32;color:white;">
								<label>SOAL</label>
								</div>
								<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-file-audio-o"></i> Audio. Soal
										</div>
										<input class="form-control" name="audio" type="file" accept=".mp3 , .ogg"/>
									</div>
									<div class="input-group">
										<textarea id="editor3" name="soal" rows="10" cols="90" class="form-control" placeholder="isi pertanyaan"></textarea>
										<script>
										    CKEDITOR.replace( 'editor3',
                                            {
                                            enterMode : CKEDITOR.ENTER_BR
                                            });
										</script>
									</div>
									
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-camera"></i> Gambar Soal 
										</div>
										<input class="form-control" name="gambarsoal" type="file" accept=".jpg , .png"/>
									</div>
									
							</div>
						
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<thead>
					<tr>
						<th>No Soal</th>
						<th>Soal</th>
						<th>Pilihan A</th>
						<th>Pilihan B</th>
						<th>Pilihan C</th>
						<th>Pilihan D</th>
						<th id="formgroupop<?php echo $ur['opsi']; ?>">Pilihan E</th>
						<th>Kunci Jawaban</th>						
						<th>Action</th>
					</tr>
				</thead>
                <tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM soal where kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
						$hello=strip_tags("$ar[soal]");
				        $trimmarker = '...';
				        $isi=mb_strimwidth($hello, 0, 50). $trimmarker;
						$isitok=strip_tags($isi);
				        if(!$ar['audio']=='')
				        {
					    $audio = "<audio src='../gbr/$ar[audio]' controls controlsList='nodownload'></audio><br>";
				        }
				        else
				        {
					    $audio = "";
				        }	
				        
						 if(!$ar['gambarsoal']=='')
				        {
					    $gambarsoal = "<img src='../gbr/$ar[gambarsoal]' align=center width=200pk height=auto ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
				        }	
				        
				        if(!$ar['gambar_a']=='')
				        {
					    $gambar_a = "<img src='../gbr/$ar[gambar_a]' align=center width=200pk height=auto >";
				        }
				        else
				        {
					    $gambar_a = "";
				        }
				        if(!$ar['pilihan1']=='')
				        {
					    $pilihan_a = "$ar[pilihan1]";
				        }
				        else
				        {
					    $pilihan_a = "";
				        }
				        
				        if(!$ar['gambar_b']=='')
				        {
					    $gambar_b = "<img src='../gbr/$ar[gambar_b]' align=center width=200pk height=auto >";
				        }
				        else
				        {
					    $gambar_b = "";
				        }
				        if(!$ar['pilihan2']=='')
				        {
					    $pilihan_b = "$ar[pilihan2]";
				        }
				        else
				        {
					    $pilihan_b = "";
				        }
				        
				        if(!$ar['gambar_c']=='')
				        {
					    $gambar_c = "<img src='../gbr/$ar[gambar_c]' align=center width=200pk height=auto >";
				        }
				        else
				        {
					    $gambar_c = "";
				        }
				        if(!$ar['pilihan3']=='')
				        {
					    $pilihan_c = "$ar[pilihan3]";
				        }
				        else
				        {
					    $pilihan_c = "";
				        }
				        
				        if(!$ar['gambar_d']=='')
				        {
					    $gambar_d = "<img src='../gbr/$ar[gambar_d]' align=center width=200pk height=auto >";
				        }
				        else
				        {
					    $gambar_d = "";
				        }
				        if(!$ar['pilihan4']=='')
				        {
					    $pilihan_d = "$ar[pilihan4]";
				        }
				        else
				        {
					    $pilihan_d = "";
				        }
				        
				        if(!$ar['gambar_e']=='')
				        {
					    $gambar_e = "<img src='../gbr/$ar[gambar_e]' align=center width=200pk height=auto >";
				        }
				        else
				        {
					    $gambar_e = "";
				        }
				        if(!$ar['pilihan5']=='')
				        {
					    $pilihan_e = "$ar[pilihan5]";
				        }
				        else
				        {
					    $pilihan_e = "";
				        }
							echo "
								<tr>
									<td align=center>$ar[nomersoal]</td>
									<td align=left>$isi
									<br>$gambarsoal<br>$audio</td>
									<td align=center>$pilihan_a$gambar_a</td>
									<td align=center>$pilihan_b$gambar_b</td>
                                    <td align=center>$pilihan_c$gambar_c</td>
									<td align=center>$pilihan_d$gambar_d</td>
									<td id='formgroupop$ur[opsi]' align=center>$pilihan_e$gambar_e</td>
                                    <td align=center>$ar[kunci]</td>
									<td align=center>
									<a class='open_modal' style='font-decoration:none;color:#222;' id='$ar[id]'><button type='button' class='btn btn-success'><i class='fa fa-pencil-square-o'></i></button></a>
									<a href='page/delete-butirsoal.php?id=$ar[id]'><button class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a>
									</td>
								</tr>";
						}
					?>
				</tbody>
