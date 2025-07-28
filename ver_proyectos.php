<?php
include "conexion.php";

$result = mysqli_query($conn, "SELECT * FROM PROYECTO");
echo "<h2>Lista de Proyectos</h2>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>{$row['nombre']} - Presupuesto: \${$row['presupuesto']}</p>";
}
?>