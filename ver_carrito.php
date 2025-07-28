<?php
session_start();

echo "<h2>Carrito de Donaciones</h2>";

if (!empty($_SESSION['carrito_donaciones'])) {
    $total = 0;
    foreach ($_SESSION['carrito_donaciones'] as $donacion) {
        echo "<p><strong>Donante:</strong> " . htmlspecialchars($donacion['nombre']) . "<br>";
        echo "<strong>Monto:</strong> $" . number_format($donacion['monto'], 2) . "</p><hr>";
        $total += $donacion['monto'];
    }
    echo "<p><strong>Total donado:</strong> $" . number_format($total, 2) . "</p>";
} else {
    echo "<p>No hay donaciones en el carrito.</p>";
}

echo "<a href='index.html'>Volver a inicio</a>";
?>