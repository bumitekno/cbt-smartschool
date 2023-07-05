<?php
session_start();
include ('../koneksi/koneksi.php');
include ('conn/cek.php');
include ('conn/fungsi.php');
?>
<?php
    extract($_POST);
    $error=array();
    $extension=array("jpeg","JPG","jpg","png","gif","PNG","mp3","ogg");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists("images/".$file_name))
                    {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../gbr/".$file_name);
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../gbr/".$file_name);
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }
            echo "
            <div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-check'></i> Success Upload file !!!.
            </div>";
            echo("<meta http-equiv='refresh' content='2'>");
		    exit();
?>