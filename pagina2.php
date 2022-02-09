
<?php
  session_start();
  echo "Il colore e': " .$_SESSION["colore"].".<br>";
  echo "L'animale e': " .$_SESSION["animale"].".<br>";
  session_destroy();
?>
