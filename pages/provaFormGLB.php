<!DOCTYPE html>
<html>
    <head>
        <title>inserimento materiale</title>
        <?php include('../utility/bootstrap.php') ?>
        <link rel="stylesheet" href="../css/styleForm.css">
    </head>
    <body class="borderPlusAligned">
        <script src="../js/imageDownload.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.3/plupload.full.min.js"></script>
        
            <h2>inserire l'oggetto</h2>
            <form action="./provaUploadGLB.php" method="post" enctype="multipart/form-data">

                <div class ="row mb-3">
                    <div class="col-sm-3"></div>
                    <label for="model" class="col-sm-2 col-form-label labelToRight">modello 3D: </label>
                    <div class="col-sm-4">
                        <input type="file" accept=".glb,.gltf,.jpg" id="model" name="model" placeholder="nome modello 3D" class="form-control">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
    
    </body>
</html>