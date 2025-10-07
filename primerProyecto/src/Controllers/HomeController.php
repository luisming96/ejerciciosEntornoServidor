<?php
namespace Luismiguel\PrimerProyecto\Controllers;

class HomeController{
    public function index(){
        $filePath = __DIR__ . '/../../public/home.html';

        if (file_exists($filePath)) {
            echo file_get_contents($filePath);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    public function formulario(){
        $filePath = __DIR__ . '/../Views/formulario.html';

        if (file_exists($filePath)) {
            echo file_get_contents($filePath);
        } else {
            http_response_code(404);
            echo "Formulario no encontrado";
        }
    }

    public function procesar($data){
        if (isset($data['nombre']) && !empty($data['nombre'])) {
            $nombre = htmlspecialchars($data['nombre']); // Sanitizar el input
            echo "<h1>¡Hola, {$nombre}! Bienvenido a nuestra página.</h1>";
            echo '<a href="/">Volver al inicio</a>';
        } else {
            echo "<h1>Por favor, introduce un nombre válido.</h1>";
            echo '<a href="/formulario">Volver al formulario</a>';
        }
    }

    public function about(){
        $filePath = __DIR__ . '/../Views/about.html';

        if (file_exists($filePath)) {
            echo file_get_contents($filePath);
        } else {
            http_response_code(404);
            echo "Página About no encontrada";
        }
    }
}