<?php
interface Prestable {
    public function prestar(): void;
    public function devolver(): void;
    public function estaPrestado(): bool;
}

abstract class MaterialBiblioteca {
    protected $titulo;
    protected $autor;
    protected $anio;

    public function __construct($titulo, $autor, $anio) {
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setAnio($anio);
    }

    abstract public function mostrarInfo();

    public function esAntiguo(): bool {
        return $this->getAnio() < 2000;
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
}

class Libro extends MaterialBiblioteca implements Prestable {
    private $prestado = false;

    public function __construct($titulo, $autor, $anio) {
        parent::__construct($titulo, $autor, $anio);
    }

    public function mostrarInfo() {
        $antiguedad = $this->esAntiguo() ? " (Antiguo)" : "";
        echo "Tipo: Libro\n";
        echo "Título: " . $this->getTitulo() . $antiguedad . "\n";
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

class Revista extends MaterialBiblioteca {
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
        $antiguedad = $this->esAntiguo() ? " (Antiguo)" : "";
        echo "Tipo: Revista\n";
        echo "Título: " . $this->getTitulo() . $antiguedad . "\n";
        echo "Autor/Editor: " . $this->getAutor() . "\n";
        echo "Año: " . $this->getAnio() . "\n";
        echo "Número de Edición: " . $this->getNumeroEdicion() . "\n\n";
    }
}

$libroAntiguo = new Libro("Don Quijote", "Cervantes", 1605);
$libroModerno = new Libro("Libro Actual", "Autor Moderno", 2020);
$revistaAntigua = new Revista("Revista Antigua", "Editor", 1995, 10);

echo "PRUEBA MÉTODO esAntiguo()\n";
$libroAntiguo->mostrarInfo();
$libroModerno->mostrarInfo();
$revistaAntigua->mostrarInfo();
?>