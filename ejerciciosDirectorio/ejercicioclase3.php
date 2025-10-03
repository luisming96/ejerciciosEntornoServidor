<?php
$archivo = fopen("./mis_archivos/colores.txt", "w");
if ($archivo) {
    if (flock($archivo, LOCK_EX)) {
        fwrite($archivo, "morado \nrosa \nblanco \n");
        flock($archivo, LOCK_UN);
    }
    fclose($archivo);
    
    $contenido = file_get_contents("./mis_archivos/colores.txt");
    echo $contenido;
    
    file_put_contents("./mis_archivos/colores.txt", "plateado");
    
    echo "\nNuevo contenido:\n";
    echo file_get_contents("./mis_archivos/colores.txt");
} else {
    echo "El archivo no se pudo abrir correctamente.";
}
?>