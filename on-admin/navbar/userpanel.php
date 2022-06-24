<style>
    .sidebar-form {
        border:0px !important;
    }
    #on {
	        animation: blink 1s ease-in infinite;
	    }

@keyframes blink {
  from, to { opacity: 1 }
  50% { opacity: 0 }
}
</style>
<?php
$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){
                        ?>	
        
		<div class="user-panel">
            <div class="pull-left image">
              <img src="../aset/foto/<?php echo $xx['logo'];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
			  <a href="#"><i id='on' class='fa fa-circle' style='color:#90ff00;font-size:10px;'></i> Online</a>
			  <h5 style="color:white"><?php echo $jabatan;?></h5>
			</div>
		  </div>
		    <form action="#" method="get" class="sidebar-form">
                 <h5 style="color:white"><?php echo $nama;?></h5>
            </form>
        <ul class="sidebar-menu" data-widget="tree">
      	    <li class="header">SHORTCUT MENU</li>
        </ul>
		  <div class="user-panel">
            <div class="pull-left image">
			<a href="profil.php" data-toggle="tooltip" data-placement="right" title="Profil"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-user"></i></button></a>
			<!-- <a data-toggle="modal" data-target="#about" data-placement="right" data-toggle="tooltip" title="about aplication"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-info-circle"></i></button></a> -->
            <a href="theme.php" data-placement="right" data-toggle="tooltip" title="setting"><button id="cog" class="btn btn-default"><i class="fa fa-cog"></i></button></a>
            <a data-toggle="modal" data-target="#logout" data-placement="left" data-toggle="tooltip" title="log out"><button id="cog" class="btn btn-default btn-md"><i class="fa fa-sign-out"></i></button></a>
            </div>
        </div> 
<?php }?>