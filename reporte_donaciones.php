<?php
include "conexion.php";

$query = "
SELECT 
    p.nombre AS proyecto,
    COUNT(d.id_donacion) AS total_donaciones,
    SUM(d.monto) AS total_recaudado
FROM DONACION d
JOIN PROYECTO p ON d.id_proyecto = p.id_proyecto
GROUP BY p.id_proyecto
HAVING COUNT(d.id_donacion) > 2
";

$result = mysqli_query($conn, $query);

echo "<h2>Proyectos con más de 2 donaciones</h2>";
echo "<table border='1' cellpadding='8'>
<tr><th>Proyecto</th><th># Donaciones</th><th>Total Recaudado</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['proyecto']}</td>
            <td>{$row['total_donaciones']}</td>
            <td>\${$row['total_recaudado']}</td>
          </tr>";
}
echo "</table>";
?>
