<?php
// Ejercicio 7: Trabajar con diferentes modos de apertura
$nombreArchivo = "modos.txt";

echo "1. Escribiendo con modo 'w':\n";
$archivo = fopen($nombreArchivo, "w");
fwrite($archivo, "Contenido inicial");
fclose($archivo);
echo "Contenido: " . file_get_contents($nombreArchivo) . "\n\n";

echo "2. Agregando con modo 'a':\n";
$archivo = fopen($nombreArchivo, "a");
fwrite($archivo, "\nContenido agregado");
fclose($archivo);
echo "Contenido: " . file_get_contents($nombreArchivo) . "\n\n";

echo "3. Leyendo con modo 'r':\n";
$archivo = fopen($nombreArchivo, "r");
$contenido = fread($archivo, filesize($nombreArchivo));
fclose($archivo);
echo "Contenido leído: $contenido\n";
unlink($nombreArchivo);
?>