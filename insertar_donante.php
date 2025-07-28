<?php
//Se realiza la conexion con la base de datos
include "conexion.php";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$stmt = $conn->prepare("INSERT INTO DONANTE (nombre, email, direccion, telefono) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $email, $direccion, $telefono);
$stmt->execute();

echo "Donante agregado correctamente.";
$stmt->close();
//$conn->close();
?>