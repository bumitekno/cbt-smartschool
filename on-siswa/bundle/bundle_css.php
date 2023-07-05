<?php 
	                    $querydosen = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ico = mysqli_fetch_array ($querydosen)){
                        ?>
<!-- Icon -->
	<link rel="shortcut icon" type="image/icon" href="../aset/foto/<?php echo $ico['logo'];?>">
<?php } ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../aset/bootstrap/css/bootstrap.mini.css">
    <link rel="stylesheet" href="../aset/bootstrap/css/pace.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../aset/plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="../aset/dist/css/AdminLTE.css">

    <link rel="stylesheet" href="../aset/dist/css/skins/_all-skins2.css">
	<link rel="stylesheet" href="../aset/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
	<style>
.content-wrapper {
   background-color: #ffffff;
}
.content {
   background-color: #ffffff;
}
.panel {
   border-radius:0;
   border:0;
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.panel-heading {
   border-radius:0;
}
.box {
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border: 0;
}
#backup {
    border: 0;
    border-left: 3px solid red;
    outline: 0;
    border-radius: 0px;
    background-color:#ffffff;
    color: grey;
    font-weight: bold;
}
	</style>
	<style>
	    #cog {
    border-radius:0; 
    background-color:#222d32;
    color:white;
    border:0;
    }
    #cog:hover {
    border-radius:0; 
    background-color:#ff8f0a;
    color:white;
    border:0;
    }
    #pew {
    background-repeat: no-repeat;
  background-position: -320px -320px, 0 0;
  
  background-image: -webkit-linear-gradient(
    top left,
    rgba(255, 255, 255, 0.2) 0%,
    rgba(255, 255, 255, 0.2) 37%,
    rgba(255, 255, 255, 0.8) 45%,
    rgba(255, 255, 255, 0.0) 50%
  );
  background-image: -moz-linear-gradient(
    0 0,
    rgba(255, 255, 255, 0.2) 0%,
    rgba(255, 255, 255, 0.2) 37%,
    rgba(255, 255, 255, 0.8) 45%,
    rgba(255, 255, 255, 0.0) 50%
  );    
  background-image: -o-linear-gradient(
    0 0,
    rgba(255, 255, 255, 0.2) 0%,
    rgba(255, 255, 255, 0.2) 37%,
    rgba(255, 255, 255, 0.8) 45%,
    rgba(255, 255, 255, 0.0) 50%
  );
  background-image: linear-gradient(
    0 0,
    rgba(255, 255, 255, 0.2) 0%,
    rgba(255, 255, 255, 0.2) 37%,
    rgba(255, 255, 255, 0.8) 45%,
    rgba(255, 255, 255, 0.0) 50%
  );
  
  -moz-background-size: 250% 250%, 100% 100%;
       background-size: 250% 250%, 100% 100%;
  
  -webkit-transition: background-position 0s ease;
     -moz-transition: background-position 0s ease;       
       -o-transition: background-position 0s ease;
          transition: background-position 0s ease;
}    
    
    #pew:hover {
  background-position: 0 0, 0 0;
  
  -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
          transition-duration: 0.5s;
}
#pow {
    background-color:#222d32;
    background-repeat: no-repeat;
  background-position: -320px -320px, 0 0;
  
  background-image: -webkit-linear-gradient(
    top left,
    rgba(255, 255, 255, 0.2) 0%,
    rgba(255, 255, 255, 0.2) 37%,
    rgba(255, 255, 255, 0.8) 45%,
    rgba(255, 255, 255, 0.0) 50%
  );
  background-image: -moz-linear-gradient(
    0 0,
    rgba(255, 255, 255, 0.2) 0%,
    rgba(255, 255, 255, 0.2) 37%,
    rgba(255, 255, 255, 0.8) 45%,
    rgba(255, 255, 255, 0.0) 50%
  );    
  background-image: -o-linear-gradient(
    0 0,
    rgba(255, 255, 255, 0.2) 0%,
    rgba(255, 255, 255, 0.2) 37%,
    rgba(255, 255, 255, 0.8) 45%,
    rgba(255, 255, 255, 0.0) 50%
  );
  background-image: linear-gradient(
    0 0,
    rgba(255, 255, 255, 0.2) 0%,
    rgba(255, 255, 255, 0.2) 37%,
    rgba(255, 255, 255, 0.8) 45%,
    rgba(255, 255, 255, 0.0) 50%
  );
  
  -moz-background-size: 250% 250%, 100% 100%;
       background-size: 250% 250%, 100% 100%;
  
  -webkit-transition: background-position 0s ease;
     -moz-transition: background-position 0s ease;       
       -o-transition: background-position 0s ease;
          transition: background-position 0s ease;
}    
    
    #pow:hover {
  background-position: 0 0, 0 0;
  
  -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
          transition-duration: 0.5s;
}
#ol {
    border-radius:0; 
}
</style>