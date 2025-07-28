<?php
class Evento {
    public $nombre;
    public $descripcion;
    public $presupuesto;
    public $fecha_inicio;
    public $fecha_fin;
    
    public function __construct($nombre, $descripcion, $presupuesto, $fecha_inicio, $fecha_fin) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->presupuesto = $presupuesto;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

    public function mostrar() {
        return "
        <div>
            <h2>{$this->nombre}</h2>
            <p><strong>Tipo:</strong> {$this->descripcion}</p>
            <p><strong>Descripción:</strong> {$this->presupuesto}</p>
            <p><strong>Lugar:</strong> {$this->fecha_inicio}</p>
            <p><strong>Fecha:</strong> {$this->fecha_fin}</p>
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