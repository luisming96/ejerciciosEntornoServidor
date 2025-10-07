<?php
namespace Luismiguel\PrimerProyecto\Routes;

use Luismiguel\PrimerProyecto\Controllers\HomeController;

$requestUri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$controller = new HomeController();

error_log($requestUri);

switch ($requestUri) {
    case '/':
        echo $controller->index();
        break;

    case '/formulario':
        echo $controller->formulario();
        break;

    case '/procesar':
        $controller->procesar($_POST);
        break;

    case '/about':
        echo $controller->about();
        break;

    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}