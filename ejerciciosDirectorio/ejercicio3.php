<?php
// Ejercicio 3: Verificar existencia de archivos
$nombreArchivo = "test.txt";

if (file_exists($nombreArchivo)) {
    echo "El archivo $nombreArchivo ya existe.\n";
    echo "Tamaño: " . filesize($nombreArchivo) . " bytes\n";
    echo "Última modificación: " . date("Y-m-d H:i:s", filemtime($nombreArchivo)) . "\n";
    
} else {
    echo "El archivo no existe. Creándolo...\n";
    
    $archivo = fopen($nombreArchivo, "w");
    fwrite($archivo, "Archivo creado automáticamente");
    fclose($archivo);
    
    echo "Archivo creado.\n";
    echo "Tamaño: " . filesize($nombreArchivo) . " bytes\n";
}

if (file_exists($nombreArchivo)) {
    unlink($nombreArchivo);
    echo "Archivo eliminado.\n";
}
?>