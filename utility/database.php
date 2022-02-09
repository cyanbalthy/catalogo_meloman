<?php

$dbhost = "127.0.0.1";
$username = "root";
$password = "meloman";
$db = "catalogo_lilja";

$mysqli = new mysqli($dbhost,$username,$password,$db);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully <br><br>";
?>