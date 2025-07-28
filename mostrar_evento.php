<?php
require_once 'evento.php';

$eventos = [
    new Evento("Festival Primavera", "Concierto con artistas", "Cultural", "Plaza Central", "2025-06-30", "18:00"),
    new Evento("Carrera Solidaria", "Corrida familiar", "Deportivo", "Parque Norte", "2025-07-05", "09:00"),
    new Evento("Charla de Tecnología", "Charla sobre IA", "Educativo", "Biblioteca", "2025-06-20", "17:00")
];

// Mostrar directamente el HTML para cada evento
foreach ($eventos as $evento) {
    echo "
    <div class='evento'>
        <h4>{$evento->nombre}</h4>
        <p><strong>Tipo:</strong> {$evento->tipo}</p>
        <p><strong>Descripción:</strong> {$evento->descripcion}</p>
        <p><strong>Lugar:</strong> {$evento->lugar}</p>
        <p><strong>Fecha:</strong> {$evento->fecha}</p>
        <p><strong>Hora:</strong> {$evento->hora}</p>
        <hr>
    </div>
    ";
}
?>