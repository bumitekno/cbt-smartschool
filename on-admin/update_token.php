<?php
session_start();
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) { 
header('location:../admin/index.php');
} else {
$s = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);
$myfile = fopen("../on-siswa/token.txt", "w") or die("Unable to open file!");
$txt = $s;
fwrite($myfile, $txt);
fclose($myfile);
header('location:index.php?token=1');
}
?>