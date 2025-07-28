<?php
class Evento {
    public $nombre;
    public $descripcion;
    public $tipo;
    public $lugar;
    public $fecha;
    public $hora;

    public function __construct($nombre, $descripcion, $tipo, $lugar, $fecha, $hora) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->lugar = $lugar;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function mostrar() {
        return "
        <div>
            <h2>{$this->nombre}</h2>
            <p><strong>Tipo:</strong> {$this->tipo}</p>
            <p><strong>Descripción:</strong> {$this->descripcion}</p>
            <p><strong>Lugar:</strong> {$this->lugar}</p>
            <p><strong>Fecha:</strong> {$this->fecha}</p>
            <p><strong>Hora:</strong> {$this->hora}</p>
        </div>
        <hr>";
    }

    public static function filtrarPorTipo($eventos, $tipoBuscado) {
        return array_filter($eventos, function($evento) use ($tipoBuscado) {
            return stripos($evento->tipo, $tipoBuscado) !== false;
        });
    }
}
?>