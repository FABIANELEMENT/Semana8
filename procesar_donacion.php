<?php
// Aumentar tiempo de vida de la sesión (30 minutos)
ini_set('session.gc_maxlifetime', 1800);

session_start();  // Iniciar sesión

// Verificar método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se recogen los datos y se limpian
    $nombre = htmlspecialchars($_POST['nombre'] ?? '');
    $monto = intval($_POST['monto'] ?? 0);

    // Validación de los datos ingresados, que exista un nombre y un valor positivo
    if (!$nombre || $monto <= 0) {
        echo "<h2>Error en la Donación</h2>";
        echo "<p style='color:red;'>Nombre o monto no válidos.</p>";
        echo "<a href='javascript:history.back()'>Volver e intentarlo de nuevo</a>";
        exit;
    }

    // Agregar donación al carrito (sesión)
    $_SESSION['carrito_donaciones'][] = [
        'nombre' => $nombre,
        'monto' => $monto
    ];


    // Mostrar agradecimiento una vez aceptada la donación
    echo "<h2>¡Gracias por tu donación, $nombre!</h2>";
    echo "<p>Has donado $$monto. Tu apoyo es muy valioso para nuestra organización y así poder colaborando con la comunidad.</p>";
    echo "<p><a href='index.html'>Volver al inicio</a></p>";
    echo "<p><a href='ver_carrito.php'>Ver Carrito de Donaciones</a></p>";
} else {
    echo "<p>Acceso no permitido.</p>";
}

?>