<?php
include "conexion.php";

$result = mysqli_query($conn, "SELECT * FROM DONANTE");
echo "<h2>Lista de Donantes</h2>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>{$row['nombre']} - {$row['email']} - {$row['telefono']}</p>";
}
?>
