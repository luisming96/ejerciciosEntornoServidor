<?php
class EdadInvalidaException extends Exception {}
function verificarEdad($edad)
{
    if ($edad < 18) {
        throw new EdadInvalidaException("Acceso denegado. Se requiere ser mayor de 18. Edad inválida: $edad");
    }
    return "Acceso permitido. Edad: $edad";
}

try {
    echo verificarEdad(20) . "\n";
    echo verificarEdad(30) . "\n";
    echo verificarEdad(15) . "\n";
} catch (EdadInvalidaException $e) {
    echo "Error: " . $e->getMessage() . "\n";
} finally {
    echo "Verificación terminada. \n";
}
