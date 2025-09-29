<?php
// Ejercicio 6: Leer archivo línea por línea
$archivo = fopen("lineas.txt", "w");
fwrite($archivo, "Primera línea\nSegunda línea\nTercera línea\nCuarta línea\nÚltima línea");
fclose($archivo);

echo "Archivo con líneas creado.\n";


if ($archivo = fopen("lineas.txt", "r")) {
    $numeroLinea = 1;
    
    while (!feof($archivo)) {
        $linea = fgets($archivo);
        if (trim($linea) != "") {
            echo "Línea $numeroLinea: " . trim($linea) . "\n";
            $numeroLinea++;
        }
    }
    
    fclose($archivo);
    unlink("lineas.txt");
    
} else {
    echo "Error al abrir archivo";
}
?>