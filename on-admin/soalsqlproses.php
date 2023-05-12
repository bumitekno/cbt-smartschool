<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');

$connect = mysqli_connect('localhost','root','');
if (!$connect) {
die('Could not connect to MySQL: ' . mysqli_error());
}
//nama database
$cid =mysqli_select_db($konek, 'cbt_eschool', $connect);



$zip = new ZipArchive;
$zip->open('soal.zip');
$zip->extractTo('./');
$zip->close();
// Name of the file
$filename = 'soal.sql';
// MySQL host
$mysqli_host = 'localhost';
// MySQL username
$mysqli_username = 'root';
// MySQL password
$mysqli_password = '';
// Database name
$mysqli_database = 'cbt_eschool';

// Connect to MySQL server
$con = @new mysqli($mysqli_host,$mysqli_username,$mysqli_password,$mysqli_database);

// Check connection
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_errno;
    echo "<br/>Error: " . $con->connect_error;
}

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line) {
// Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

// Add this line to the current segment
    $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';') {
        // Perform the query
        $con->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $con->error() . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
echo "Tables imported successfully";

unlink('soal.zip');
unlink('soal.sql');
header("location:syncupload.php?pesan=sukses");
exit();
?>