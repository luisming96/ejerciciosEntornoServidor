<?php
interface Prestable {
    public function prestar(): void;
    public function devolver(): void;
    public function estaPrestado(): bool;
}

class Libro implements Prestable {
    private $titulo;
    private $autor;
    private $anio;
    private $prestado = false;

    public function __construct($titulo, $autor, $anio) {
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setAnio($anio);
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function getAutor() {
        return $this->autor;
    }
    public function getAnio() {
        return $this->anio;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function setAutor($autor) {
        $this->autor = $autor;
    }
    public function setAnio($anio) {
        $anioActual = (int)date("Y");
        if ($anio > $anioActual) {
            echo "Error: Año no puede ser mayor al actual. Se asigna año actual.\n";
            $this->anio = $anioActual;
        } else {
            $this->anio = $anio;
        }
    }

    public function mostrarInfo() {
        echo "Tipo: Libro\n";
        echo "Título: " . $this->getTitulo() . "\n";
        echo "Autor: " . $this->getAutor() . "\n";
        echo "Año: " . $this->getAnio() . "\n";
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
        echo "El libro '{$this->getTitulo()}' ha sido destruido\n";
    }
}

class Revista extends Libro {
    private $numeroEdicion;

    public function __construct($titulo, $autor, $anio, $numeroEdicion) {
        parent::__construct($titulo, $autor, $anio);
        $this->numeroEdicion = $numeroEdicion;
    }

    public function getNumeroEdicion() {
        return $this->numeroEdicion;
    }

    public function setNumeroEdicion($numeroEdicion) {
        $this->numeroEdicion = $numeroEdicion;
    }

    public function mostrarInfo() {
        echo "Tipo: Revista\n";
        echo "Título: " . $this->getTitulo() . "\n";
        echo "Autor/Editor: " . $this->getAutor() . "\n";
        echo "Año: " . $this->getAnio() . "\n";
        echo "Número de Edición: " . $this->getNumeroEdicion() . "\n\n";
    }
}

$libro1 = new Libro("Libro Normal", "Autor", 2020);
$libro2 = new Libro("Libro del Futuro", "Autor Futurista", 3000);
$libro1->mostrarInfo();
$libro2->mostrarInfo();
?>