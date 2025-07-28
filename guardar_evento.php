<?php
require_once 'evento.php';

// Verificar que todos los datos fueron enviados correctamente
if (
    isset($_POST['nombre']) &&
    isset($_POST['descripcion']) &&
    isset($_POST['tipo']) &&
    isset($_POST['lugar']) &&
    isset($_POST['fecha']) &&
    isset($_POST['hora'])
) {
    // Recuperar los datos desde el formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $lugar = $_POST['lugar'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Crear un nuevo objeto Evento
    $evento = new Evento($nombre, $descripcion, $tipo, $lugar, $fecha, $hora);

    // Estos datos se pueden guardar en alguna base de datos
    // Por ahora solo mostramos el evento registrado como confirmación
    echo "<h2>Evento registrado correctamente:</h2>";
    echo $evento->mostrar();
    echo "<a href='index.html'>Volver al inicio</a>";
} else {
    echo "<p>Error: Faltan datos del formulario.</p>";
    echo "<a href='index.html'>Volver</a>";
}
?>