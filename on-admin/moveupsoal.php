<?php 
error_reporting(0); 
$file = $_FILES["file"]["name"];
$folder ="images";
unlink($folder.$file);
$tmp_name = $_FILES['file']['tmp_name'];
$target = $folder.$file;
move_uploaded_file($tmp_name, $target);
$filename = $target;

if (file_exists($filename)) {
header('location:up-gbrsoal.php?upload=1&file='.$filename);
} else {
header('location:up-gbrsoal.php?upload=0');
}
?>