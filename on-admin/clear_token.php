<?php
$s = '';
$myfile = fopen("../on-siswa/token.txt", "w") or die("Unable to open file!");
$txt = $s;
fwrite($myfile, $txt);
fclose($myfile);
header('location:index.php?token=1');
?>