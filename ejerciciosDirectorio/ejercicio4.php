<?php
// Ejercicio 4: Copiar contenido entre archivos
$archivoOrigen = fopen("origen.txt", "w");
fwrite($archivoOrigen, "Este es el contenido original\nQue será copiado a otro archivo\nLínea 3 del archivo");
fclose($archivoOrigen);

echo "Archivo origen creado.\n";

if (file_exists("origen.txt")) {
    $archivoOrigen = fopen("origen.txt", "r");
    $contenido = fread($archivoOrigen, filesize("origen.txt"));
    fclose($archivoOrigen);
    
    $archivoDestino = fopen("destino.txt", "w");
    fwrite($archivoDestino, $contenido);
    fclose($archivoDestino);
    
    echo "Contenido copiado a destino.txt\n";
    
    echo "Contenido del archivo destino:\n";
    echo file_get_contents("destino.txt");
    
    unlink("origen.txt");
    unlink("destino.txt");
    
} else {
    echo "Error: archivo origen no encontrado";
}
?>