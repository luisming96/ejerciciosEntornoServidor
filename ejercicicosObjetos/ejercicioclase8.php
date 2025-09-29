<?php
$contador_id = 0;

interface Prestable {
    public function prestar(): void;
    public function devolver(): void;
    public function estaPrestado(): bool;
}

trait Identificable {
    private $id;

    public function setId($id): void {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
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
    public function getTitulo(): string {
        return $this->titulo;
    }
    public function getAutor(): string {
        return $this->autor;
    }
    public function getAnio(): int {
        return $this->anio;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }
    public function setAutor(string $autor): void {
        $this->autor = $autor;
    }
    public function setAnio(int $anio): void {
        $anioActual = (int)date("Y");
        if ($anio > $anioActual) {
            $this->anio = $anioActual;
        } else {
            $this->anio = $anio;
        }
    }
} 

class Libro extends MaterialBiblioteca implements Prestable {
    use Identificable;
    private $prestado = false;

    public function __construct($titulo, $autor, $anio) {
        global $contador_id;
        $contador_id++;
        $this->setId($contador_id);
        parent::__construct($titulo, $autor, $anio);
    }

    public function mostrarInfo() {
        echo "Libro ID: " . $this->getId() . "\n"; 
        echo "Título: " . $this->getTitulo() . "\n";
        echo "Autor: " . $this->getAutor() . "\n";
        echo "Año: " . $this->getAnio() . "\n";
        echo "Prestado: " . ($this->prestado ? "Sí" : "No") . "\n\n";
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
} 

class Revista extends MaterialBiblioteca {
    use Identificable;
    private $numeroEdicion;

    public function __construct($titulo, $autor, $anio, $numeroEdicion) {
        global $contador_id;
        $contador_id++;
        $this->setId($contador_id);
        parent::__construct($titulo, $autor, $anio); 
        $this->numeroEdicion = $numeroEdicion;
    }

    public function getNumeroEdicion(): int {
        return $this->numeroEdicion;
    }
    public function setNumeroEdicion(int $numeroEdicion): void {
        $this->numeroEdicion = $numeroEdicion;
    }

    public function mostrarInfo() {
        echo "Revista ID: " . $this->getId() . "\n";
        echo "Título: " . $this->getTitulo() . "\n";
        echo "Autor: " . $this->getAutor() . "\n";
        echo "Año: " . $this->getAnio() . "\n";
        echo "Número de Edición: " . $this->getNumeroEdicion() . "\n\n";
    }
}

$libro1 = new Libro("El Quijote", "Cervantes", 1605);
$revista1 = new Revista("National Geographic", "Editor", 2023, 100);
$libro2 = new Libro("Cien años de soledad", "García Márquez", 1967);

echo "Trait Identificable\n";
$libro1->mostrarInfo();
$revista1->mostrarInfo();
$libro2->mostrarInfo();
?>