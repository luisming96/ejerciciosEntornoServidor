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
        echo "Título: " . $this->titulo . "\n";
        echo "Autor: " . $this->autor . "\n";  
        echo "Año: " . $this->anio . "\n\n";
    }
} 

$libro1 = new Libro("Don Quijote de la Mancha", "Miguel de Cervantes", 1605);
$libro2 = new Libro("La Odisea", "Homero", -800);

$libro1->mostrarInfo();
$libro2->mostrarInfo();
?>