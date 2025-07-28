<?php
include "conexion.php";

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$presupuesto = $_POST['presupuesto'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$stmt = $conn->prepare("INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdss", $nombre, $descripcion, $presupuesto, $fecha_inicio, $fecha_fin);
$stmt->execute();

echo "Proyecto agregado correctamente.";
$stmt->close();
$conn->close();
?>