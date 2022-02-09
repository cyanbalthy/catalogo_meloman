<!DOCTYPE html>
<html>
<head>
    <title>Tutti i prodotti</title>
    <?php include '../pages/prodotto.php';?>
</head>
<body>
    
    <?php

        require('./database.php');
        
        //array per gli oggetti
        $array = array(); //array per gli oggetti
    
        //dati per la gestione della tabella dei prodotti
        $numProdotti = 0; //numero di prodotti salvati dentro l'array ha solo scopo di controllo
        $fine = 0; //blocchera la creazione della tabella se i prodotti sono finiti
        $colonne = 4; //numero delle colonne della tabella
        $percorso = "./images/"; //percorso per la tabella delle immagini
        
        //$_GET["tipologia"] = "Collana";
    
        //query per la ricerda dei prodotti
        if(isset($_GET["tipologia"])){
            $query = 'SELECT * FROM Oggetti WHERE Oggetti.tipo = "'.$_GET["tipologia"].'"';
            
        }else{
            $query = "SELECT * FROM Oggetti";  //query ricerca prodotto
        }
        
        if($result = $mysqli->query($query)){
            
            while($row=$result->fetch_assoc()){
                
                $array[$numProdotti] = new Prodotto($row["id"], $row["nome"], $row["tipo"], $row["immagine"]); //inserimento dati nell'Array
                $numProdotti++; //incremento indice Array
            }
        }        
        
        echo '<h1>Prodotti</h1>';
        
        echo'<table>';
        for($i = 0; $i <= count($array); $i++){
            echo"<tr>";
            for($j = 0; $j <= $colonne; $j++){
                if($fine < $numProdotti){
                    $path = $percorso.$array[$fine]->get_immagine();
                    echo'<td>';
                          echo'<a href="../pages/pagina.php?id='.$array[$fine]->get_id().'">';
                            echo'<img src="'.$path.'">';
                          echo'</a>';
                    echo'</td>';
                    $fine++;
                }else{
                    break;
                }   
            }
            echo"</tr>";
        }    
        echo'</table>';
    
        /*
        echo'<table>';
        for($i = 0; $i <= count($array); $i++){
            echo"<tr>";
            for($j = 0; $j <= $colonne; $j++){
                if($fine < $numProdotti){
                    $path = $percorso.$array[$fine]->get_immagine();
                    echo'<td>';
                        echo '<input type=\'image\' src="'.$path.'"</>';
                    echo'</td>';
                    $fine++;
                }else{
                    break;
                }   
            }
            echo"</tr>";
        }    
        echo'</table>';
        */
        
        /*
        echo var_dump($array);
        echo var_dump($query);
        */

        echo<<<END
                <br><form action="./lista.php" method='get'>
            END;

        echo'<label for="cars">Filtra Prodotti:</label><br>';

            echo'<select name="tipologia">';
                echo'<option value="Anello">Anello</option>';
                echo'<option value="Bracciale">Bracciale</option>';
                echo'<option value="Collana">Collana</option>';
                echo'<option value="Pendente">Pendente</option>';
            echo'</select>';
            echo<<<END
                <input type="submit" value='Filtra'>
                END;
        echo'</form>';









    ?>
    
    
</body>
</html>





