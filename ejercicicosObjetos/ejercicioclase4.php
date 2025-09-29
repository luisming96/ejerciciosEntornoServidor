<?php
class Libro {
    public $titulo;
    public $autor;
    public $anio;

    public function __construct($titulo, $autor, $anio) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anio = $anio;
    }

    public function mostrarInfo() {
        echo "Tipo: Libro\n";
        echo "Título: " . $this->titulo . "\n";
        echo "Autor: " . $this->autor . "\n";
        echo "Año: " . $this->anio . "\n\n";
    }

    public function __destruct() {
        echo "El libro '{$this->titulo}' ha sido destruido\n";
    }
} 

class Revista extends Libro {
    public $numeroEdicion;

    public function __construct($titulo, $autor, $anio, $numeroEdicion) {
        parent::__construct($titulo, $autor, $anio);
        $this->numeroEdicion = $numeroEdicion;
    }

    public function mostrarInfo() {
        echo "Tipo: Revista\n";
        echo "Título: " . $this->titulo . "\n";
        echo "Autor/Editor: " . $this->autor . "\n";
        echo "Año: " . $this->anio . "\n";
        echo "Número de Edición: " . $this->numeroEdicion . "\n\n";
    }
}

$coleccion = [
    new Libro("Moby Dick", "Herman Melville", 1851),
    new Revista("Time", "Time Inc.", 2024, 15),
    new Libro("Orgullo y Prejuicio", "Jane Austen", 1813),
    new Revista("Vogue", "Condé Nast", 2024, 305)
];

function mostrarColeccion($items) {
    echo "COLECCIÓN COMPLETA\n";
    foreach ($items as $item) {
        $item->mostrarInfo();
    }
}

mostrarColeccion($coleccion);
?>