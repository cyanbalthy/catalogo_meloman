<!DOCTYPE html>
<html>
    <head>
        <title>inserimento materiale</title>
        <?php include('../utility/bootstrap.php') ?>
        <link rel="stylesheet" href="../css/styleForm.css">
    </head>
    <body class="borderPlusAligned">
        <script src="../js/imageDownload.js"></script>
        
            <h2>inserire l'oggetto</h2>
            <form action="./inserimentoInSql.php" method="post" enctype="multipart/form-data">

                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="nome" class="col-sm-2 col-form-label labelToRight">Nome oggetto: </label>
                    <div class="col-sm-4">
                        <input type="text" id="nome" name="nome" placeholder="nome" class="form-control" required>
                    </div>
                </div>
                
                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="tipo" class="col-sm-2 col-form-label labelToRight">Tipo oggetto: </label>
                    <div class="col-sm-4">
                        <select id="tipo" name="tipo" class="form-select">
                            <option selected>scegli...</option>
                            <option>Bracciale</option>
                            <option>Anello</option>
                            <option>Collana</option>
                            <option>Pendente</option>
                            <option>Collana/Pendente</option>
                            <option>Orecchini</option>
                            <option>FermaCravatta</option>
                            <option>Gemelli</option>
                            <option>Spilla</option>
                            <option>FermaCapelli</option>
                            <option>Portachiavi</option>
                            <option>Stemma</option>
                            <option>Porta Sigarette</option>
                            <option>Porta Accendino</option>
                        </select>
                    </div>
                </div>
                
                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="prezzo" class="col-sm-2 col-form-label labelToRight">prezzo oggetto: </label>
                    <div class="col-sm-4">
                        <input type="number" id=prezzo name="prezzo" placeholder="prezzo oggetto" step=".01" class="form-control" min="0" required>
                    </div>
                </div>
                
                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="desc" class="col-sm-2 col-form-label labelToRight">descrizione: </label>
                    <div class="col-sm-4">
                        <input type="text" id="desc" name="desc" placeholder="descrizione" class="form-control">
                    </div>
                </div>
                
                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="nPezzi" class="col-sm-2 col-form-label labelToRight">numero pezzi disponibili: </label>
                    <div class="col-sm-4">
                        <input type="number" id="nPezzi" name="nPezzi" placeholder="se vuoi che non ci sia un limite inserire -1" class="form-control" min="-1">
                    </div>
                </div>
                
                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="img" class="col-sm-2 col-form-label labelToRight">immagine: </label>
                    <div class="col-sm-4">
                        <input type="file" accept="image/*" id="img" name="img" placeholder="no file chosen" class="form-control" required>
                    </div>
                </div>
                
                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="model" class="col-sm-2 col-form-label labelToRight">modello 3D: </label>
                    <div class="col-sm-4">
                        <input type="file" accept=".glb,.gltf" id="model" name="model" placeholder="nome modello 3D" class="form-control">
                    </div>
                </div>
                
                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="mat" class="col-sm-2 col-form-label labelToRight">materiali: </label>
                    <div class="col-sm-4">
                        <input type="text" id="mat" name="mat" placeholder="inserire i materiali con l'impostazione 'mat, mat2, mat3 ...'" class="form-control">
                    </div>
                </div>
                
                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="codProd" class="col-sm-2 col-form-label labelToRight">codice prodotto: </label>
                    <div class="col-sm-4">
                        <input type="text" id="codProd" name="codProd" placeholder="codice random" class="form-control" required>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" value="Submit">
                
            </form>
    
    
    
    
    </body>
</html>