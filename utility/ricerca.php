<?php

    include 'pageBuilder.php';
    
    //ricerca i dettagli di un prodotto
    function dettagli()
    {   
        //connessione al database
        require('database.php');
        
        //path dei file
        $immagine = "../images/"; //path per le immagini
        $modello = "../assets/"; //path per i modelli 
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }else{
            $id = 0;
        }
        
        //Gestione database
        $query = "SELECT * FROM  Oggetti WHERE Oggetti.id = "; //query ricerca prodotto
        $query .= $id;
      
        if($result = $mysqli->query($query)){
            
            while($row=$result->fetch_assoc()){
                
                $id = $row["id"]; //id prodotto
                $nome = $row["nome"]; //nome prodotto
                $tipo = $row["tipo"]; //tipo prodotto
                $descrizione = $row["descrizione"]; //descrizione prodotto
                $prezzo = $row["prezzo"]; //prezzo prodotto
                $quantita = $row["quantitàDisp"]; //quantià prodotto
                $immagine .= $row["nomeFoto"]; //path immagine prodotto
                $modello .= $row["nomeModello3D"]; //path modello prodotto
                
                
            }
        }
        
        buildPage($id, $nome, $tipo, $descrizione, $prezzo, $quantita, $immagine, $modello); //costruisce la pagina del prodotto
    }
    
    
    

   
    




?>