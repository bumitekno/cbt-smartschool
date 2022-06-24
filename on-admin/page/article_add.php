<?php
include ('../../koneksi/koneksi.php');

$author					= $_POST['author'];
$content		    	= $_POST['content'];

if ($add = mysqli_query($konek, "INSERT INTO article (content, author) VALUES 
	('$content', '$author')")){
		header("Location:../pesan.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>