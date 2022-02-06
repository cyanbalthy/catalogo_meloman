<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    
    <title>360° Viewer</title>
</head>
<body>
    
 <a-scene>
 
  <a-assets>
    <a-asset-item id="three" src="../assets/cubo.glb"></a-asset-item>
  </a-assets>
 
    <a-camera
        id="camera"
        position="0 8 200"
        raycaster="objects: .cantap"
        drag-rotate-component look-controls="enabled:false"
        cursor="fuse: false; rayOrigin: mouse;">
    </a-camera>
     
    <a-light type="ambient" intensity="0.7"></a-light>
  
    <a-entity 
        id="model" 
        gltf-model="#three" 
        class="cantap" 
        scale="500 500 500" 
        drag-rotate-component look-controls="enabled:true"
        shadow="receive: false">
    </a-entity>
  
    <a-plane
        id="ground" 
        rotation="-90 0 0" 
        width="1000" 
        height="1000" 
        material="shader: shadow" 
        shadow>
    </a-plane>
</a-scene>
    <button type="button" onclick="location.href='../index.php'">360° view</button>
</body>