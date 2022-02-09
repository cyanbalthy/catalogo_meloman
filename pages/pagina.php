<!DOCTYPE html>
<html>
<head>
    <title>Prototipo</title>   
    
    <!-- componenti -->
    <link rel="stylesheet" href="../css/styles.css"> <!-- componente css -->
    <?php include '../utility/ricerca.php';?> <!-- componente metodo php per la compilazilazione dei campi -->
    
    <!-- font-family: ubuntu bold-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    
</head>   
<body>
    
    <h1 id="title">Lilja</h1>
    
    <table>
        
        <?php
            dettagli(); //impaginazione prodotto
        ?>
     
</table>
</body>
</html>