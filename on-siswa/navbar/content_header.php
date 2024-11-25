<style>
    #drop {
        box-shadow: -5px 5px 5px  grey;
        -webkit-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
    -moz-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
    }
</style>
<header class="main-header">
  <!-- Logo -->
<div class="logo">
<!-- <span><img src="../aset/foto/elogo.png" width=35px alt="Foto"></span> -->
<span class="logo-sm">
<b style="color:white;">E CBT <?php echo date ('Y') ?></b>
<a href="#" style="padding: 0 !important;" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
</span>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-battery-three-quarters"></i>
    <span class="hidden-xs" style="text-transform:capitalize;"><?php echo $nama;?></span>
          </a>
          <ul id="drop" class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
    <img src="../aset/foto/avatar.gif" class="img-circle" alt="Foto">
              <!--<h3><p>Akademik</p></h3>-->
            <h5 style="color:white;"><b><p style="text-transform:capitalize;">Hi <?php echo $nama;?></p></b>
            <p>Welcome</p></h5>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-danger btn-flat" style="background-color:red;">Log out <i class="fa fa-sign-out"></i></a>
              </div>
            </li>
        </li>
      </ul>
    </div>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-envelope-o"></i>
                    <?php
                                						$result = mysqli_query($konek, "SELECT * FROM article limit 3");
                                						$num_rows = mysqli_num_rows($result);
                                						if ($num_rows > 0)
                                						{
                                						$soal=mysqli_num_rows($result);
                                						}
                                						else
                                						{
                                						$soal="0";    
                                						}
						                                ?>
                    <span class="label label-warning"><?php echo $soal; ?></span>
                </a>
                <ul id="drop" class="dropdown-menu">
                <li class="header">Kamu mendapatkan 
                    <span class="pull-right-container">
                      <small class="label bg-red"><?php echo $soal; ?> pesan</small>
                    </span> 
                </li>
                     <li class="header">
                         <span class='pull-right-container'>
                                  <small class='label pull-right bg-green'>new</small>
                                </span>
                        <?php
						$qusen = mysqli_query ($konek, "SELECT * FROM article ORDER BY id DESC limit 4");
						if($qusen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ddd = mysqli_fetch_array ($qusen)){
					    $baru = "<h6 style='color:black'> $ddd[content]</h6>                    
                                <h6 style='color:grey'><td>$ddd[author],</td>
								<td>$ddd[tanggal]</h6>
								<hr>";
							echo "
							     $baru 

								";
						$i++;		
						}
					    ?>
					        <h6 class="pull-right">Your IP address :  <?php echo $_SERVER['REMOTE_ADDR']; ?></h6>
					</li>
                </ul>
            </li>
        </ul>
    </div>
  </nav>
</header>
<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#2d2d2d;">
      <div class="modal-header" style="border:#2d2d2d;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <center><a href="./"><img src="../aset/foto/elogo.png" width="150px" height="auto" /></a><br><br>
        <p style="color:grey;">E-CBT Smartschool <br>
        <?php echo date("Y") ?>  &copy; Alright reserved</p></center>
        
      </div>
      <div class="modal-footer" style="border:#2d2d2d;">
      </div>
    </div>
  </div>
</div>