<?php
if (is_readable("./mis_archivos/frutas.txt")) {
    $archivo = fopen("./mis_archivos/frutas.txt", "r");
    if ($archivo) {
        $contenido = fread($archivo, filesize("./mis_archivos/frutas.txt"));
        echo $contenido;
        fclose($archivo);
        
        $archivoLinea = fopen("./mis_archivos/frutas.txt", "r");
        $primeraLinea = fgets($archivoLinea);
        echo $primeraLinea;
        fclose($archivoLinea);
    } else {
        echo "Error al abrir el archivo";
    }
} else {
    echo "El archivo no se puede leer";
}
?>