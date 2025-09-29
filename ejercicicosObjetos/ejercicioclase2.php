<?php
class Libro{
    public $titulo;
    public $autor;
    public $anio;

    public function __construct($titulo, $autor, $anio){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anio = $anio;
    }

    public function mostrarInfo(){
        echo "Título: " . $this->titulo . "\n";
        echo "Autor: " . $this->autor . "\n";
        echo "Año: " . $this->anio . "\n\n";
    }

    public function __destruct(){
        echo "El libro '{$this->titulo}' ha sido destruido\n";
    }
}

$libro1 = new Libro("Rayuela", "Julio Cortázar", 1963);
$libro2 = new Libro("El Extranjero", "Albert Camus", 1942);

$libro1->mostrarInfo();
$libro2->mostrarInfo();