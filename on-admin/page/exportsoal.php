<?php
error_reporting(0);
include ('../../koneksi/koneksi.php');
include ('../conn/fungsi.php');
if($admin_su == 1)
				        {
				             $username=$_SESSION['admin'];
					   
				        }
				         else if ($admin_su == 0)
				        {
				             $username=$_SESSION['admin'];
					   
				        }
				        else
				        {
				             header('location:../soal.php?gagal=1');
				             exit;
				        }
$mapel=$_GET['matpel'];
$jenis=$_GET['jenis'];
$kode=$_GET['kode'];
include ('../../koneksi/db.php');
$SQL = "SELECT * from soal where kodemapel='$mapel' and jenissoal='$jenis' and kodesoal='$kode'";
$header = '';
$result ='';
$exportData = mysqli_query ($connsite, $SQL ) or die ( "Sql error : " . mysqli_error($connsite) );
$fields = mysqli_num_fields ($connsite, $exportData );
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysqli_field_name( $exportData , $i ) . "\t";
}
while( $row = mysqli_fetch_row( $exportData ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export-soal-$mapel-$kode.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
?>