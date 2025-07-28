<?php

$servername = "localhost";
$database = "ORGANIZACION"; // Base de datos creada en MySQL
$username = "root"; 
$password = ""; 

// Creación de la conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificación de la conexión
if (!$conn) {
    die("Fallo de conexión: " . mysqli_connect_error());
}

?>

