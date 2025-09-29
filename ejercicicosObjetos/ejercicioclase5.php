<?php
interface Prestable {
    public function prestar(): void;
    public function devolver(): void;
    public function estaPrestado(): bool;
}

class Libro implements Prestable {
    public $titulo;
    public $autor;
    public $anio;
    private $prestado = false; 

    public function __construct($titulo, $autor, $anio) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anio = $anio;
    }

    public function mostrarInfo() {
        echo "Tipo: Libro\n";
        echo "Título: " . $this->titulo . "\n";
        echo "Autor: " . $this->autor . "\n";
        echo "Año: " . $this->anio . "\n";
        echo "Estado: " . ($this->prestado ? "PRESTADO" : "DISPONIBLE") . "\n\n";
    }

    public function prestar(): void {
        $this->prestado = true;
    }
    public function devolver(): void {
        $this->prestado = false;
    }
    public function estaPrestado(): bool {
        return $this->prestado;
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

$libro1 = new Libro("El Quijote", "Cervantes", 1605);
$libro2 = new Libro("Cien años de soledad", "García Márquez", 1967);

echo "ANTES DEL PRÉSTAMO\n";
$libro1->mostrarInfo();

echo "DESPUÉS DEL PRÉSTAMO\n";
$libro1->prestar();
$libro1->mostrarInfo();

echo "DESPUÉS DE DEVOLUCIÓN\n";
$libro1->devolver();
$libro1->mostrarInfo();
?>