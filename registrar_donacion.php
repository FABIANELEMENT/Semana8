<?php
include "conexion.php";

$id_donante = $_POST['id_donante'];
$id_proyecto = $_POST['id_proyecto'];
$monto = $_POST['monto'];

$stmt = $conn->prepare("INSERT INTO DONACION (monto, id_proyecto, id_donante) VALUES (?, ?, ?)");
$stmt->bind_param("dii", $monto, $id_proyecto, $id_donante);
$stmt->execute();

echo "¡Donación registrada exitosamente!";
$stmt->close();
$conn->close();
?>
