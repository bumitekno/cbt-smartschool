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
<b style="color:white;">E CBT <?php echo date ('Y') ?></b></span>
</div>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
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
                        <!-- <a href="update.php" class="btn bg.warning btn-flat" style="background-color:white;color:grey;">Update <i class="fa fa-info-circle"></i></a> -->
                        </div>
                        <div class="pull-right">
                        <a class="btn bg.warning btn-flat" data-toggle="modal" data-target="#logout" style="background-color:red;color:white;">Log out <i class="fa fa-sign-out"></i></a>
                        </div>
                    </li>
        </li>
      </ul>
    </div>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="pesan.php">
            <i class="fa fa-envelope"><i class="fa fa-plus"></i></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <center>Yakin ingin keluar ?</center>
      </div>
      <div class="modal-body">
        <a href="logout.php" ><button type="button" class="btn btn-danger btn-block btn-flat"><i class="fa fa-power-off" aria-hidden="true"></i> Keluar</button></a>
        <button type="button" class="btn btn-secondary btn-block btn-flat" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#2d2d2d;">
      <div class="modal-header" style="border:#2d2d2d;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <center><a href="./"><img src="../aset/foto/myschid.png" width="150px" height="auto" /></a><br><br>
        <p style="color:grey;">E-CBT Smart School <br>
        <?php echo date("Y") ?>  &copy; Alright reserved</p></center>
        
      </div>
      <div class="modal-footer" style="border:#2d2d2d;">
      </div>
    </div>
  </div>
</div>