<?php


function upload($file, $direktori){
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    $allowedTypes = ['image/jpeg', 'image/png'];
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    //die(isset($file) && $file['error'] === UPLOAD_ERR_OK);

    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        
    
        $file_name = $file['name'];
        $source = $file['tmp_name'];


        if ($file['size'] > $maxFileSize) {
            echo "<div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <i class='icon fa fa-warning'></i> Gagal Upload , Ukuran".$file_name." lebih dari 2Mb !!!.
                </div>";
            exit();	
        }

        // Check MIME type
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        
        $fileType = mime_content_type($file['tmp_name']);

        if (!in_array($fileType, $allowedTypes) || !in_array($fileExtension, $allowedExtensions)) {
            echo "<div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                    <button onclick='window.history.back()' type='button' class='close btn btn-danger' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <i class='icon fa fa-warning'></i> Gagal Upload ".$file_name." tidak disuport !!!.
                </div>";
            exit();
        }

        // Check for errors during upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "<div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                    <button onclick='window.history.back()' type='button' class='close btn btn-danger' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <i class='icon fa fa-warning'></i> Gagal Upload ".$file_name." !!!.
                </div>";
            exit();
        }

        if(!move_uploaded_file($source,$direktori . $file_name)){
            echo "<div class='col-lg-3 col-md-4 alert alert-danger alert-dismissible fade-in'>
                    <button onclick='window.history.back()' type='button' class='close btn btn-danger' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <i class='icon fa fa-warning'></i> Gagal Upload ".$file_name." !!!.
                </div>";
            exit();
        }

        return $file_name;

    }else{
        $error = $file['error'];

        switch ($error) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "Error: File size is too large.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "Error: No file uploaded.";
                break;
            default:
                echo "Error: There was a problem uploading the file.";
                break;
        }

        die('Error : error');
    }


}





?>