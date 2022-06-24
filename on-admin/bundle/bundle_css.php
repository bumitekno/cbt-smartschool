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
    <link href="../js/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="../aset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../aset/bootstrap/css/pace.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../aset/plugins/datatables/dataTables.material.min.css">
    <link rel="stylesheet" href="../aset/plugins/datatables/buttons.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../aset/plugins/select2/select2.css">
    <link rel="stylesheet" href="../aset/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
	<!-- Sweet Alert -->
    <link rel="stylesheet" href="../aset/dist/css/skins/_all-skins2.css">
	<link rel="stylesheet" href="../aset/plugins/datepicker/datepicker3.css">
		<style>
.content-wrapper {
   background-color: #ffffff;
}
.content {
   background-color: #ffffff;
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