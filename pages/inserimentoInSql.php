<?php

    require('../utility/database.php');
    $uploadRiuscito = true;
    $uploadRiuscito2 = true;

    //upload image
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      echo "Sorry, file already exists.<br><br>";//control if the file exist
      $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "bmp" && $imageFileType != "dib") {
      echo "Sorry, only JPG, JPEG, PNG, BMP & DIB files are allowed.";//control that the file has one of those extension
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br><br>";
        $uploadRiuscito = false;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            $imagename=$_FILES['img']['name'];
            echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.<br><br>";
      } else {
            echo "Sorry, there was an error uploading your file.<br><br>";
            $uploadRiuscito = false;
      }
    }
  
    //upload model
    $target_dir2 = "../assets/";
    $target_file2 = $target_dir2 . basename($_FILES["model"]["name"]);
    $uploadOk2 = 1;
    $imageFileType2 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file2)) {
      echo "Sorry, file already exists.<br><br>";//control if the file exist
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

    //$modelname=null;

    //passaggio di stringhe con real_escape_string per evitare problemi di sql injection
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $tipo = $mysqli->real_escape_string($_POST['tipo']);
    $desc = $mysqli->real_escape_string($_POST['desc']);
    $prezzo = $mysqli->real_escape_string($_POST['prezzo']);
    $nPezzi = $mysqli->real_escape_string($_POST['nPezzi']);
    $codProd = $mysqli->real_escape_string($_POST['codProd']);
    $nomeImg = $mysqli->real_escape_string($imagename);
    $nomeModel = $mysqli->real_escape_string($modelname);
    $mat = explode(', ', $mysqli->real_escape_string($_POST['mat']));//dividere la stringa in più parti per controllare tutti i materiali

    $esisteGiaCodProd=false;
    $query="SELECT Oggetti.codiceProdotto FROM Oggetti";
    if($result = $mysqli->query($query)){

        while($row=$result->fetch_assoc()){
            if(strcasecmp($row['codiceProdotto'],$codProd )==0){
                $esisteGiaCodProd=true;
                break;
            }
        }

    }

//controllo, se una di queste cose succede non inserisce il prodotto
    if($esisteGiaCodProd==true){
        echo "codice prodotto gia esistente";
    }else if($uploadRiuscito == false){
        echo "error, image was not uploaded";
    }else if($uploadRiuscito2 == false){
        echo "error, 3D model was not uploaded";
    }else{

        $idMater=array();
        $NomeMat=array();
        $tmpMat=array();

        $i=0;
        $j=0;

        for($i=0;$i<count($mat);$i+=1){
            $tmpMat[$i]=$mat[$i];
        }

        var_dump($mat);var_dump($tmpMat);

        $query = "SELECT idMateriale, nomeMateriale FROM Materiali";
        if($result = $mysqli->query($query)){
            //controllo se tutti i materiali inseriti ci sono in database sennò li aggiunge
            while($row=$result->fetch_assoc()){
                for($i=0;$i<count($tmpMat);$i+=1){

                    if($row['nomeMateriale']== $tmpMat[$i]){
                        $NomeMat[]= $row['nomeMateriale'];
                        $j+=1;
                        unset($tmpMat[$i]);
                        $tmpMat = array_values($tmpMat);
                        break;
                    }

                }
            }
            
            //finchè ci sono materiali da aggiungere continua ad aggiungere
            if(count($mat)>count($tmpMat)){
                for($i=0;$i<count($tmpMat);$i+=1){
                    $query="INSERT INTO catalogo_lilja.Materiali (Materiali.idMateriale, Materiali.nomeMateriale, Materiali.luogoAcquisto, Materiali.costoMateriale) VALUES ('0','{$tmpMat[$i]}','NA','0')";
                    if ($mysqli->query($query) === TRUE) { //controlloinserimento corretto + inserimento
                      echo "New record created successfully <br><br>";
                    } else {
                      echo "Error: " . $query . "<br>" . $mysqli->error;
                    }
                }
            }

        }

        $query = "SELECT idMateriale, nomeMateriale FROM Materiali";
        if($result = $mysqli->query($query)){

            while($row=$result->fetch_assoc()){
                for($i=0;$i<count($mat);$i+=1){
                    if($row['nomeMateriale']== $mat[$i]){
                        $idMater[]= $row['idMateriale'];//prendo gli id dei materiali inseriti 
                    }
                }
            }
        }
        echo count($mat) . count($tmpMat) . count($NomeMat) . count($idMater) . "<br><br>";
        $n=count($idMater);//prende il numero dei materiali da inserire
        
        //in base al numero dei materiali fa un select diverso
        if($n==1){
            $query = "SELECT * FROM ComposizioneOggetto WHERE idMat1='{$idMater[0]}' AND idMat1=0 AND idMat1=0 AND idMat1=0 AND idMat1=0";
        }else if($n==2){
            $query = "SELECT * FROM ComposizioneOggetto WHERE idMat1='{$idMater[0]}' AND idMat2='{$idMater[1]}' AND idMat3=0 AND idMat1=0 AND idMat1=0";
        }else if($n==3){
            $query = "SELECT * FROM ComposizioneOggetto WHERE idMat1='{$idMater[0]}' AND idMat2='{$idMater[1]}' AND idMat3='{$idMater[2]}' AND idMat4=0 AND idMat5 =0";
        }else if($n==4){
            $query = "SELECT * FROM ComposizioneOggetto WHERE idMat1='{$idMater[0]}' AND idMat2='{$idMater[1]}' AND idMat3='{$idMater[2]}' AND idMat4='{$idMater[3]}' AND idMat5=0";
        }else if($n==5){
            $query = "SELECT * FROM ComposizioneOggetto WHERE idMat1='{$idMater[0]}' AND idMat2='{$idMater[1]}' AND idMat3='{$idMater[2]}' AND idMat4='{$idMater[3]}' AND idMat5='{$idMater[4]}'";
        }

        //controllo se esiste quella composizione di oggetto 
        $result = $mysqli->query($query);
        if(mysqli_num_rows($result) == 0) {
            //in base al numero dei materiali cambia il tipo di inserimento
            if($n==1){
                $query2 = "INSERT INTO catalogo_lilja.ComposizioneOggetto (ComposizioneOggetto.idComp, ComposizioneOggetto.idMat1, ComposizioneOggetto.idMat2, ComposizioneOggetto.idMat3, ComposizioneOggetto.idMat4, ComposizioneOggetto.idMat5) VALUES ('0','{$idMater[0]}', 0, 0, 0, 0)";
            }else if($n==2){
                $query2 = "INSERT INTO catalogo_lilja.ComposizioneOggetto (ComposizioneOggetto.idComp, ComposizioneOggetto.idMat1, ComposizioneOggetto.idMat2, ComposizioneOggetto.idMat3, ComposizioneOggetto.idMat4, ComposizioneOggetto.idMat5) VALUES ('0','{$idMater[0]}','{$idMater[1]}', 0, 0, 0)";
            }else if($n==3){
                $query2 = "INSERT INTO catalogo_lilja.ComposizioneOggetto (ComposizioneOggetto.idComp, ComposizioneOggetto.idMat1, ComposizioneOggetto.idMat2, ComposizioneOggetto.idMat3, ComposizioneOggetto.idMat4, ComposizioneOggetto.idMat5) VALUES ('0','{$idMater[0]}','{$idMater[1]}','{$idMater[2]}',0,0)";
            }else if($n==4){
                $query2 = "INSERT INTO catalogo_lilja.ComposizioneOggetto (ComposizioneOggetto.idComp, ComposizioneOggetto.idMat1, ComposizioneOggetto.idMat2, ComposizioneOggetto.idMat3, ComposizioneOggetto.idMat4, ComposizioneOggetto.idMat5) VALUES ('0','{$idMater[0]}','{$idMater[1]}','{$idMater[2]}','{$idMater[3]}', 0)";
            }else if($n==5){
                $query2 = "INSERT INTO catalogo_lilja.ComposizioneOggetto (ComposizioneOggetto.idComp, ComposizioneOggetto.idMat1, ComposizioneOggetto.idMat2, ComposizioneOggetto.idMat3, ComposizioneOggetto.idMat4, ComposizioneOggetto.idMat5) VALUES ('0','{$idMater[0]}','{$idMater[1]}','{$idMater[2]}','{$idMater[3]}','{$idMater[4]}')";
            }
            
            if ($mysqli->query($query2) === TRUE) { //controlloinserimento corretto + inserimento
              echo "New record created successfully <br><br>";
            } else {
              echo "Error: " . $query2 . "<br>" . $mysqli->error;
            }
            
            if($result = $mysqli->query($query)){
                while($row=$result->fetch_assoc()){
                    $idComp = $row['idComp'];
                }
            }
        } else {
            while($row=$result->fetch_assoc()){
                $idComp = $row['idComp'];
            }
        }
        //controllo su possibili null
        if($desc==""){
            unset($desc);
        }

        if($npezzi==-1){
            unset($npezzi);
        }

        
        //inserimento oggetto
        $query="INSERT INTO catalogo_lilja.Oggetti (Oggetti.id, Oggetti.nome, Oggetti.tipo, Oggetti.descrizione, Oggetti.prezzo, Oggetti.quantitàDisp, Oggetti.idComp, Oggetti.codiceProdotto, Oggetti.nomeFoto, Oggetti.nomeModello3D) VALUES ('0','{$nome}','{$tipo}','{$desc}','{$prezzo}','{$nPezzi}','{$idComp}','{$codProd}','{$nomeImg}','{$nomeModel}')";

        if ($mysqli->query($query) === TRUE) { //controlloinserimento corretto + inserimento
          echo "New record created successfully <br><br>";
        } else {
          echo "Error: " . $query . "<br>" . $mysqli->error;
        }
    }

    $mysqli->close();   //chiudo la connessione

    echo "<br><br><button onclick='location.href=\"inserimentoDatiForm.php\"'>torna all'inserimento</button>";
?>
