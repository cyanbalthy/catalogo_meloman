<?php

//costruzione pagina 
    function buildPage($id, $nome, $tipo, $descrizione, $prezzo, $quantita, $immagine, $modello){
        
        echo '<table>';
            echo '<tr>';
                echo'<th><p class="text">ID: </p></th>'; 
                echo'<th><p class="text">'.$id.'</p></th>'; //ID del prodotto
            echo '</tr>';
            echo '<tr>';
                echo'<th colspan="2">';
                echo '<p class="text">'.$nome.'</p>'; //Nome del prodotto
                echo '</th>'; 
            echo '</tr>';
            echo'<tr>';
                echo'<td colspan="2">';
                echo'<img src="'.$immagine.'"'; //Immagine del prodotto
                echo'</td>'; 
            echo'</tr>';
            echo'<tr>';
                echo'<th><p class="text">Tipo:</p></th>'; 
                echo'<th><p class="text">'.$tipo.'</p></th>'; //Tipo del prodotto
            echo'</tr>';
            echo'<tr>';  
                echo'<th><p class="text">Descrizione:</p></th>'; 
                echo'<th><p class="text">'.$descrizione.'</p></th>'; //Descrizione del prodotto
            echo'</tr>';
            echo'<tr>';
                echo'<th><p class="text">Prezzo: </p></th>';
                echo'<th><p class="text">'.$prezzo.'</p></th>'; //Prezzo del Prodotto
            echo'</tr>';
            echo'<tr>';
                echo'<th><p class="text">quantità</p></th>';
                echo'<th><p class="text">'.$quantita.'</p></th>'; //Quantità del prodotto
            echo'</tr>';
            echo'<tr>';
                    echo'<td colspan="2"><button type="button" onclick="location.href=\'../vr/index.html\'">360° view</button><td>'; //bottone per il visalizzatore a 360°
            echo'</tr>';
        echo '</table>';
        
        /*
        echo 'path modelli';
        echo $immagine;
        echo '<br>';
        echo $modello;
        */
        
        echo "<form action='/pages/viewer.php' method='get'>";
        echo "<input type='hidden' value = '". $modello . "' name ='model'>";
        echo "</form>";

    }

?>