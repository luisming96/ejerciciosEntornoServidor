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

class Biblioteca {
    private $materiales = [];

    public function agregarMaterial(MaterialBiblioteca $material) {
        $this->materiales[] = $material;
    }

    public function mostrarMateriales() {
        echo "MATERIALES DE LA BIBLIOTECA\n";
        foreach ($this->materiales as $material) {
            $material->mostrarInfo();
        }
    }

    public function buscarPorTitulo($titulo) {
        $encontrados = [];
        foreach ($this->materiales as $material) {
            if (strpos($material->getTitulo(), $titulo) !== false) {
                $encontrados[] = $material;
            }
        }
        return $encontrados;
    }

    public function prestarLibro($titulo) {
        foreach ($this->materiales as $material) {
            if ($material->getTitulo() == $titulo && $material instanceof Prestable) {
                $material->prestar();
                return;
            }
        }
    }

    public function devolverLibro($titulo) {
        foreach ($this->materiales as $material) {
            if ($material->getTitulo() == $titulo && $material instanceof Prestable) {
                $material->devolver();
                return;
            }
        }
    }
}

echo "Clase Biblioteca\n";
$biblioteca = new Biblioteca();
$libro1 = new Libro("El Quijote", "Cervantes", 1605);
$revista1 = new Revista("National Geographic", "Editor", 2023, 100);
$libro2 = new Libro("Cien años de soledad", "García Márquez", 1967);

$biblioteca->agregarMaterial($libro1);
$biblioteca->agregarMaterial($revista1);
$biblioteca->agregarMaterial($libro2);

$biblioteca->mostrarMateriales();

echo "BÚSQUEDA POR TÍTULO\n";
$resultados = $biblioteca->buscarPorTitulo("Quijote");
foreach ($resultados as $material) {
    $material->mostrarInfo();
}

echo "PRÉSTAMO DE LIBROS\n";
echo "Prestando 'El Quijote':\n";
$biblioteca->prestarLibro("El Quijote");
$libro1->mostrarInfo();

echo "Devolviendo 'El Quijote':\n";
$biblioteca->devolverLibro("El Quijote");
$libro1->mostrarInfo();
?>