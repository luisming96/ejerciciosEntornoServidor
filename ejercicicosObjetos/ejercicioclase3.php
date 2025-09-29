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

$revista1 = new Revista("National Geographic", "Sociedad NatGeo", 2025, 510);
$libro1 = new Libro("Fundación", "Isaac Asimov", 1951);

$revista1->mostrarInfo();
$libro1->mostrarInfo();
?>