<?php    

    $target_dir2 = "../assets/";
    $target_file2 = $target_dir2 . basename($_FILES["model"]["name"]);
    $uploadOk2 = 1;
    $imageFileType2 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file2)) {
      echo "Sorry, file already exists.<br><br>";
      $uploadOk2 = 0;
    }

    if ($uploadOk2 == 0) {
        echo "Sorry, your file was not uploaded.<br><br>";
        $uploadRiuscito2 = false;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["model"]["tmp_name"], $target_file2)) {
            $modelname=$_FILES['model']['name'];
            echo "The file ". htmlspecialchars( basename( $_FILES["model"]["name"])). " has been uploaded.<br><br>";
      } else {
            echo "Sorry, there was an error uploading your file.<br><br>";
            $uploadRiuscito2 = false;
      }
    }
?>